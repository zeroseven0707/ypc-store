@extends('component.member.sidnavbar')
@section('content')

<section class="d-flex flex-column gap-4">
  <div class="d-flex justify-content-between gap-3">
    <h4 class="title-section-content">Flash Shale</h4>
  </div>
  <div class="row g-4">
    @foreach ($product as $item)
    <div class="col-md-3 col-12">
      <div class="card rounded-4">
        <div class="card-body">
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          @foreach ($item->gambar as $key=>$gambars)
          <div class="carousel-item {{ ($key == 0)?'active':'' }}">
            <img src="{{ asset('storage/'.$gambars->nama_gambar) }}"
            alt="{{ asset('storage/product/'.$gambars->nama_gambar) }}"
            width="100%"
            height="140">
          </div>  
          @endforeach
        </div>
      </div>
      <div class="product-detail pt-1">
        <div>
          <p class="label-detail mb-1">7 Colours</p>
          <p class="title-detail">{{ $item['nmproduk'] }}</p>
        </div>
        <button
          class="btn btn-fav active"
          aria-label="Button Favorite"
          onclick="handleFavorite(this)"
        >
          <svg fill="currentColor">
            <path
              d="M11.5909 6.09528L12.1213 6.6256L12.6516 6.09528C14.4453 4.30157 17.3535 4.30157 19.1472 6.0953C20.941 7.88902 20.941 10.7972 19.1473 12.591L12.2207 19.5176C12.1658 19.5725 12.0768 19.5725 12.022 19.5176L5.10555 12.6012L5.10485 12.6005L5.0953 12.591C5.09519 12.5909 5.09508 12.5907 5.09497 12.5906C3.30157 10.7969 3.30168 7.88891 5.0953 6.0953C6.88902 4.30158 9.79721 4.30157 11.5909 6.09528Z"
              stroke="currentColor"
              stroke-width="2"
            />
          </svg>
        </button>
      </div>
      <div class="product-detail pt-4 ">
        <div>
          <p class="label-detail mb-1">Price:</p>
          <p class="price-detail">Rp.{{ $item['harga'] }}</p>
        </div>
      <a href="product/detail/{{ $item->id }}">
        <button
          class="buy-product p-2 badge btn-rounded active "
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
</section>
@endsection