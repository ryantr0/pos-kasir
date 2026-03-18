<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class AIChatController extends Controller
{ 
    public function ask(Request $request)
    {
        try {
            // 1. Ambil data produk dengan proteksi null
            $products = Product::with('category')->get()->map(function($p) {
                return [
                    'nama' => $p->name ?? 'Produk Tanpa Nama',
                    'stok' => $p->stock ?? 0,
                    'harga' => "Rp " . number_format($p->price ?? 0, 0, ',', '.'),
                    'kategori' => $p->category->name ?? 'Umum'
                ];
            });

            $context = $products->toJson();
            $userMsg = $request->message;

            // 2. Prompt yang lebih 'to the point'
            $prompt = "Kamu adalah RZ Assistant, pengelola toko Warung RZ yang cerdas. 
           Gunakan data stok barang ini sebagai satu-satunya sumber kebenaran: $context.

           ATURAN JAWAB:
           1. Panggil user dengan 'Bang'. 
           2. Jawab dengan jujur berdasarkan data. Jika stok 0, katakan 'Kosong Bang'.
           3. Berikan analisis: Jika ada barang stok < 5, ingatkan user untuk belanja lagi.
           4. Jika ditanya total uang/cash, hitung total (Harga * Stok) dari semua barang.
           5. Gunakan bahasa santai tapi informatif. Jangan pakai format markdown yang aneh-aneh.

           Pertanyaan User: '$userMsg'";

            // 3. Request ke Gemini dengan struktur payload yang paling standar           
            $response = \Illuminate\Support\Facades\Http::withoutVerifying()
                ->timeout(30)
                ->withHeaders([
                    'Content-Type' => 'application/json'
                ])
                // PAKAI MODEL TERBARU DARI PLAYGROUND ABANG
                ->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-3-flash-preview:generateContent?key=" . env('GEMINI_API_KEY'), [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => $prompt]
                            ]
                        ]
                    ]
                ]);

            // 4. Cek jika request gagal
            if ($response->failed()) {
                Log::error('Gemini API Error: ' . $response->status() . ' - ' . $response->body());
                return response()->json(['answer' => 'Aduh Bang, robotnya lagi pusing (API Error). Coba cek log deh!']);
            }

            // 5. Ambil hasil teks dengan lebih aman
            $responseData = $response->json();
            $result = $responseData['candidates'][0]['content']['parts'][0]['text'] ?? null;

            if (!$result) {
                Log::warning('Gemini Response Empty: ' . json_encode($responseData));
                return response()->json(['answer' => 'Aduh Bang, dia diem aja, nggak mau jawab. Coba tanya lagi!']);
            }

            return response()->json([
                'answer' => $result
            ]);

        } catch (\Exception $e) {
            Log::error('Chat Error: ' . $e->getMessage());
            return response()->json(['answer' => 'Ada masalah teknis nih Bang: ' . $e->getMessage()]);
        }
    }
}