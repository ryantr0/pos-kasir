<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class GoogleController extends Controller
{
    /**
     * Mengarahkan pengguna ke halaman autentikasi Google.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Menangani callback dari Google setelah autentikasi.
     */
    public function handleGoogleCallback()
    {
        try {
            // Ambil data user dari Google
            $googleUser = Socialite::driver('google')->user();

            // Cari user di database berdasarkan email
            $user = User::where('email', $googleUser->email)->first();

            if ($user) {
                // Jika user sudah terdaftar, langsung login
                Auth::login($user);
            } else {
                // Jika user belum ada, buat akun baru otomatis
                $newUser = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    // Karena login via Google, kita kasih password dummy yang aman
                    'password' => Hash::make('google-auth-' . $googleUser->id),
                    'email_verified_at' => now(),
                ]);

                Auth::login($newUser);
            }

            // Arahkan ke dashboard setelah sukses login
            return redirect()->route('dashboard');

        } catch (Exception $e) {
            // Jika ada error (misal user membatalkan login)
            return redirect()->route('login')->with('error', 'Gagal masuk dengan Google: ' . $e->getMessage());
        }
    }
}