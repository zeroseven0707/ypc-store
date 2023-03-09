<div class="container w-75">
    <div class="position-fixed mt-2" style="margin-left: -100px;">
        <button class="btn btn-primary mb-3" wire:click.prevent="add({{$i}})">+</button>
    </div>
    <form>
    <div class="card mt-5">
        <div class="card-body">
                <div class="row row-cols-2" style="font-size: 13px">
                    <div class="col g-4">
                    <div>
                        <label for="namaproduk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="namaproduk" wire:model="namaproduk.0">
                        @error('namaproduk.0') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div>
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" wire:model="harga.0">
                        @error('harga.0') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div>
                        <label for="Stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="Stok" wire:model="stok.0">
                        @error('stok.0') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div>
                        <label for="kdproduk" class="form-label">Kode Produk:</label>
                        <input type="text" class="form-control" id="kdproduk" wire:model="kdproduk.0">
                        @error('kdproduk.0') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col g-4">
                    <div>
                        <div>
                            <label for="file" class="form-label">Gambar</label>
                            <input type="file" class="form-control" wire:model="files" id="file" multiple>
                        @error('files.0') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        @error('files')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>  
                        <div>
                        <label for="kategori" class="form-label">Kategori :</label>
                        <select id="jk" class="form-control" wire:model="idkategori.0">
                            @foreach ($kat as $item)    
                            <option value="{{ $item['id'] }}">{{ $item['nmkategori'] }}</option>
                            @endforeach
                        </select>
                        @error('kategori.0') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-floating mt-4">
                        <textarea class="form-control" placeholder="Leave a Deskripsi here" id="floatingTextarea2" style="height: 100px" wire:model="deskripsi.0"></textarea>
                        <label for="floatingTextarea2">Deskripsi</label>
                        @error('deskripsi.0') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($inputs as $key => $value)
    <div class="card mt-5 ">
        <div class="card-body">
                        <div>
                            <button class="btn btn-danger mb-3" wire:click.prevent="remove({{$key}})">-</button>
                        </div>
                            <div class="row row-cols-2" style="font-size: 13px">
                                <div class="col g-4">
                    <div>
                        <label for="namaproduk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="namaproduk" wire:model="namaproduk.{{ $value }}">
                        @error('namaproduk.') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div>
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" wire:model="harga.{{ $value }}">
                        @error('harga.') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div>
                        <label for="Stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="Stok" wire:model="stok.{{ $value }}">
                        @error('stok.') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div>
                        <label for="kdproduk" class="form-label">Kode Produk :</label>
                        <input type="number" class="form-control" id="kdproduk" wire:model="kdproduk.{{ $value }}">
                        @error('kdproduk.') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col g-4">
                    <div>
                        <div>
                            <label for="file" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="file" multiple wire:model="files.{{ $value }}">
                        @error('files.') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        @error('files')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>  
                        <div>
                        <label for="kategori" class="form-label">Kategori :</label>
                        <select id="jk" class="form-control" wire:model="idkategori.{{ $value }}">
                            @foreach ($kat as $item)    
                            <option value="{{ $item['id'] }}">{{ $item['nmkategori'] }}</option>
                            @endforeach
                            </select>
                        @error('idkategori.') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-floating mt-4">
                        <textarea class="form-control" placeholder="Leave a Deskripsi here" id="floatingTextarea2" style="height: 100px" wire:model="deskripsi.{{ $value }}"></textarea>
                        <label for="floatingTextarea2">Deskripsi</label>
                        @error('deskripsi.') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
                @endforeach
                <div class="row">
                    <div class="col-12 ps-0">
                        <button type="button" class="btn btn-primary" wire:click.prevent="store()">Save</button>
                    </div>
                </div>
    </form>
</div>
@if (session()->has('message'))
<div class="alert alert-success">
{{ session('message') }}
</div>
@endif

