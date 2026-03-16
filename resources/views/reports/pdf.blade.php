<!DOCTYPE html>
<html>
<head>
    <title>Laporan Keuangan Warung RZ</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; font-size: 11px; color: #333; line-height: 1.4; }
        .header { text-align: center; margin-bottom: 25px; border-bottom: 2px solid #000; padding-bottom: 10px; }
        .summary-box { margin-bottom: 20px; padding: 15px; background: #f1f5f9; border: 1px solid #cbd5e1; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; table-layout: fixed; }
        th, td { border: 1px solid #e2e8f0; padding: 8px; text-align: left; vertical-align: top; }
        th { background-color: #1e293b; color: white; text-transform: uppercase; font-size: 9px; }
        .text-right { text-align: right; }
        .text-red { color: #e11d48; font-weight: bold; }
        .text-green { color: #059669; font-weight: bold; }
        .section-title { font-weight: bold; font-size: 13px; margin-bottom: 10px; display: block; color: #1e293b; border-left: 4px solid #1e293b; padding-left: 8px; }
        .product-list { font-size: 9px; color: #64748b; margin-top: 4px; }
    </style>
</head>
<body>
    <div class="header">
        <h1 style="margin:0; letter-spacing: 2px;">WARUNG RZ</h1>
        <p style="margin:5px 0; font-weight: bold;">LAPORAN KEUANGAN PERIODE: {{ strtoupper($filter) }}</p>
        <small>Dicetak pada: {{ date('d/m/Y H:i') }}</small>
    </div>

    <div class="summary-box">
        <table style="border: none; margin-bottom: 0; background: transparent;">
            <tr style="border: none;">
                <td style="border: none; padding: 0;">
                    <strong>Total Pendapatan:</strong> Rp {{ number_format($totalRevenue, 0, ',', '.') }}<br>
                    <strong>Total Pengeluaran:</strong> Rp {{ number_format($totalExpense, 0, ',', '.') }}
                </td>
                <td style="border: none; padding: 0; text-align: right; font-size: 14px;">
                    <strong>PROFIT BERSIH: <span class="text-green">Rp {{ number_format($netProfit, 0, ',', '.') }}</span></strong>
                </td>
            </tr>
        </table>
    </div>

    <span class="section-title">RINCIAN PENDAPATAN (PENJUALAN)</span>
    <table>
        <thead>
            <tr>
                <th width="20%">Tanggal/Jam</th>
                <th width="45%">Pelanggan & Produk</th>
                <th width="15%">ID</th>
                <th width="20%" class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse($revenueDetails as $rev)
            <tr>
                <td>{{ $rev->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    <strong>{{ strtoupper($rev->customer ?? 'GUEST') }}</strong>
                    <div class="product-list">
                        @foreach($rev->items as $detail)
                            • {{ $detail->product->name ?? 'Produk Dihapus' }} (x{{ $detail->quantity }})<br>
                        @endforeach
                    </div>
                </td>
                <td>#{{ $rev->id }}</td>
                <td class="text-right text-green">Rp {{ number_format($rev->total_price, 0, ',', '.') }}</td>
            </tr>
            @empty
            <tr><td colspan="4" style="text-align: center;">Tidak ada data transaksi.</td></tr>
            @endforelse
        </tbody>
    </table>

    <span class="section-title">RINCIAN PENGELUARAN (OPERASIONAL)</span>
    <table>
        <thead>
            <tr>
                <th width="20%">Tanggal</th>
                <th width="60%">Keterangan</th>
                <th width="20%" class="text-right">Nominal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($expenseDetails as $exp)
            <tr>
                <td>{{ \Carbon\Carbon::parse($exp->date)->format('d/m/Y') }}</td>
                <td>{{ strtoupper($exp->name) }}</td>
                <td class="text-right text-red">Rp {{ number_format($exp->amount, 0, ',', '.') }}</td>
            </tr>
            @empty
            <tr><td colspan="3" style="text-align: center;">Tidak ada data pengeluaran.</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>