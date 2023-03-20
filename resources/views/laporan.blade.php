
@extends('component.admin.sidenavbar')
@section('content')
<div class="container mt-4">
    <a href="{{ route('generateexcel') }}">
    <button class="btn btn-outline-primary">Generate Excel</button></a>
  <div class="table-responsive">
  <table id="myTable" class="table table-striped mt-2" style="overflow: auto">
    <thead>
        <tr>
            <th>Kode INV</th>
            <th>Pembeli</th>
            @if (Level() == 'admin')
            <th>Penjual</th>
            @endif
            <th>Produk</th>
            <th>Pembayaran</th>
            <th>Jumlah</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($pesanan as $item)
      <tr>
        <td>{{ $item->kode_inv }}</td>
        <td>{{ $item->member->nama }}</td>
        @if (Level() == 'admin')
        <td>{{ $item->produk->toko->nama_toko }}</td>
        @endif
        <td>{{ $item->produk->nmproduk }}</td>
        <td>{{ $item->tipepembayaran }}</td>
        <td>{{ $item->jmlpesanan }}</td>
        <td>{{ $item->harga }}</td>
        <td>
        </tr>
        @endforeach
        </tbody>
</table>
</div>
</div>
@endsection