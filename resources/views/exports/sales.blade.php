<!-- Header -->
<div class="title" style="padding-bottom: 13px; text-align: center;">
    <div style="text-transform: uppercase; font-size: 15px;">
      Triananda Fajar Ramadhan
    </div>
    <div>Alamat: Desa Kedungombo, Kec. Tengaran, Kab. Semarang</div>
    <div>Telp: 0857-9087-9087</div>
  </div>
  
  <!-- Tabel Penjualan -->
  <table style="width: 100%; border-collapse: collapse; font-size: 10px;">
    <thead>
      <tr style="background-color: #e6e6e7;">
        <th align="left">Date</th>
        <th align="left">Invoice</th>
        <th align="left">Cashier</th>
        <th align="left">Customer</th>
        <th align="right">Total</th>
      </tr>
    </thead>
    <tbody>
      @foreach($sales as $sale)
      <tr>
        <td>{{ \Carbon\Carbon::parse($sale->created_at)->format('d M Y H:i') }}</td>
        <td>{{ $sale->invoice }}</td>
        <td>{{ $sale->cashier->name ?? 'N/A' }}</td>
        <td>{{ $sale->customer->name ?? 'Umum' }}</td>
        <td align="right">{{ formatPrice($sale->grand_total) }}</td>
      </tr>
      @endforeach
  
      <!-- Total Keseluruhan -->
      <tr style="background-color: #e6e6e7; font-weight: bold;">
        <td colspan="4" align="right">TOTAL</td>
        <td align="right">{{ formatPrice($total) }}</td>
      </tr>
    </tbody>
  </table>
  