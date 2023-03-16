@extends('component.member.sidnavbar')
@section('content')
<style>
   .nav-tabs .nav-item .nav-link .text-dark{
    background-color: red;
  }
</style>
<!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link text-dark active " id="semua-tab" data-bs-toggle="tab" data-bs-target="#semua" type="button" role="tab" aria-controls="semua" aria-selected="true">Semua</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link text-dark bckg" id="belumbayar-tab" data-bs-toggle="tab" data-bs-target="#belumbayar" type="button" role="tab" aria-controls="belumbayar" aria-selected="false">Belum Bayar</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link text-dark" id="dikemas-tab" data-bs-toggle="tab" data-bs-target="#dikemas" type="button" role="tab" aria-controls="dikemas" aria-selected="false">Dikemas</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link text-dark" id="dikirim-tab" data-bs-toggle="tab" data-bs-target="#dikirim" type="button" role="tab" aria-controls="dikirim" aria-selected="false">Dikirim</button>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="semua" role="tabpanel" aria-labelledby="semua-tab" tabindex="0">
    @foreach ($yourorder as $item)
    <div class="card w-100 mt-3 shadow">
      <div class="card-header px-2 ">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16"><path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/></svg>
        {{ $item->produk->toko->nama_toko }}
        <span class="badge text-bg-light border border-1" style="font-size: 10px">
          <svg xmlns="http://www.w3.org/2000/svg" style="width: 10px" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16"><path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/></svg>
          kunjungi toko
        </span>
        <p class="card-text float-end">{{ $item->statuspembayaran }}</p>
      </div>
      <div class="card-body d-flex p-4">
        <div class="row">
          <div class="col-3 col-md-3">
            <img src="{{ asset('storage/'.$item->produk->gambar['0']['nama_gambar']) }}" width="100%" alt="">
          </div>
          <div class="col-9 col-md-9">
            <h5 class="card-title">{{ $item->produk->nmproduk }}</h5>
            <p>x{{ $item->jmlpesanan }}</p>
            <p class="card-text">{{ $item->kode_inv }}</p>
          </div>
            </div>
        </div>
        <div class="card-footer row">
          <div class="col-12 col-md-12">
            Total : {{ $item['total'] }}
          </div>
          <div class="col-8 col-md-10">
            <button class="btn btn-primary float-end">Beli lagi</button>
          </div>
          <div class="col-4 col-md-2">
            <button class="btn btn-danger float-end">Rincian</button>
          </div>
        </div>
    </div>
    @endforeach
  </div>
  <div class="tab-pane" id="belumbayar" role="tabpanel" aria-labelledby="belumbayar-tab" tabindex="0">Belum Bayar</div>
  <div class="tab-pane" id="dikemas" role="tabpanel" aria-labelledby="dikemas-tab" tabindex="0">Dikemas</div>
  <div class="tab-pane" id="dikirim" role="tabpanel" aria-labelledby="dikirim-tab" tabindex="0">Dikirim</div>
</div>
@endsection