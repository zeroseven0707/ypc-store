@extends('component.admin.sidenavbar')
@section('content')
<style>
      .btn-outline-primary:hover svg{
        color: white;
    }
    .btn-outline-danger:hover svg{
        color: white;
    }
</style>
<div class="container">
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Input Kategori</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('category.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="file" class="form-label">Nama Kategori</label>
                      <input type="file" name="file" class="form-control" id="file">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputKategori" class="form-label">Nama Kategori</label>
                      <input type="text" name="nmkategori" class="form-control" id="exampleInputKategori" aria-describedby="emailHelp">
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
            </div>
          </div>
        </div>
      </div>
      <div class="card mt-2">
        <div class="card-header">
          Manage Categories
          <br>
          <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
            New
          </button>
        </div>
        <div class="card-body">
        <table id="myTable" class="table table-striped display" style="width:100%">
          <thead>
              <tr>
                <th>Gambar</th>
                <th>Nama Kategori</th>
                <th>Action</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($kategori as $item)
            
            <tr>
                <td> <img src="{{ asset('storage/'.$item->gambar) }}" alt=""></td>
                <td> {{ $item->nmkategori }}</td>
                <td>
                  <a href="{{ url('/category/edit').'/'.$item->id }}">
                    <button class="btn btn-outline-primary">
                      Edit
                      <svg xmlns="http://www.w3.org/2000/svg" color="blue" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      </svg>
                    </button>
                  </a>
                  <a href="category/delete/{{ $item['id'] }}" class="p-2" onclick="return confirm('Hapus data ini?')">
                    <button class="btn btn-outline-danger">
                      Hapus
                      <svg xmlns="http://www.w3.org/2000/svg" color="red" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                      </svg>
                    </button>
                  </a>
                </td>
            </tr>
            @endforeach
          </tbody>
      </table>
      </div>
     </div>
    {{-- <div class="container">
      <div class="card">
          <div class="card-header">Manage Categories</div>
          <div class="card-body">
    {{ $dataTable->table() }}
  </div>
</div>
</div> --}}
</div>
    @endsection
    {{-- @push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush --}}