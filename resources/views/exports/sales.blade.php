<div class="title" style="padding-bottom: 13px;">
    <div style="text-align: center; text-transform: uppercase; font-size: 15px;">
        Triananda Fajar Ramadhan
    </div>
    <div style="text-align: center;">
        Alamat: Desa Kedungombo, Kec. Tengaran, Kab. Semarang
    </div>
    <div style="text-align: center;">
        Telp: 0857-9087-9087
    </div>
</div>

<table style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr style="background-color: #e6e6e7;">
            <th scope="col">Date</th>
            <th scope="col">Invoice</th>
            <th scope="col">Cashier</th>
            <th scope="col">Customer</th>
            <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sales as $sale)
        <tr>
            <td>{{ \Carbon\Carbon::parse($sale->created_at)->format('d M Y H:i') }}</td> <!-- Format date -->
            <td>{{ $sale->invoice }}</td>
            <td>{{ $sale->cashier->name ?? 'N/A' }}</td> <!-- Fallback if cashier is null -->
            <td>{{ $sale->customer->name ?? 'Umum' }}</td> <!-- Fallback if customer is null -->
            <td class="text-end">{{ formatPrice($sale->grand_total) }}</td>
        </tr>
        @endforeach
        <tr style="background-color: #e6e6e7;">
            <td colspan="4" style="text-align: right; font-weight: bold;">TOTAL</td>
            <td style="text-align: right; font-weight: bold;">{{ formatPrice($total) }}</td>
        </tr>
    </tbody>
</table>
