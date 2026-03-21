<!DOCTYPE html>
<html>
<head>
    <title>Invoice Belanja - Warung RZ</title>
    <style>
        body { font-family: sans-serif; color: #334155; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #000; padding-bottom: 10px; }
        .header h1 { margin: 0; text-transform: uppercase; font-size: 24px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background-color: #f8fafc; text-align: left; font-size: 10px; text-transform: uppercase; padding: 10px; border: 1px solid #e2e8f0; }
        td { padding: 10px; border: 1px solid #e2e8f0; font-size: 12px; }
        .total-row { font-weight: bold; background-color: #f8fafc; }
        .price { text-align: right; }
        .qty { text-align: center; }
    </style>
</head>
<body>
    <div class="header">
        <h1>WARUNG RZ</h1>
        <p>Laporan Riwayat Belanja Barang - {{ date('d/m/Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kategori</th> <th>Produk & Deskripsi</th>
                <th class="qty">Qty</th>
                <th class="price">Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0; @endphp
            @foreach($purchases as $item)
                <tr>
                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                    
                    <td style="text-transform: capitalize;">
                        {{ $item->category ?? 'Lainnya' }}
                    </td>
                    
                    <td>
                        <div style="font-weight: bold; text-transform: uppercase;">{{ $item->item_name }}</div>
                        <div style="font-size: 9px; color: #64748b;">{{ $item->description ?? '-' }}</div>
                    </td>
                    <td class="qty">{{ $item->qty }}</td>
                    <td class="price">Rp {{ number_format($item->total_price, 0, ',', '.') }}</td>
                </tr>
                @php $grandTotal += $item->total_price; @endphp
                @endforeach
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td colspan="4" style="text-align: right;">TOTAL PENGELUARAN :</td>
                <td class="price">Rp {{ number_format($grandTotal, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>