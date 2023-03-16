@extends('component.admin.sidenavbar')
@section('content')
<div class="container p-3">
<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <h4 class="text-center">Input Product</h4>
    <div class="card">
        <div class="card-body p-4">
                <div class="row row-cols-2" style="font-size: 13px">
                    <div class="col g-4">
                        <div class="mt-3">
                            <label for="namaproduk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="namaproduk" name="nmproduk">
                        </div>
                        @error('Nama Produk')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mt-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga">
                        </div>
                        <div class="mt-3">
                            <label for="Stok" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="Stok" name="stok">
                        </div>
                    </div>
                    <div class="col g-4">
                        <div class="mt-3">
                            <label for="file" class="form-label">Gambar:</label>
                            <input type="file" class="form-control" name="files[]" multiple/>
                        </div>
                        <div class="mt-3">
                            <label for="kategori" class="form-label">Kategori :</label>
                            <select id="jk" class="form-control" name="idkategori">
                                @foreach ($kat as $item)    
                                <option value="{{ $item['id'] }}">{{ $item['nmkategori'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-floating mt-3">
                            <textarea class="form-control" placeholder="Leave a Deskripsi here" id="floatingTextarea2" style="height: 100px" name="deskripsi"></textarea>
                            <label for="floatingTextarea2">Deskripsi</label>
                        </div>
                    </div>
                </div>
                <div class="float-end mt-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
</form>
</div>
@endsection