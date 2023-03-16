@extends('component.admin.sidenavbar')
@section('content')
<div class="container mt-4">
  <div class="table-responsive">
  <table id="myTable" class="table table-striped mt-2" style="overflow: auto">
    <thead>
        <tr>
            <th>Kode INV</th>
            <th>Nama Pembeli</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>Tipe Pembayaran</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($pesanan as $item)
      <tr>
        <td> {{ $item['kode_inv'] }}</td>
        <td> {{ $item->member->nama }}</td>
        <td> {{ $item->produk->nmproduk }}</td>
        <td> {{ $item['harga'] }}</td>
        <td> {{ $item['jmlpesanan'] }}</td>
        <td> {{ $item['tanggalpesanan'] }}</td>
        <td> {{ $item['tipepembayaran'] }}</td>
        <td>
          <button class="btn btn-primary">Kirim</button>
        </tr>
        @endforeach
        </tbody>
</table>
</div>
</div>
@endsection