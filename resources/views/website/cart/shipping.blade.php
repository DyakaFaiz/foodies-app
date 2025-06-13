@extends('layout.main')

@section('content')
<section class="shop-checkout container">
    <h2 class="page-title">Pengiriman dan Pembayaran</h2>
    <div class="checkout-steps">
        <a href="#" class="checkout-steps__item active">
            <span class="checkout-steps__item-number">01</span>
            <span class="checkout-steps__item-title">
            <span>Tas Belanja</span>
            <em>Atur Daftar Item Anda</em>
            </span>
        </a>
        <a href="#" class="checkout-steps__item active">
            <span class="checkout-steps__item-number">02</span>
            <span class="checkout-steps__item-title">
            <span>Pengiriman dan Pembayaran</span>
            <em>Periksa Daftar Barang Anda</em>
            </span>
        </a>
        <a href="#" class="checkout-steps__item">
            <span class="checkout-steps__item-number">03</span>
            <span class="checkout-steps__item-title">
            <span>Konfirmasi</span>
            <em>Tinjau Pesanan Anda</em>
            </span>
        </a>
    </div>
    <form id="form-checkout" enctype="multipart/form-data">
        @csrf
        <div class="checkout-form">
            <div class="billing-info__wrapper">
                <div class="row">
                    <div class="col-6">
                    <h4>RINCIAN PENGIRIMAN</h4>
                    </div>
                    <div class="col-6">
                    </div>  
                </div>

                <div class="row mt-5">
                    <div class="col-md-6">
                    <div class="form-floating my-3">
                        <input type="text" class="form-control" name="nama">
                        <label for="nama">Nama Lengkap *</label>
                        <span class="text-danger"></span>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating my-3">
                            <input type="text" class="form-control" name="hp">
                            <label for="hp">Nomor  HP *</label>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating my-3">
                            <input type="text" class="form-control" name="alamat">
                            <label for="alamat">Alamat *</label>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="checkout__totals-wrapper">
                <div class="sticky-content">
                    <div class="checkout__totals">
                    <h3>Pesanan anda</h3>
                    <table class="checkout-cart-items">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th align="right">SUBTOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $row)
                                <tr>
                                    <td>
                                        {{ $row->nama }} {{ $row->jumlah > 1 ? "x" . $row->jumlah: "" }}
                                    </td>
                                    <td align="right">
                                        {{ number_format($row->jumlah * $row->harga, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                     @php
                        $total = $items->sum(function ($row) {
                            return ($row->jumlah ?? 0) * ($row->harga ?? 0);
                        });
                    @endphp
                    <table class="checkout-totals">
                        <tbody>
                            <tr>
                                <th>TOTAL</th>
                                <td align="right">{{ number_format($total, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <div class="checkout__payment-methods">
                        <div class="form-check">
                        <input class="form-check-input form-check-input_fill" type="radio" name="metodePembayaran" id="checkout_payment_method_1" value="transfer" checked>
                        <label class="form-check-label" for="checkout_payment_method_1">
                            Transfer
                            {!! session('rekening') !!}
                            <p class="option-detail">
                            <input type="file" name="buktiTransfer" class="form-control-file" placeholder="lampirkan bukti transfer disini">
                            </p>
                        </label>
                        </div>

                        <div class="form-check">
                        <input class="form-check-input form-check-input_fill" type="radio" name="metodePembayaran" id="payment_cod" value="cod">
                        <label class="form-check-label" for="payment_cod">
                            Cash on Delivery
                            <p class="option-detail">
                            Siapkan uang anda sebesar Rp {{ number_format($total, 0, ',', '.') }} saat menerima pesanan.
                            </p>
                        </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-checkout">TEMPATKAN PESANAN</button>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection

@section('custom-js')
<script>
  $(document).ready(function() {

    $('#form-checkout').on('submit', function(e) {
        e.preventDefault(); // ✅ Cegah reload

        let form = $('#form-checkout')[0];
        let formData = new FormData(form);

        formData.append('idTamu', localStorage.getItem('idTamu'));

        $.ajax({
            url: "{{ route('checkout-cart') }}",
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
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

                // Buat URL redirect dinamis
                let redirectUrl = "{{ route('order-confirmation', ['kodePesanan' => ':kode']) }}";
                redirectUrl = redirectUrl.replace(':kode', response.kodePesanan);

                setTimeout(function() {
                    window.location.href = redirectUrl;
                }, 3000);
            },
            error: function(xhr) {
                let errorMsg = xhr.responseJSON?.message || 'Gagal memproses pesanan.';
                Swal.fire({
                    toast: true,
                    icon: 'error',
                    title: errorMsg,
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
