@extends('component.member.sidebar')
@section('content')
    
<style>
    body {
  background: whitesmoke;
  font-family: 'Open Sans', sans-serif;
}
.container {
    max-width: 960px;
  margin: 30px auto;
  padding: 20px;
}
h1 {
    font-size: 20px;
    text-align: center;
    margin: 20px 0 20px;
}
h1 small {
    display: block;
    font-size: 15px;
    padding-top: 8px;
    color: gray;
}
.avatar-upload {
    position: relative;
    max-width: 205px;
    margin: auto;
}
.avatar-upload .avatar-edit {
    position: absolute;
    right: 12px;
    z-index: 1;
    top: 10px;
}
.avatar-upload .avatar-edit input {
    display: none;
}
.avatar-upload .avatar-edit input + label {
    display: inline-block;
    width: 34px;
    height: 34px;
    margin-bottom: 0;
    border-radius: 100%;
    background: #FFFFFF;
    border: 1px solid transparent;
    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
    cursor: pointer;
    font-weight: normal;
    transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-edit input + label:hover {
    background: #f1f1f1;
    border-color: #d6d6d6;
}
.avatar-upload .avatar-edit input + label:after {
    content: "\f040";
    font-family: 'FontAwesome';
    color: #757575;
    position: absolute;
    top: 10px;
    left: 0;
    right: 0;
    text-align: center;
    margin: auto;
}
.avatar-upload .avatar-preview {
    width: 192px;
    height: 192px;
    position: relative;
    border-radius: 100%;
    border: 6px solid #F8F8F8;
    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
    width: 100%;
    height: 100%;
    border-radius: 100%;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}
</style>
<div class="container-fluid w-75">
<form action="/profile/update" method="post" enctype="multipart/form-data">
    @csrf
        <div class="avatar-upload">
            <div class="avatar-edit">
                <input type='file' name="foto" id="imageUpload" accept=".png, .jpg, .jpeg" />
                <label for="imageUpload">Edit</label>
            </div>
            <div class="avatar-preview">
                @if (getphoto() == null)
                <div id="imagePreview" style="background-image: url('{{ asset('assets/images/guest.jpeg') }}');"></div>
                @else
                <div id="imagePreview" style="background-image: url('{{ asset('storage/'.getphoto()) }}');" alt="{{ getphoto() }}"></div>
                @endif  
            </div>
        </div>
    <div class="row row-cols-2 g-2 mt-1" style="font-size: 13px">
        <div class="col-6 col-md-6">
            <label for="firstname">Username :</label>
            <input type="text" name="username" class="form-control" id="firstname" value="{{ Auth::user()->username}}">
        </div>
        <div class="col-6 col-md-6">
            <label for="noinduk">No Induk :</label>
            <input type="text" name="no_induk" class="form-control" id="noinduk" value="{{ $profile->no_induk }}">
        </div>
        <div class="col col-md-6">
            <label for="nama">Nama :</label>
            <input type="text" name="nama" class="form-control" id="nama" value="{{ $profile->nama }}">
        </div>
        <div class="col col-md-6">
            <label for="nohp">No Hp :</label>
            <input type="number" name="no_hp" class="form-control" id="nohp" value="{{ $profile->no_hp }}">
        </div>
        <div class="col-6 col-md-6">
            <label for="jk">Jenis Kelamin :</label>
        </div>
        <div class="col-6 col-md-6">
            <input type="checkbox" name="jk" id="jk"  value="l" {{ ($profile->jk == 'l')?'checked':'' }}>Laki-laki
            <input type="checkbox" name="jk" id="jk" value="p" {{ ($profile->jk == 'p')?'checked':'' }}>Perempuan
        </div>
        <div class="col-12 col-md-12">
            <label for="alamat">Alamat :</label>
            <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="4">{{ $profile->alamat}}</textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-primary w-100 mt-4">Simpan</button>
</form>
</div>
@endsection