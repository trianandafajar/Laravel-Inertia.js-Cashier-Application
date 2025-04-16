<!-- Header -->
<div class="title" style="padding-bottom: 13px; text-align: center; font-size: 15px; text-transform: uppercase;">
    Triananda Fajar Ramadhan
    <div style="font-size: 10px; text-transform: none;">
        Alamat: Desa Kedungombo, Kec. Tengaran, Kab. Semarang<br>
        Telp: 0857-9087-9087
    </div>
</div>

<!-- Tabel Laporan -->
<table style="width: 100%; font-size: 10px; border-collapse: collapse;">
    <thead>
        <tr style="background-color: #e6e6e7;">
            <th align="left">Date</th>
            <th align="left">Invoice</th>
            <th align="right">Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($profits as $profit)
        <tr>
            <td>{{ $profit->created_at }}</td>
            <td>{{ $profit->transaction->invoice }}</td>
            <td align="right">{{ formatPrice($profit->total) }}</td>
        </tr>
        @endforeach

        <!-- Total -->
        <tr style="background-color: #e6e6e7; font-weight: bold;">
            <td colspan="2" align="right">TOTAL</td>
            <td align="right">{{ formatPrice($total) }}</td>
        </tr>
    </tbody>
</table>
