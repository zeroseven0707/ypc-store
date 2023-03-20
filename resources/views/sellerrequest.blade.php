@extends('component.admin.sidenavbar')
@section('content')
<style>
    .btn-outline-success:hover svg{
        color: white;
    }
    .btn-outline-danger:hover svg{
        color: white;
    }
</style>
<div class="card card-rounded">
    <div class="card-body">
      <div class="d-sm-flex justify-content-between align-items-start">
        <div>
          <h4 class="card-title card-title-dash">Seller Add Requests</h4>
         {{-- <p class="card-subtitle card-subtitle-dash">You have {{ count($seller) }} new requests</p> --}}
        </div>
        <div>
        </div>
      </div>
      <div class="table-responsive  mt-1">
        <table class="table select-table" id="myTable">
          <thead>
            <tr>
              <th>Nama Toko</th>
              <th>No Induk</th>
              <th>Penjual</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
           @foreach ($seller as $item)
            <tr>
              <td>
                {{ $item['nama_toko'] }}
              </td>
              <td>
                {{ $item->member->no_induk }}
              </td>
              <td>
                {{ $item->member->nama }}
              </td>
              <td>
                <div class="d-flex align-items-center">
                  @if ($item->status_aktivasi == '0')    
                  <form action="/seller/request/edit/{{ $item['id'] }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-outline-success">
                      Aktifkan
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                      <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                  </button>
                </form>
                  @else
                  <form action="/seller/request/nonaktiftoko/{{ $item['id'] }}" method="post">@csrf
                    <button class="btn btn-outline-danger">
                      Nonaktifkan
                    </button>
                  </form>
                  @endif
              </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection