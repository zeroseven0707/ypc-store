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
          <h4 class="card-title card-title-dash">Member Add Requests</h4>
         <p class="card-subtitle card-subtitle-dash">You have {{ count($member) }} new requests</p>
        </div>
        <div>
        </div>
      </div>
      <div class="table-responsive  mt-1">
        <table class="table select-table" id="myTable">
          <thead>
            <tr>
              <th>Nama</th>
              <th>No Induk</th>
              <th>Progress</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
           @foreach ($member as $item)
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  @if ($item['foto'] == NULL)
                  <img src="{{ asset('assets/images/guest.jpeg') }}" alt="">
                  @else
                  <img src="{{ asset('storage/'.$item['foto']) }}" alt="">
                  @endif
                  <div>
                    <h6>{{ $item['nama'] }}</h6>
                  </div>
                </div>
              </td>
              <td>
                <h6>{{ $item['no_induk'] }}</h6>
                <p>company type</p>
              </td>
              <?php
                      if ($item['no_induk'] == NULL) {
                          $j_induk = 0;
                      }else{
                          $j_induk = 1;
                      }
                      if($item['nama'] == NULL){
                          $j_nama = 0;
                      }else{
                          $j_nama = 1;
                      }
                      if($item['alamat'] == NULL){
                          $j_alamat = 0;
                      }else{
                          $j_alamat = 1;
                      }
                      if($item['no_hp'] == NULL){
                          $jno_hp = 0;
                      }else{
                          $jno_hp = 1;
                      }
                      if($item['jk'] == NULL){
                          $j_jk = 0;
                      }else{
                          $j_jk = 1;
                      }
                      if($item['foto'] == NULL){
                          $j_foto = 0;
                      }else{
                          $j_foto = 1;
                      }
                      $jumlah = ($j_induk + $j_nama + $j_alamat + $jno_hp + $j_jk + $j_foto);
                      if ($jumlah == 0) {
                          $progres = 0;
                      }elseif ($jumlah == 1) {
                          $progres = 16;
                      }
                      elseif ($jumlah == 2) {
                          $progres = 33;
                      }elseif($jumlah == 3){
                          $progres = 50;
                      }elseif ($jumlah == 4) {
                          $progres = 66;
                      }elseif ($jumlah == 5) {
                          $progres = 82;
                      }elseif ($jumlah == 6) {
                          $progres = 100;
                      }
              ?>
              <td>
                <div>
                  <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                    <p class="text-success"><?= $progres ?>%</p>
                    <p><?= $jumlah ?>/6</p>
                  </div>
                  <div class="progress progress-md">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $progres ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </td>
              @if ($progres == 100)
              <td><div class="badge bg-success">{{ ($item['status_aktif'] == '0')?'Pending':'Success Activasi' }}</div></td>
                  @else
                  <td><div class="badge bg-secondary">In progress</div></td>
                  @endif
                  <td>
                    <div class="d-flex align-items-center">
                      @if ($item->status_aktif == '')
                      @if ($progres ==100)
                      <form action="/member/request/edit/{{ $item['id'] }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-success">
                          Aktifkan
                        <svg xmlns="http://www.w3.org/2000/svg" color="{{ ($progres == 100)?'green':'gray' }}" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                          <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                      </button>
                      
                    </form>
                    @else
                    
                    @endif
                    @else
                    @endif
                    @if ($item->status_aktif == '1')
                    <a href="{{ url('member/nonaktif/'.$item['id'])}}" class="p-2" onclick="return confirm('Hapus data ini?')">
                      <button class="btn btn-outline-warning">
                          Non Aktifkan
                      </button>
                  </a>
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