<!DOCTYPE html>
<html>
<head>
    <title>Radar Restock - Warung RZ</title>
    <style>
        /* Menggunakan font standar PDF agar ringan dan cepat */
        body { font-family: 'Helvetica', sans-serif; font-size: 11px; color: #333; line-height: 1.4; margin: 20px; }
        .header { text-align: center; margin-bottom: 25px; border-bottom: 2px solid #e11d48; padding-bottom: 10px; }
        .summary-box { margin-bottom: 20px; padding: 15px; background: #fff1f2; border: 1px solid #fecdd3; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; table-layout: fixed; }
        th, td { border: 1px solid #e2e8f0; padding: 10px; text-align: left; vertical-align: middle; }
        th { background-color: #e11d48; color: white; text-transform: uppercase; font-size: 9px; letter-spacing: 1px; }
        .text-right { text-align: right; }
        .text-rose { color: #e11d48; font-weight: bold; }
        .section-title { font-weight: bold; font-size: 12px; margin-bottom: 10px; display: block; color: #e11d48; border-left: 4px solid #e11d48; padding-left: 8px; text-transform: uppercase; }
        .footer { margin-top: 30px; text-align: center; font-size: 9px; color: #94a3b8; border-top: 1px solid #f1f5f9; padding-top: 10px; }
        .badge { background: #e11d48; color: white; padding: 2px 6px; border-radius: 4px; font-size: 10px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="header">
        <h1 style="margin:0; letter-spacing: 3px; color: #e11d48;">RADAR RESTOCK</h1>
        <p style="margin:5px 0; font-weight: bold; color: #64748b;">WARUNG RZ - KONTROL INVENTORI</p>
        <small>Waktu Cetak: {{ now()->translatedFormat('d F Y | H:i:s') }} WIB</small>
    </div>

    <div class="summary-box">
        <table style="border: none; width: 100%; margin-bottom: 0; background: transparent;">
            <tr style="border: none;">
                <td style="border: none; padding: 0; width: 70%;">
                    <span style="color: #be123b; font-size: 9px; text-transform: uppercase; font-weight: bold;">Status Inventori:</span><br>
                    
                </td>
                <td style="border: none; padding: 0; text-align: right; width: 30%; vertical-align: middle;">
                    <span style="color: #be123b; font-size: 9px; text-transform: uppercase; font-weight: bold;">Total Item Kritis:</span><br>
                    <strong style="font-size: 22px;" class="text-rose">{{ $stokMenipis->count() }}</strong> <span style="font-size: 12px;">Produk</span>
                </td>
            </tr>
        </table>
    </div>

    <span class="section-title">Daftar Produk Perlu Restock</span>
    <table>
        <thead>
            <tr>
                <th width="10%" style="text-align: center;">No</th>
                <th width="45%">Nama Produk</th>
                <th width="25%">Kategori</th>
                <th width="20%" style="text-align: center;">Sisa Stok</th>
            </tr>
        </thead>
        <tbody>
            @forelse($stokMenipis as $index => $item)
            <tr>
                <td style="text-align: center;">{{ $index + 1 }}</td>
                <td>
                    <strong style="font-size: 11px;">{{ strtoupper($item->name) }}</strong>
                </td>
                <td style="color: #64748b; font-size: 10px;">
                    {{ strtoupper($item->category->name ?? 'TANPA KATEGORI') }}
                </td>
                <td style="text-align: center;">
                    <span class="text-rose" style="font-size: 14px;">{{ $item->stock }}</span>
                    <span style="font-size: 9px; color: #94a3b8;">UNIT</span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align: center; color: #94a3b8; padding: 30px;">
                    SANGAT BAGUS! TIDAK ADA STOK PRODUK YANG KRITIS SAAT INI.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    
</body>
</html>