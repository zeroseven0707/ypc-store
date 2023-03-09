@extends('component.admin.sidenavbar')
@section('content')
<style>
    label.label input[type="file"] {
        position: absolute;
        top: -1000px;
      }
      .label {
        cursor: pointer;
        border: 1px solid #cccccc;
        border-radius: 5px;
        padding: 5px 15px;
        margin: 5px;
        background: #fefefe;
        display: inline-block;
        width:150px;
        height:100px;
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
            <div class="row mt-4">
                @foreach ($product->gambar as $item)
                    <div class="col-md-3">
                        <img src="{{ asset('storage/'.$item->nama_gambar) }}" alt="" width="150" style="height: 100px;">
                        <a href="{{ url('gambar/delete/').'/'.$item->id }}" class="float-end">
                            <svg xmlns="http://www.w3.org/2000/svg" color="red" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                              </svg>
                        </a>
                    </div>
                @endforeach
                <div class="col">
 
                    @if(session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                    @endif   
                      <div class="">        
                                      <div class="form-group">
                                            <label class="label">
                                                <input type="file" name="files[]" class="foto" id="toko" multiple/>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                                                  </svg>
                                            </label>
                                      </div>
                                      @error('files')
                                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                      @enderror  
                      </div>
            </div>
        </div>
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