@extends('component.member.sidnavbar')
@section('content')
<section>
  <div class="card m-auto">
    <div class="card-body">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-10">

              <div class="d-flex justify-content-between pt-2">
                <p class="fw-bold mb-0">Order Details</p>
              </div>
              <div class="card">
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-1">
                        <img src="{{ asset('storage/'.$pesanan->produk->gambar[0]['nama_gambar']) }}"
                          class="img-fluid rounded-2" alt="Phone" style="width: 100%; height: 50px;">
                      </div>
                      <div class="col-md-3 text-center">
                        <p class="text-muted mb-0">{{ $pesanan->produk->nmproduk }}</p>
                      </div>
                      <div class="col-md-4 text-center">
                        <p class="text-muted mb-0 small">Rp.{{ $pesanan->harga }}</p>
                      </div>
                      <div class="col-md-4 text-center">
                        <p class="text-muted mb-0 small">Jumlah: {{$pesanan->jmlpesanan }}</p>
                      </div>
                    </div>
                </div>
              </div>
  
              <div class="d-flex justify-content-between bg-light pt-4 px-3 mt-4">
                <p class="text-muted mb-0 w-100"> Total : <span class="float-end text-dark">{{ $pesanan->harga * $pesanan->jmlpesanan }}</span></p>
              </div>
              <div class="d-flex justify-content-between pt-4 px-3">
                <p class="text-muted mb-0 w-100"> Kode Invoice : <span class="float-end text-dark">{{ $pesanan->kode_inv }}</span> </p>
              </div>
              <div class="d-flex justify-content-between bg-light pt-4 px-3">
                <p class="text-muted mb-0 w-100">Date : <span class="float-end text-dark">{{ $pesanan->tanggalpesanan }}</span></p>
              </div>
              <form action="{{ url('/checkout').'/'.$pesanan->id }}" method="post">@csrf
              <div class="d-flex justify-content-between pt-4 px-3">
                <label for="mp">
                    <p class="text-muted mb-0">Metode Pembayaran :</p>
                </label>
                <select name="metodepembayaran" style="background-color: transparent;width:40%; border:none; outline: #545252; text-align: end;" id="mp">
                    <option value="">Pilih Metode Pembayaran  </option>
                    <option value="cod">COD</option>
                    <option value="transfer">Transfer</option>
                </select>
              </div>
              <div class="card-footer border-0 mt-4 "
              style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
              <p class="d-flex align-items-center mb-0">Total
                Bayar: <span class="mb-0 ms-2 ms-auto">Rp.{{ $pesanan->harga * $pesanan->jmlpesanan  }}</span></p>
              </div>
            </div>

          </div>
               
        </div>
    <button class="btn btn-primary py-3" type="submit">CheckOut</button>
  </form>
        <a href="/hapuspesanan/{{ $pesanan->id }}"  class="btn btn-danger py-3">Hapus</a>
</section>
@endsection
