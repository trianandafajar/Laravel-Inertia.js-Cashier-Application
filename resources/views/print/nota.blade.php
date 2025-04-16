<!doctype html>
<html lang="id" moznomarginboxes mozdisallowselectionprint>
<head>
  <meta charset="UTF-8" />
  <title>Nota Pembelian</title>
  <style>
    html {
      font-family: "Verdana";
    }

    .content {
      width: 80mm;
      font-size: 10px;
      padding: 20px;
    }

    .title {
      text-align: center;
      text-transform: uppercase;
      font-size: 15px;
      padding-bottom: 13px;
    }

    .head-desc {
      margin-top: 10px;
      display: table;
      width: 100%;
    }

    .head-desc > div {
      display: table-cell;
    }

    .head-desc .user {
      text-align: right;
    }

    .nota {
      text-align: center;
      margin: 5px 0;
    }

    .separate-line {
      border-top: 1px dashed #000;
      height: 1px;
      margin: 5px 0;
    }

    .transaction-table {
      width: 100%;
      font-size: 10px;
      border-collapse: collapse;
    }

    .transaction-table td {
      vertical-align: top;
      padding: 2px 0;
    }

    .transaction-table .qty {
      text-align: center;
    }

    .transaction-table .sell-price,
    .transaction-table .final-price {
      text-align: right;
    }

    .price-tr td,
    .discount-tr td {
      padding: 7px 0;
    }

    .thanks {
      margin-top: 25px;
      text-align: center;
    }

    .azost {
      margin-top: 5px;
      text-align: center;
      font-size: 10px;
    }

    @media print {
      @page {
        width: 80mm;
        margin: 0mm;
      }
    }
  </style>

  <script>
    window.print();
    window.onafterprint = () => {
      setTimeout(() => window.close(), 1000);
    };
  </script>
</head>

<body>
  <div class="content">
    <!-- Header Toko -->
    <div class="title">
      <div>Triananda Fajar Ramadhan</div>
      <div>Alamat: Desa Gedangalas, Kec. Gajah, Kab. Demak</div>
      <div>Telp: 0857-9087-9089</div>
    </div>

    <div class="separate-line"></div>

    <!-- Info Transaksi -->
    <table class="transaction-table">
      <tr><td>TANGGAL</td><td>:</td><td>{{ $transaction->created_at }}</td></tr>
      <tr><td>FAKTUR</td><td>:</td><td>{{ $transaction->invoice }}</td></tr>
      <tr><td>KASIR</td><td>:</td><td>{{ $transaction->cashier->name ?? 'N/A' }}</td></tr>
      <tr><td>PEMBELI</td><td>:</td><td>{{ $transaction->customer->name ?? 'Umum' }}</td></tr>
    </table>

    <!-- Detail Produk -->
    <div class="separate-line"></div>
    <table class="transaction-table">
      <tr>
        <td>PRODUK</td>
        <td class="qty">QTY</td>
        <td class="final-price" colspan="5">HARGA</td>
      </tr>

      <tr class="price-tr"><td colspan="9"><div class="separate-line"></div></td></tr>

      @foreach ($transaction->details as $item)
      <tr>
        <td>{{ $item->product->title }}</td>
        <td class="qty">{{ $item->qty }}</td>
        <td class="final-price" colspan="5">{{ formatPrice($item->price) }}</td>
      </tr>
      @endforeach

      <tr class="price-tr"><td colspan="9"><div class="separate-line"></div></td></tr>

      <!-- Ringkasan -->
      <tr>
        <td colspan="3" class="final-price">SUB TOTAL</td>
        <td colspan="3">:</td>
        <td class="final-price">{{ formatPrice($transaction->grand_total) }}</td>
      </tr>
      <tr>
        <td colspan="3" class="final-price">DISKON</td>
        <td colspan="3">:</td>
        <td class="final-price">{{ formatPrice($transaction->discount) }}</td>
      </tr>

      <tr class="discount-tr"><td colspan="9"><div class="separate-line"></div></td></tr>

      <tr>
        <td colspan="3" class="final-price">TUNAI</td>
        <td colspan="3">:</td>
        <td class="final-price">{{ formatPrice($transaction->cash) }}</td>
      </tr>
      <tr>
        <td colspan="3" class="final-price">KEMBALI</td>
        <td colspan="3">:</td>
        <td class="final-price">{{ formatPrice($transaction->change) }}</td>
      </tr>
    </table>

    <!-- Footer -->
    <div class="thanks">=====================================</div>
    <div class="azost">
      TERIMA KASIH<br />
      ATAS KUNJUNGAN ANDA
    </div>
  </div>
</body>
</html>
