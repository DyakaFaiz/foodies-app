@extends('layout.main')

@section('content')
    <section class="product-single container">
      <div class="row">
        <div class="col-lg-7">
          <div class="product-single__media" data-media-type="vertical-thumbnail">
            <div class="product-single__image">
              <div class="swiper-container">
                <div class="swiper-wrapper">

                  <div class="swiper-slide product-single__image-item" style="width: 300px; height: 400px; overflow: hidden; display: flex; justify-content: center; align-items: center;">
                    <img 
                      loading="lazy" 
                      src="{{ url('') }}/assets/images/produk/{{ $produk->foto }}" 
                      alt="" 
                      style="width: 100%; height: 100%; object-fit: cover;" />
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
            <span class="current-price">Rp. {{ number_format($produk->harga, 0, ',', '.') }}</span>
          </div>
          <div class="product-single__short-desc">
            <p>{{ $produk->deskripsi }}</p>
          </div>
          <form id="to-cart-form" method="POST">
            <div class="product-single__addtocart">
              <div class="qty-control position-relative">
                <input type="hidden" name="idProduk" value="{{ $produk->id }}">
                <input type="number" name="jumlahPesanan" value="1" min="1" class="qty-control__number text-center">
                <div class="qty-control__reduce">-</div>
                <div class="qty-control__increase">+</div>
              </div><!-- .qty-control -->
              <button type="submit" class="btn btn-primary btn-addtocart" data-aside="cartDrawer">Add to Cart</button>
            </div>
          </form>
        </div>
      </div>
    </section>
@endsection

@section('custom-js')
<script>
$(document).ready(function() {
  $('#to-cart-form').on('submit', function(e) {
    e.preventDefault(); // mencegah form reload

    let form = $(this);
    let formData = form.serializeArray();

    // Tambahkan idTamu
    formData.push({
      name: 'idTamu',
      value: localStorage.getItem('idTamu')
    });

    $.ajax({
      url: "{{ route('store-cart') }}", // ganti sesuai route kamu
      type: "POST",
      data: $.param(formData),
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      beforeSend: function() {
        // Bisa tambahkan loading di sini
      },
      success: function(response) {
        Swal.fire({
          toast: true,
          icon: 'success',
          title: response.message,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true
        });
      },
      error: function(xhr) {
        Swal.fire({
            toast: true,
            icon: 'error',
            title: 'Gagal menambahkan ke barang.',
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
      }
    });
  });
});
</script>
@endsection