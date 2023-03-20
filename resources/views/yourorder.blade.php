@extends('component.member.sidnavbar')
@section('content')
<style>
   .nav-tabs .nav-item .nav-link .text-dark{
    background-color: red;
  }.col-3 img{
    width: 100px;
    margin-top: -20px;
  }
</style>
<!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link text-dark bckg" id="belumbayar-tab" data-bs-toggle="tab" data-bs-target="#belumbayar" type="button" role="tab" aria-controls="belumbayar" aria-selected="false">Belum Bayar</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link text-dark" id="dikemas-tab" data-bs-toggle="tab" data-bs-target="#dikemas" type="button" role="tab" aria-controls="dikemas" aria-selected="false">Dikemas</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link text-dark" id="dikirim-tab" data-bs-toggle="tab" data-bs-target="#dikirim" type="button" role="tab" aria-controls="dikirim" aria-selected="false">Dikirim</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link text-dark" id="Selesai-tab" data-bs-toggle="tab" data-bs-target="#Selesai" type="button" role="tab" aria-controls="Selesai" aria-selected="false">Selesai</button>
  </li>
</ul>

<div class="tab-content">
  {{-- belum bayar --}}
  <div class="tab-pane" id="belumbayar" role="tabpanel" aria-labelledby="belumbayar-tab" tabindex="0">
        @foreach ($belumbayar as $item)
        <div class="card w-100 mt-3 shadow">
          <div class="card-header row">
            <div class="col-9 col-md-9">
              <a href="" class="text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16"><path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/></svg>
                {{ $item->produk->toko->nama_toko }}
              </a>
            </div>
            <div class="col-3 col-md-3">
          @if ($item->tipepembayaran == 'cod')
          <p class="">
            <img src="{{ asset('assets/images/cod.png') }}" style="position: absolute;right: 0;" alt="">
          </p>
          @else
          <p class="" style="position: absolute; right: 0;">
            Transfer Via Bank
          </p>
          @endif
        </div>
      </div>
      <div class="card-body d-flex p-4">
        <div class="row gap-4">
          <div class="col-3 col-md-3">
            @if ($item->tipepembayaran == 'cod')
            <img src="{{ asset('storage/'.$item->produk->gambar['1']['nama_gambar']) }}" width="100%" alt="">
            @endif
          </div>
          <div class="col-7 col-md-7">
            <h5 class="card-title">{{ $item->produk->nmproduk }}</h5>
            <p>x{{ $item->jmlpesanan }}</p>
            <p class="card-text">{{ $item->kode_inv }}</p>
          </div>
            </div>
        </div>
        <div class="card-footer row">
          <div class="col-12 col-md-6 d-flex">
            <p>
              Total : 
            </p>
            <h2>
              {{ $item['total'] }}
            </h2>
          </div>
            @if ($item->statuspembayaran == 'belum bayar' AND $item->tipepembayaran == 'transfer')
          <div class="col-12 col-md-6">
            <button class="btn btn-primary float-end">Lanjutkan Pemesanan</button>
          </div>
              @elseif ($item->tipepembayaran == 'cod' AND $item->statuspesanan == 'dikemas')
              <div class="col-12 col-md-6">
                  <span class="badge bg-warning text-dark float-end">{{ $item->statuspesanan }}</span>
          </div>
          @else
          <div class="col-8 col-md-10">
            <button class="btn btn-primary float-end">Beli lagi</button>
          </div>
              <div class="col-4 col-md-2">
                <button class="btn btn-danger float-end">Rincian</button>
            </div>
                @endif
          </div>
        </div>
        @endforeach
  </div>
  {{-- dikemas --}}
  <div class="tab-pane" id="dikemas" role="tabpanel" aria-labelledby="dikemas-tab" tabindex="0">
    @foreach ($dikemas as $item)
    <div class="card w-100 mt-3 shadow">
      <div class="card-header row">
        <div class="col-9 col-md-9">
          <a href="" class="text-decoration-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16"><path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/></svg>
            {{ $item->produk->toko->nama_toko }}
          </a>
        </div>
        <div class="col-3 col-md-3">
          @if ($item->tipepembayaran == 'cod')
          <p class="">
            <img src="{{ asset('assets/images/cod.png') }}" style="position: absolute;right: 0;" alt="">
          </p>
          @else
          <p class="" style="position: absolute; right: 0;">
            Transfer Via Bank
          </p>
          @endif
        </div>
      </div>
      <div class="card-body d-flex p-4">
        <div class="row gap-4">
          <div class="col-3 col-md-3">
            @if ($item->tipepembayaran == 'cod')
            <img src="{{ asset('storage/'.$item->produk->gambar['1']['nama_gambar']) }}" width="100%" alt="">
            @endif
          </div>
          <div class="col-7 col-md-7">
            <h5 class="card-title">{{ $item->produk->nmproduk }}</h5>
            <p>x{{ $item->jmlpesanan }}</p>
            <p class="card-text">{{ $item->kode_inv }}</p>
          </div>
            </div>
        </div>
        <div class="card-footer row">
          <div class="col-12 col-md-6 d-flex">
            <p>
              Total : 
            </p>
            <h2>
              {{ $item['total'] }}
            </h2>
          </div>
          </div>
        </div>
        @endforeach
  </div>
  {{-- dikirim --}}
  <div class="tab-pane" id="dikirim" role="tabpanel" aria-labelledby="dikirim-tab" tabindex="0">
    @foreach ($dikirim as $item)
    <div class="card w-100 mt-3 shadow">
      <div class="card-header row">
        <div class="col-9 col-md-9">
          <a href="" class="text-decoration-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16"><path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/></svg>
            {{ $item->produk->toko->nama_toko }}
          </a>
        </div>
        <div class="col-3 col-md-3">
          @if ($item->tipepembayaran == 'cod')
          <p class="">
            <img src="{{ asset('assets/images/cod.png') }}" style="position: absolute;right: 0;" alt="">
          </p>
          @else
          <p class="" style="position: absolute; right: 0;">
            Transfer Via Bank
          </p>
          @endif
        </div>
      </div>
      <div class="card-body d-flex p-4">
        <div class="row gap-4">
          <div class="col-3 col-md-3">
            @if ($item->tipepembayaran == 'cod')
            <img src="{{ asset('storage/'.$item->produk->gambar['1']['nama_gambar']) }}" width="100%" alt="">
            @endif
          </div>
          <div class="col-7 col-md-7">
            <h5 class="card-title">{{ $item->produk->nmproduk }}</h5>
            <p>x{{ $item->jmlpesanan }}</p>
            <p class="card-text">{{ $item->kode_inv }}</p>
          </div>
            </div>
        </div>
        <div class="card-footer row">
          <div class="col-12 col-md-6 d-flex">
            <p>
              Total : 
            </p>
            <h2>
              {{ $item['total'] }}
            </h2>
          </div>
            @if ($item->statuspembayaran == 'belum bayar' AND $item->tipepembayaran == 'transfer')
          <div class="col-12 col-md-6">
            <button class="btn btn-primary float-end">Lanjutkan Pemesanan</button>
          </div>
              @elseif ($item->tipepembayaran == 'cod' AND $item->statuspesanan == 'dikemas')
          <div class="col-12 col-md-6">
                  <span class="badge bg-warning text-dark float-end">{{ $item->statuspesanan }}</span>
          </div>
              @elseif ($item->statuspembayaran == 'belum bayar')
              <div class="col-8 col-md-11">
                <a href="product/detail/{{ $item->produk->id }}">
                  <button class="btn btn-primary float-end">Beli lagi</button>
                </a>
              </div>
              <div class="col-4 col-md-1">
                <a href="/generateinv/{{ $item->slug }}">
                  <button class="btn btn-danger float-end">Print</button>
                </a>
            </div>
                @endif
                <form action="{{ url('terima').'/'.$item->slug }}" method="post" class="w-100">
                  @csrf
                  <button class="btn btn-outline-success">
                    Terima
                  </button>
                </form>
          </div>
        </div>
        @endforeach
  </div>
  {{-- selesai --}}
  <div class="tab-pane" id="Selesai" role="tabpanel" aria-labelledby="Selesai-tab" tabindex="0">
    @foreach ($selesai as $item)
    <div class="card w-100 mt-3 shadow">
      <div class="card-header row">
        <div class="col-9 col-md-9">
          <a href="" class="text-decoration-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16"><path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/></svg>
            {{ $item->produk->toko->nama_toko }}
          </a>
        </div>
        <div class="col-3 col-md-3">
          @if ($item->tipepembayaran == 'cod')
          <p class="">
            <img src="{{ asset('assets/images/cod.png') }}" style="position: absolute;right: 0;" alt="">
          </p>
          @else
          <p class="" style="position: absolute; right: 0;">
            Transfer Via Bank
          </p>
          @endif
        </div>
      </div>
      <div class="card-body d-flex p-4">
        <div class="row gap-4">
          <div class="col-3 col-md-3">
            @if ($item->tipepembayaran == 'cod')
            <img src="{{ asset('storage/'.$item->produk->gambar['1']['nama_gambar']) }}" width="100%" alt="">
            @endif
          </div>
          <div class="col-7 col-md-7">
            <h5 class="card-title">{{ $item->produk->nmproduk }}</h5>
            <p>x{{ $item->jmlpesanan }}</p>
            <p class="card-text">{{ $item->kode_inv }}</p>
          </div>
            </div>
        </div>
        <div class="card-footer row">
          <div class="col-12 col-md-6 d-flex">
            <p>
              Total : 
            </p>
            <h2>
              {{ $item['total'] }}
            </h2>
            <a href="/generateinv/{{ $item->slug }}">
              <button class="btn btn-outline-primary">Print Detail</button>
            </a>
          </div>
          </div>
        </div>
        @endforeach
  </div>
</div>
@endsection