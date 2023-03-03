@extends('component.member.bootstrap.index')
@section('content')
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3>Welcome</h3>
            <p>You are 30 seconds away from earning your own money!</p>
            <a href="/login">
              <input type="submit" name="" value="Login"/>
          </a>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Member Register</h3>
                    <div class="register-form">
                            <div class="form-group m-1">
                                <input type="text" class="form-control" placeholder="Username *" value="" />
                            </div>
                            <div class="form-group m-1">
                                <input type="text" class="form-control" placeholder="Nama *" value="" />
                            </div>
                            <div class="form-group m-1">
                                <input type="password" class="form-control" placeholder="Password *" value="" />
                            </div>
                            <div class="form-group m-1">
                                <input type="password" class="form-control"  placeholder="Confirm Password *" value="" />
                            </div>
                              <button class="btnRegister"> Register</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection