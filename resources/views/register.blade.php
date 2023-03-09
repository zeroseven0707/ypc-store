@extends('component.member.bootstrap.index')
@section('content')
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left p-3">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3>Selamat Datang</h3>
            <p>Siswa Siswa SMK YPC,
                Silahkan Daftar dan Lengkapi Profile!
            </p>
            <a href="/login">
                <button type="submit" class="btn btn-light" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    </svg>
                    Kembali
                </button>
          </a>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Member Register</h3>
                    <form action="member/create" method="post">
                    @csrf
                    <div class="register-form">
                            <div class="form-group m-1">
                                <input type="text" class="form-control" name="username" placeholder="Username *" value="" />
                            </div>
                            <div class="form-group m-1">
                                <input type="text" class="form-control" placeholder="Nama *" name="nama" value="" />
                            </div>
                            <div class="form-group m-1">
                                <input type="password" class="form-control" placeholder="Password *" name="password" value="" />
                            </div>
                            <div class="form-group m-1">
                                <input type="password" class="form-control"  placeholder="Confirm Password *" name="confirm_password" value="" />
                            </div>
                              <button class="btn btn-primary mt-2 float-end"> Register</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection