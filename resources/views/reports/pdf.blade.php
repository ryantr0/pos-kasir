<!DOCTYPE html>
<html>
<head>
    <title>Laporan Keuangan Warung RZ</title>
    <style>
        /* Menggunakan font standar PDF agar ringan dan cepat */
        body { font-family: 'Helvetica', sans-serif; font-size: 11px; color: #333; line-height: 1.4; margin: 20px; }
        .header { text-align: center; margin-bottom: 25px; border-bottom: 2px solid #1e293b; padding-bottom: 10px; }
        .summary-box { margin-bottom: 20px; padding: 15px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; table-layout: fixed; }
        th, td { border: 1px solid #e2e8f0; padding: 8px; text-align: left; vertical-align: top; }
        th { background-color: #1e293b; color: white; text-transform: uppercase; font-size: 9px; letter-spacing: 1px; }
        .text-right { text-align: right; }
        .text-red { color: #e11d48; font-weight: bold; }
        .text-green { color: #059669; font-weight: bold; }
        .section-title { font-weight: bold; font-size: 12px; margin-bottom: 10px; display: block; color: #1e293b; border-left: 4px solid #1e293b; padding-left: 8px; text-transform: uppercase; }
        .product-list { font-size: 9px; color: #64748b; margin-top: 4px; }
        .footer { margin-top: 30px; text-align: center; font-size: 9px; color: #94a3b8; border-top: 1px solid #f1f5f9; padding-top: 10px; }
    </style>
</head>
<body>
   <div class="header">
    <h1 style="margin:0; letter-spacing: 3px; color: #1e293b;">WARUNG RZ</h1>
    
    <p style="margin:5px 0; font-weight: bold; color: #64748b;">
        LAPORAN KEUANGAN PERIODE: 
        @if(request('start_date') && request('end_date'))
            {{ \Carbon\Carbon::parse(request('start_date'))->translatedFormat('d F Y') }} 
            S/D 
            {{ \Carbon\Carbon::parse(request('end_date'))->translatedFormat('d F Y') }}
        @else
            {{ strtoupper($filter) }}
        @endif
    </p>
    
    <small>Waktu Cetak: {{ now()->translatedFormat('d F Y | H:i:s') }} WIB</small>
</div>

    <div class="summary-box">
        <table style="border: none; width: 100%; margin-bottom: 0; background: transparent;">
            <tr style="border: none;">
                <td style="border: none; padding: 0; width: 40%;">
                    <span style="color: #64748b; font-size: 9px; text-transform: uppercase; font-weight: bold;">Ringkasan Kas:</span><br>
                    <strong>Total Pendapatan:</strong> <span class="text-green">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</span><br>
                    <strong>Total Pengeluaran:</strong> <span class="text-red">Rp {{ number_format($totalExpense, 0, ',', '.') }}</span>
                </td>
                <td style="border: none; padding: 0; width: 30%;">
                    <span style="color: #64748b; font-size: 9px; text-transform: uppercase; font-weight: bold;">Metode Masuk:</span><br>
                    <strong>CASH:</strong> <span>Rp {{ number_format($cashTotal, 0, ',', '.') }}</span><br>
                    <strong>QRIS:</strong> <span>Rp {{ number_format($qrisTotal, 0, ',', '.') }}</span>
                </td>
                <td style="border: none; padding: 0; text-align: right; width: 30%; vertical-align: middle;">
                    <span style="color: #64748b; font-size: 9px; text-transform: uppercase; font-weight: bold;">Profit Bersih:</span><br>
                    <strong style="font-size: 18px;" class="text-green">Rp {{ number_format($netProfit, 0, ',', '.') }}</strong>
                </td>
            </tr>
        </table>
    </div>

    <span class="section-title">Rincian Pendapatan (Penjualan)</span>
    <table>
        <thead>
            <tr>
                <th width="15%">Tanggal & Jam</th>
                <th width="35%">Pelanggan & Item</th>
                <th width="15%">Metode</th> <th width="15%">ID Order</th>
                <th width="20%" class="text-right">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($revenueDetails as $rev)
            <tr>
                <td>{{ $rev->created_at->translatedFormat('d/m/Y H:i') }}</td>
                <td>
                    <strong>{{ strtoupper($rev->customer ?? 'GUEST') }}</strong>
                    <div class="product-list">
                        @foreach($rev->items as $detail)
                            • {{ $detail->product->name ?? 'Produk' }} (x{{ $detail->quantity }})<br>
                        @endforeach
                    </div>
                </td>
                <td style="text-align: center;">
                    <strong>{{ strtoupper($rev->payment_method ?? 'CASH') }}</strong>
                </td>
                <td>#{{ $rev->id }}</td>
                <td class="text-right text-green">Rp {{ number_format($rev->total_price, 0, ',', '.') }}</td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align: center; color: #94a3b8;">Tidak ada transaksi terekam.</td></tr>
            @endforelse
        </tbody>
    </table>

    <span class="section-title">Rincian Pengeluaran (Operasional)</span>
    <table>
        <thead>
            <tr>
                <th width="20%">Tanggal</th>
                <th width="60%">Deskripsi Pengeluaran</th>
                <th width="20%" class="text-right">Nominal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($expenseDetails as $exp)
            <tr>
                <td>{{ \Carbon\Carbon::parse($exp->date)->translatedFormat('d/m/Y') }}</td>
                <td>{{ strtoupper($exp->name) }}</td>
                <td class="text-right text-red">Rp {{ number_format($exp->amount, 0, ',', '.') }}</td>
            </tr>
            @empty
            <tr><td colspan="3" style="text-align: center; color: #94a3b8;">Tidak ada data pengeluaran.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Laporan ini dihasilkan secara otomatis oleh <strong>Sistem POS Warung RZ</strong>.<br>
        Dokumen ini sah dan tidak memerlukan tanda tangan basah.
    </div>
</body>
</html>