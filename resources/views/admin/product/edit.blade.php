@extends('component.admin.sidenavbar')
@section('content')
<style>
    label.label input[type="file"] {
         display: none;
      }
      .label {
        cursor: pointer;
        border: 1px solid #cccccc;
        border-radius: 5px;
        background: #fefefe;
        width:100%;
        text-align: center;
      }
      .label:hover {
        background: #b4b7b9;
      }
      .label:active {
        background: #9fa1a0;
      }
      .label:invalid + span {
        color: #000000;
      }
      .label:valid + span {
        color: #ffffff;
      }
</style>
<div class="container w-75">
  <form action="{{ url('product/update').'/'.$product->id }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mt-4">
          <div class="mb-3">
              <div class="text-center">
                  Edit Gambar
              </div>
              <div class="row row-cols-4 mt-4">
              @foreach ($product->gambar as $item)
                      <div class="col-md-3">
                        <img src="{{ asset('storage/'.$item->nama_gambar) }}" alt="" style="height: 100px; width: 100%;" class="">
                        <a href="{{ url('gambar/delete/').'/'.$item->id }}" class="d-block text-decoration-none text-white bg-danger text-center" onclick="return confirm('Hapus data ini?')">Hapus</a>
                          {{-- <a href="{{ url('gambar/delete/').'/'.$item->id }}" class=""><svg xmlns="http://www.w3.org/2000/svg" color="red" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg></a> --}}
                      </div>
              @endforeach
              <div class="col-md-3">     
                        <label class="label">
                            <input type="file" name="files[]" class="foto" id="toko" multiple/>
                            <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/></svg>
                        </label>
              </div>
          </div>
          <div class="row row-cols-2 mt-4">
            <div class="col col-md-6">
              <div class="mb-3">
                  <label for="namaproduk" class="form-label">Nama Product</label>
                  <input type="text" class="form-control" name="nmproduk" id="namaproduk" aria-describedby="emailHelp" value="{{ $product->nmproduk }}">
              </div>
              <div class="mb-3">
                  <label for="harga" class="form-label">Harga</label>
                  <input type="number" class="form-control" name="harga" id="harga" value="{{ $product->harga }}">
              </div>
            </div>
            <div class="col col-md-6">
              <div class="mb-3">
                  <label for="stok" class="form-label">Stok</label>
                  <input type="number" class="form-control" name="stok" id="stok" value="{{ $product->stok }}">
              </div>
              <div class="mb-3">
                <label for="stok" class="form-label">Kategori</label>
                <select id="" name="idkategori"  class="form-control">
                    @foreach ($kat as $kategori)
                    <option value="{{ $kategori['id'] }}" {{ ($product->idkategori == $kategori['id'])?'selected':'' }}>{{ $kategori['nmkategori'] }}</option>
                    @endforeach
                </select>
              </div>
            </div>
          </div>
        <div class="form-floating mt-3">
          <textarea class="form-control" placeholder="Leave a Deskripsi here" id="floatingTextarea2" style="height: 100px" name="deskripsi">{{ $product->deskripsi }}</textarea>
          <label for="floatingTextarea2">Deskripsi</label>
        </div>
        <div class="mt-3">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
  </form>
</div>    
@endsection