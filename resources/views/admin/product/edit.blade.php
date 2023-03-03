@extends('component.admin.sidenavbar')
@section('content')
<div class="container w-75">
<form action="{{ url('product/update').'/'.$product->kdproduk }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mt-4">
    <div class="mb-3">
        <label for="namaproduk" class="form-label">Nama Product</label>
        <input type="text" class="form-control" name="nmproduk" id="namaproduk" aria-describedby="emailHelp" value="{{ $product->nmproduk }}">
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="{{ $product->deskripsi }}">
    </div>
    <div class="mb-3">
        <label for="stok" class="form-label">Stok</label>
        <input type="number" class="form-control" name="stok" id="stok" value="{{ $product->stok }}">
    </div>
    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" name="harga" id="harga" value="{{ $product->harga }}">
    </div>
    <div class="mb-3">
        <label for="stok" class="form-label">Kategori</label>
        <select id="" name="idkategori"  class="form-control">
            @foreach ($kat as $kategori)
            <option value="{{ $kategori['id'] }}" {{ ($product->idkategori == $kategori['id'])?'selected':'' }}>{{ $kategori['nmkategori'] }}</option>
            @endforeach
        </select>
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
    </form>
</div>
</div>    
@endsection