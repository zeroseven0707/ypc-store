@extends('component.admin.sidenavbar')
@section('content')
<div class="container p-4">
  @if (Auth::user()->level == "member")
  <a href="{{ route('product.add') }}" style="margin-top: 400px;">
    <button type="submit" class="btn btn-primary">New</button>
  </a>
  @endif
      <div class="card mt-2">
        <div class="card-header">Manage Products</div>
          <div class="card-body">
    <table id="myTable" class="table table-striped mt-2" style="width:100%">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Deskrisi</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Kategori</th>
                @if (Auth::user()->level == "admin")
                <th>Penjual</th>
                @endif
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
      @if (Level() == 'admin')
          @foreach ($product as $item)
          <tr>
            <td> {{ $item['nmproduk'] }}</td>
            <td> {{ Str::substr($item->deskripsi, 0, 20).'.......' }}</td>
            <td> {{ $item['stok'] }}</td>
            <td> {{ $item['harga'] }}</td>
            <td> {{ $item->kategori->nmkategori }}</td>
            <td> {{ $item->toko->nama_toko }}</td>
            <td>
              <a href="product/edit/{{ $item['id'] }}" class="p-2">
                <svg xmlns="http://www.w3.org/2000/svg" color="blue" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
                  </a>
                    <a href="product/delete/{{ $item['id'] }}" class="p-2">
                      <svg xmlns="http://www.w3.org/2000/svg" color="red" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                      </svg>
                    </a>
                  </td>
            </tr>
            @endforeach
            @else
            @foreach ($productPenjual as $item)
          <tr>
            <td> {{ $item['nmproduk'] }}</td>
            <td> {{ Str::substr($item->deskripsi, 0, 20).'.......' }}</td>
            <td> {{ $item['stok'] }}</td>
            <td> {{ $item['harga'] }}</td>
            <td> {{ $item->kategori->nmkategori }}</td>
            <td>
              {{-- Edit --}}
              <a href="product/edit/{{ $item['id'] }}" class="p-2"><svg xmlns="http://www.w3.org/2000/svg" color="blue" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg></a>
              {{-- Delete --}}
              <a href="product/delete/{{ $item['id'] }}" class="p-2" onclick="return confirm('Hapus data ini?')"><svg xmlns="http://www.w3.org/2000/svg" color="red" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg></a>
            </td>
          </tr>
            @endforeach
      @endif
        </tbody>
    </table>
          </div>
      </div>
</div>
@endsection