@extends('component.member.sidnavbar')
@section('content')
    <form action="/bukti/{{ $id }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="mb-3">
        <label for="formFile" class="form-label">Masukan Bukti Transfer</label>
        <input class="form-control" name="file" type="file" id="formFile">
    </div>
    <button class="btn btn-promary" type="submit">Kirim</button>
    </form>
@endsection