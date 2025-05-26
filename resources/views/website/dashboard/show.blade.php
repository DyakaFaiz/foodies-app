@extends('layout.main')

@section('content')
    <section class="product-single container">
      <div class="row">
        <div class="col-lg-7">
          <div class="product-single__media" data-media-type="vertical-thumbnail">
            <div class="product-single__image">
              <div class="swiper-container">
                <div class="swiper-wrapper">

                  <div class="swiper-slide product-single__image-item">
                    <img loading="lazy" class="h-auto" src="{{ url('') }}/assets/images/home/demo3/{{ $produk->foto }}" width="674"
                      height="674" alt="" />
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <h1 class="product-single__name">{{ $produk->nama }}</h1>
          {{-- <div class="product-single__rating">
            <div class="reviews-group d-flex">
              <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_star" />
              </svg>
              <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_star" />
              </svg>
              <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_star" />
              </svg>
              <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_star" />
              </svg>
              <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_star" />
              </svg>
            </div>
            <span class="reviews-note text-lowercase text-secondary ms-1">8k+ reviews</span>
          </div> --}}
          <div class="product-single__price">
            <span class="current-price">Rp.{{ $produk->harga }}</span>
          </div>
          <div class="product-single__short-desc">
            <p>{{ $produk->deskripsi }}</p>
          </div>
          <form id="to-cart-form" method="post">
            @csrf
            <div class="product-single__addtocart">
              <div class="qty-control position-relative">
                <input type="hidden" name="idProduk" value="{{ $produk->id }}">
                <input type="number" name="jumlahPesanan" value="1" min="1" class="qty-control__number text-center">
                <div class="qty-control__reduce">-</div>
                <div class="qty-control__increase">+</div>
              </div><!-- .qty-control -->
              <button type="submit" class="btn btn-primary btn-addtocart js-open-aside" data-aside="cartDrawer">Add to Cart</button>
            </div>
          </form>
        </div>
      </div>
    </section>
@endsection