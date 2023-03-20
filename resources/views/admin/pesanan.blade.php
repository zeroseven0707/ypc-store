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
            <th>Bukti Pembayaran</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($pesanan as $item)
      <tr>
        <td> {{ $item['slug'] }}</td>
        <td> {{ $item->member->nama }}</td>
        <td> {{ $item->produk->nmproduk }}</td>
        <td> {{ $item['harga'] }}</td>
        <td> {{ $item['jmlpesanan'] }}</td>
        <td> {{ $item['tanggalpesanan'] }}</td>
        <td> {{ $item['tipepembayaran'] }}</td>
        @if ($item->buktipembayaran == NULL)
            <td>Tidak Ada</td>
            @else
            <td> <img src="{{ asset('storage/'.$item['buktipembayaran'])}}" alt="" width="100%"></td>
        @endif
        <td><div class="d-flex">
          <a href="/generateinv/{{ $item['slug'] }}">
            <button class="btn btn-outline-danger">Generate Invoice</button>
          </a>
          @if ($item['statuspesanan'] == 'dikirimi')
              @else
              <form action="/kirim/{{ $item['slug'] }}" method="post">
                @csrf
                <button class="btn btn-primary" type="submit" style="margin-left: 20px;">Kirim</button>
              </form>
              @endif
        </div>
        </tr>
        @endforeach
        </tbody>
</table>
</div>
</div>
@endsection