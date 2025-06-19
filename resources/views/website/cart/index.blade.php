@extends('layout.main')

@section('content')
<section class="shop-checkout container">
    <h2 class="page-title">Cart</h2>
    @if (isset($items) && !empty($items))
        <div class="checkout-steps">
            <a href="#" class="checkout-steps__item active">
                <span class="checkout-steps__item-number">01</span>
                <span class="checkout-steps__item-title">
                <span>Shopping Bag</span>
                <em>Manage Your Items List</em>
                </span>
            </a>
            <a href="#" id="btn-shipping" class="checkout-steps__item">
                <span class="checkout-steps__item-number">02</span>
                <span class="checkout-steps__item-title">
                <span>Shipping and Checkout</span>
                <em>Checkout Your Items List</em>
                </span>
            </a>
            <a href="#" class="checkout-steps__item">
                <span class="checkout-steps__item-number">03</span>
                <span class="checkout-steps__item-title">
                <span>Confirmation</span>
                <em>Review And Submit Your Order</em>
                </span>
            </a>
        </div>
        <div class="shopping-cart">
            <div class="cart-table__wrapper">
                <table class="cart-table">
                <thead>
                    <tr>
                    <th>Menu</th>
                    <th></th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $row)
                        <tr>
                            <td>
                                <div class="shopping-cart__product-item">
                                <img loading="lazy" src="{{ url('') }}/assets/images/produk/{{ $row->foto }}" width="120" height="120" alt="" />
                                </div>
                            </td>
                            <td>
                                <div class="shopping-cart__product-item__detail">
                                <h4>{{ $row->nama }}</h4>
                                </div>
                            </td>
                            <td>
                                <span class="shopping-cart__product-price">{{ $row->harga }}</span>
                            </td>
                            <td>
                                <div class="qty-control position-relative">
                                    <form id="form-update-item" action="{{ route('update-item', ['id' => $row->idItem]) }}">
                                        @csrf
                                        <input type="hidden" name="idProduk" value="{{ $row->idProduk }}">
                                        <input type="hidden" name="idKeranjang" value="{{ $cart->id }}">
                                        <input type="number" name="jumlah" value="{{ $row->jumlah }}" min="1" class="qty-control__number text-center">
                                        <div class="qty-control__reduce jumlah">-</div>
                                        <div class="qty-control__increase jumlah">+</div>
                                    </form>
                                </div>
                            </td>
                            <td>
                                <span class="shopping-cart__subtotal">{{ number_format($row->harga, 0, ',', '.') }}</span>
                            </td>
                            <td>
                                <a href="{{ route('delete-item', ['id'  => $row->idItem]) }}" class="remove-cart">
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z" />
                                        <path d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            <div class="shopping-cart__totals-wrapper">
                <div class="sticky-content">
                    <div class="shopping-cart__totals">
                        <h3>Total Keranjang</h3>
                        <table class="cart-totals">
                        <tbody>
                            @php
                                $total = $items->sum(function ($row) {
                                    return ($row->jumlah ?? 0) * ($row->harga ?? 0);
                                });
                            @endphp
                            
                            <tr>
                                <th>Total</th>
                                <td>Rp. <span id="total-harga">{{ number_format($total, 0, ',', '.')  }}</span></td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    <div class="mobile_fixed-btn_wrapper">
                        <div class="button-wrapper container">
                            <a href="{{ route('shipping-cart', ['id' => $idTamu]) }}" class="btn btn-primary btn-checkout">Check out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <p>Keranjang kosong</p>
    @endif
</section>
@endsection

@section('custom-js')
<script>
    $(document).ready(function(){
        $('.jumlah').on('click', function () {
            let $form = $(this).closest('form');
            let formData = $form.serialize();
            let actionUrl = $form.attr('action');

            $.ajax({
                url: actionUrl,
                method: 'POST',
                data: formData,
                success: function (response) {
                    $('#total-harga').text(response.totalHarga)
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
                error: function (xhr) {
                    // console.log('Gagal update:', xhr);
                    Swal.fire({
                        toast: true,
                        icon: 'error',
                        title: 'Gagal memperbarui data.',
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