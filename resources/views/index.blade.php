@extends('component.member.sidnavbar')
@section('content')
<section class="bg-white p-4 rounded-4 shadow-sm">
    <h4 class="title-section-content">Kategories</h4>
  <div class="row row-cols-2 g-4 mt-2">
  @foreach ($kat as $kategori)
    <div class="col-md-2 col-6 text-center">
      <div class="card shadow-sm">
        <a href="{{ url('category').'/'.$kategori['id'] }}" class="text-decoration-none text-dark">
          <img src="{{ asset('storage/'.$kategori['gambar']) }}" class="card-img-top " style="height: 6rem;" alt="...">
          <div class="card-body">
            <p class="card-title" style="font-size: 13px;">{{ $kategori['nmkategori'] }}</p>
          </div>
        </a>
      </div>
    </div>
    @endforeach
  </div>
</section>
      <section class="bg-white p-4 rounded-4 shadow">
          <h4 class="title-section-content">Products</h4>
        <div class="row g-4 mt-2">
          @foreach ($product as $item)
          <div class="col-md-4">
            <div class="card rounded-4 shadow-sm">
              <div class="card-body">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                @foreach ($item->gambar as $key=>$gambars)
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
                <p class="title-detail">{{ $item['nmproduk'] }}</p>
              </div>
              <form action="/like/{{ $item['id'] }}" method="post">
                @csrf
                <button
                  class="btn btn-fav active"
                  aria-label="Button Favorite"
                  >
                  <svg fill="currentColor">
                    <path
                    d="M11.5909 6.09528L12.1213 6.6256L12.6516 6.09528C14.4453 4.30157 17.3535 4.30157 19.1472 6.0953C20.941 7.88902 20.941 10.7972 19.1473 12.591L12.2207 19.5176C12.1658 19.5725 12.0768 19.5725 12.022 19.5176L5.10555 12.6012L5.10485 12.6005L5.0953 12.591C5.09519 12.5909 5.09508 12.5907 5.09497 12.5906C3.30157 10.7969 3.30168 7.88891 5.0953 6.0953C6.88902 4.30158 9.79721 4.30157 11.5909 6.09528Z"
                    stroke="currentColor"
                    stroke-width="2"
                  />
                </svg>
              </button>
            </form>
            </div>
            <div class="product-detail pt-4">
              <div>
                <p class="label-detail mb-1">Price:</p>
                <p class="price-detail">Rp.{{ $item['harga'] }}</p>
                <p class="label-detail mb-1">Tersisa {{ $item['stok'] }}</p>
              </div>
          <a href="product/detail/{{ $item->id }}">
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

      <section class="d-flex flex-column gap-4 mb-5">
        <h4 class="title-section-content">Best Seller</h4>
        <div class="d-flex gap-4 flex-wrap">
          @foreach ($penjual as $item)
          <div class="store-card">
                <img
                src="storage/{{ $item->gambartoko['0']['nama_gambar'] }}"
                alt="Adidas Store"
                width="410"
                height="100"
            />
            <div class="store-logo-wrapper">
              <div class="store-logo-circle">
                @if (count($item->gambartoko) == 2)
                <img
                src="storage/{{ $item->gambartoko['0']['nama_gambar'] }}"
                alt="Adidas Logo"
                class="store-logo"
                />
                @else
                <img
                src="storage/{{ $item->gambartoko['0']['nama_gambar'] }}"
                alt="Adidas Logo"
                class="store-logo"
                />
                @endif
              </div>
            </div>
            <div class="store-name">
              <div>
                <p class="title-store">
                  {{ $item['nama_toko'] }}
                  <span
                    ><img src="./assets/icons/ic_badge.svg" alt="Icon Badge"
                  /></span>
                </p>
                <p class="username-store">@adidasindonesia</p>
              </div>
              <div class="d-flex gap-3 align-items-center">
                <a href="#" class="btn-link"> Visit Store </a>
                <button
                  class="button btn-follow active rounded-pill"
                  onclick="handleFollow(this)"
                >
                  Following
                </button>
              </div>
            </div>
            <div class="store-detail">
              <div class="section-detail">
                <h6>{{ count($item->produk) }}</h6>
                <p>Total product</p>
              </div>
              <div class="vertical-line"></div>
              <div class="section-detail">
                <h6>5.2M</h6>
                <p>Total followers</p>
              </div>
              <div class="vertical-line"></div>
              <div class="section-detail">
                <h6>56</h6>
                <p>Terjual</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </section> 
      
      @endsection