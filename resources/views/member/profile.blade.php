@extends('component.member.sidebar')
@section('content')
<div class="container">
    <div class="main-body">
        <div class="mt-5">
          <small>Kelengkapan Profile {{ ProfileProgres() }}%</small>
          <div class="progress">
              <div class="progress-bar {{ (ProfileProgres() == 100)?'bg-primary':'bg-danger' }} progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ ProfileProgres() }}%;" aria-valuenow="{{ ProfileProgres() }}" aria-valuemin="0" aria-valuemax="100">{{ ProfileProgres() }}%</div>
            </div>
          </div>
          <div class="row gutters-sm mt-5">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    @if (getphoto() == NULL)
                    <img src="{{ asset('assets/images/guest.jpeg') }}" alt="Admin" class="rounded-circle" width="150">
                    @else
                    <img src="{{ asset('storage/'.getphoto()) }}" alt="Admin" class="" width="200" style="height:200px;">
                    @endif
                    <div class="mt-3">
                        @if ( $profile->no_induk == NULL)
                            <p class="text-danger">(No induk Siswa)</p>
                        @else
                        <h5>{{ Auth::user()->username }}</h5>
                        <p>({{ $profile->no_induk }})</p>
                        @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Username</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ Auth::user()->username }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if ( $profile->nama == NULL)
                            <p class="text-danger">Belum Diisi</p>
                        @else
                            {{ $profile->nama }}
                        @endif
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if ( $profile->no_hp == NULL)
                        <p class="text-danger">Belum Diisi</p>
                    @else
                        {{ $profile->no_hp }}
                    @endif
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Jenis Kelamin</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if ( $profile->jk == NULL)
                        <p class="text-danger">Belum Diisi</p>
                    @else
                        {{ ($profile->jk == 'l')?"Laki-laki":"Perempuan" }}
                    @endif
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if ( $profile->alamat == NULL)
                        <p class="text-danger">Belum Diisi</p>
                    @else
                        {{ $profile->alamat }}
                    @endif
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info" href="profile/edit">Edit</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>
@endsection