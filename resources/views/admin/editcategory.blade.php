<form action="{{ url('category/update').'/'.$category->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    <img src="{{ asset('storage/'.$category->gambar) }}" alt="">
    <div class="mb-3">
      <label for="file" class="form-label">Gambar Kategori</label>
      <input type="file" name="file" class="form-control" id="file">
    </div>
    <div class="mb-3">
      <label for="exampleInputKategori" class="form-label">Nama Kategori</label>
      <input type="text" name="nmkategori" class="form-control" value="{{ $category->nmkategori }}">
    </div>
        <button type="submit" >Simpan</button>
    </form>