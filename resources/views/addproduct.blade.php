@extends('component.admin.sidenavbar')
@section('content')
<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card mt-5">
        <div class="card-body">
                <div class="row row-cols-2" style="font-size: 13px">
                    <div class="col g-4">
                    <div>
                        <label for="namaproduk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="namaproduk" name="nmproduk">
                    </div>
                    <div>
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga">
                    </div>
                    <div>
                        <label for="Stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="Stok" name="stok">
                    </div>
                </div>
                <div class="col g-4">
                        <div class="form-group p-2">
 
                            @if(session('status'))
                              <div class="alert alert-success">
                                  {{ session('status') }}
                              </div>
                            @endif   
                            <div class="form-group">  
                                    <label class="label">
                                        <input type="file" name="files[]" multiple/>
                                    </label>
                                    @error('files')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror  
                              </div>
                           
                           
                          </div> 
                        <div>
                        <label for="kategori" class="form-label">Kategori :</label>
                        <select id="jk" class="form-control" name="idkategori">
                            @foreach ($kat as $item)    
                            <option value="{{ $item['id'] }}">{{ $item['nmkategori'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-floating mt-4">
                        <textarea class="form-control" placeholder="Leave a Deskripsi here" id="floatingTextarea2" style="height: 100px" name="deskripsi"></textarea>
                        <label for="floatingTextarea2">Deskripsi</label>
                    </div>
                </div>
            </div>
            <div class="float-end mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</form>
@endsection