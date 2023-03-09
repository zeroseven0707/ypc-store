@extends('component.member.bootstrap.index')
@section('content')
<!------ Include the above in your HEAD tag ---------->
<div class="register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="{{ asset('dashboard/images/logoypc.png') }}" alt=""/>
            <h3>Welcome</h3>
            <p>You are 30 seconds away from earning your own money!</p>
            <a href="/">
                <button type="submit" class="btn btn-light" style="margin-top:150px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    </svg>
                    Kembali
                </button>
            </a><br/>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Daftar Jadi Penjual</h3>
                    <form action="/penjual/create" method="post"  accept-charset="utf-8" enctype="multipart/form-data">
                        @csrf
                        <div class="row register-form">
                        <div class="col-md-12">
                            <div class="form-group p-2">
 
                                @if(session('status'))
                                  <div class="alert alert-success">
                                      {{ session('status') }}
                                  </div>
                                @endif   
                                  <div class="">        
                                                  <div class="form-group">
                                                        <label class="label">
                                                            <input type="file" name="files[]" class="foto" id="toko" multiple/>
                                                            <span>Select File</span>
                                                        </label>
                                                  </div>
                                                  @error('files')
                                                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                  @enderror  
                                  </div>
                               
                               
                              </div> 
                            <div class="form-group p-2">
                                <input type="text" class="form-control" name="nama_toko" placeholder="Nama Toko *" value="" />
                            </div>
                            <div class="form-group p-2">
                                <textarea class="form-control" name="deskripsi_toko" id="" cols="30" rows="10">Deskripsi Toko</textarea>
                            </div>
                              </div>
                              <div class="form-group">
                                  <button class="btn btn-primary">Daftar</button>
                              </div>
                        </div>
                        
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
