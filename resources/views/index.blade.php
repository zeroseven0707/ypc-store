@extends('component.member.sidnavbar')
@section('content')
<section>
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="row row-cols-1">
          @foreach ($kat as $kategori)
          <div class="col-md-3">
            <div class="card" style="width: 18rem;">
              <img src="https://dummyimage.com/180x120/dbdbdb/787878.png&text=Image+cap" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{ $kategori['nmkategori'] }}</h5>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section>
      <section class="d-flex flex-column gap-4">
        <div class="row row-cols-3">
          @foreach ($kat as $kategori)
          <div class="col">
            <div class="card">
              <div class="card-body text-center">
                {{ $kategori['nmkategori'] }}
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="d-flex justify-content-between align-items-center gap-3">
          <h4 class="title-section-content">Flash Shale</h4>
        </div>
        <div class="d-flex gap-4 flex-wrap">
          @foreach ($product as $key=>$item)
          <div class="product-card">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner" style="width: 260px;">
                @foreach ($item->gambar as $gambars)
                <div class="carousel-item {{ ($key == 0)?'active':'' }}">
                  <img src="{{ asset('storage/'.$gambars->nama_gambar) }}"
                  alt="{{ asset('storage/product/'.$gambars->nama_gambar) }}"
                  width="260"
                  height="180">
                </div>
                @endforeach
              </div>
            </div>
            {{-- @foreach ($item->gambar as $img)
            <img
            src="./assets/images/nike_red.png"
            alt="Nike Red"
            width="260"
            height="180"
            />
            @endforeach --}}
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
            <div class="product-detail pt-4">
              <div>
                <p class="label-detail mb-1">Price:</p>
                <p class="price-detail">Rp.{{ $item['harga'] }}</p>
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
        @endforeach
        </div>
      </section>

      <section class="d-flex flex-column gap-4 mb-5">
        <h4 class="title-section-content">Best Seller</h4>
        <div class="d-flex gap-4 flex-wrap">
          @foreach ($penjual as $item)
          <div class="store-card">
            {{-- @foreach ($item->gambartoko as $key=>$gambartoko) --}}
                <img
                src="storage/{{ $item->gambartoko['0']['nama_gambar'] }}"
                alt="Adidas Store"
                width="410"
                height="100"
            />
                {{-- @endforeach --}}
            <div class="store-logo-wrapper">
              <div class="store-logo-circle">
                @if (count($item->gambartoko) == 2)
                <img
                src="storage/{{ $item->gambartoko['1']['nama_gambar'] }}"
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
      
      <section class="d-flex flex-column gap-4 mb-5">
        <h4 class="title-section-content">Best Store In This Month</h4>
        <div class="d-flex gap-4 flex-wrap">
          <div class="store-card">
              <img
                src="./assets/images/adidas.png"
                alt="Adidas Store"
                width="410"
                height="100"
              />
            <div class="store-logo-wrapper">
              <div class="store-logo-circle">
                <img
                  src="./assets/images/adidas_logo.png"
                  alt="Adidas Logo"
                  class="store-logo"
                />
              </div>
            </div>
            <div class="store-name">
              <div>
                <p class="title-store">
                  Adidas Store
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
                <h6>1.569</h6>
                <p>Total shoes</p>
              </div>
              <div class="vertical-line"></div>
              <div class="section-detail">
                <h6>5.2M</h6>
                <p>Total followers</p>
              </div>
              <div class="vertical-line"></div>
              <div class="section-detail">
                <h6>56</h6>
                <p>Exclusive Shoe</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      @endsection