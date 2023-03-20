@extends('component.admin.sidenavbar')
@section('content')
<style>
          .btn-outline-warning:hover{
        color: white;
    }
    .btn-outline-danger:hover{
        color: white;
    }
</style>
<div class="container">
    <div class="card mt-2">
        <div class="card-header">Manage Member</div>
          <div class="card-body">
    <table id="myTable" class="table table-striped mt-5" style="width:100%">
        <thead>
            <tr>
                <th>No Induk</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Jenis Kelamin</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($member as $item)
            <tr>
                <td> {{ ($item['no_induk'] == '')?'belum dilengkapi':$item['no_induk'] }}</td>
                <td> {{ $item->user->username }}</td>
                <td> {{ ($item['nama'] == '')?'belum dilengkapi':$item['nama'] }}</td>
                <td> {{ ($item['alamat'] == '')?'belum dilengkapi':$item['alamat'] }}</td>
                <td> {{ ($item['no_hp'] == '')?'belum dilengkapi':$item['no_hp'] }}</td>
                <td> {{ ($item['jk'] == '')?'belum dilengkapi':$item['jk'] }}</td>
                <td>
                    <a href="{{ url('member/edit/'.$item['id']) }}" class="p-2">
                        <button class="btn btn-outline-warning">
                            Edit
                        </button>
                    </a>
                    <a href="{{ url('member/delete/'.$item['id']) }}" class="p-2" onclick="return confirm('Hapus data ini?')">
                        <button class="btn btn-outline-danger">
                            Hapus
                        </button>
                    </a>
                  </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>

        </tfoot>
    </table>
          </div>
    </div>
</div>
@endsection