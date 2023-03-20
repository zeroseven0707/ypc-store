@extends('component.member.sidnavbar')
@section('content')
    <section class="bg-white p-4 rounded-4 shadow-sm">
    <div class="row g-4 mt-2">
        @foreach ($like as $item)
        <div class="col-md-4">
          <form action="{{ url('/hapusfavorite').'/'.$item->id}}" method="post">
            @csrf
            <button class="btn btn-outline-danger">
              X
            </button>
          </form>
          <div class="card rounded-4 shadow-sm">
            <div class="card-body">
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              @foreach ($item->produk->gambar as $key=>$gambars)
              <div class="carousel-item {{ ($key == 0)?'active':'' }}">
                <img src="{{ asset('storage/'.$gambars->nama_gambar) }}"
                alt="{{ asset('storage/product/'.$gambars->nama_gambar) }}"
                width="100%"
                height="180">
              </div>  
              @endforeach
            </div>
          </div>
          <div class="product-detail pt-1">
            <div>
              <p class="title-detail">{{ $item->produk->nmproduk}}</p>
            </div>
          </div>
          <div class="product-detail pt-4">
            <div>
              <p class="label-detail mb-1">Price:</p>
              <p class="price-detail">Rp.{{ $item->produk->harga }}</p>
              <p class="label-detail mb-1">Tersisa {{ $item->produk->stok }}</p>
            </div>
        <a href="product/detail/{{ $item->produk->id }}">
            <button
              class="buy-product button btn-rounded active"
              onclick="handleBuy(this)"
              >
              Buy Now
            </button>
          </a>
        </div>
      </div>
    </div>
</div>
@endforeach 
</div>
</section>
@endsection