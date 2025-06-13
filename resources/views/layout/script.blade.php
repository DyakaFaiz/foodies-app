<script src="{{ asset('assets/js/plugins/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap-slider.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/countdown.js') }}"></script>
<script src="{{ asset('assets/js/theme.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $(document).ready(function() {
    const baseCartUrl = "{{ url('cart') }}/";
    const baseShippingUrl = "{{ url('cart/shipping') }}/";

    const idTamu = localStorage.getItem('idTamu');

    $('#btn-shopping-bag').on('click', function() {
      if (idTamu) {
        window.location.href = baseCartUrl + idTamu;
      } else {
        Swal.fire({
            toast: true,
            icon: 'error',
            title: 'Keranjang tidak ditemukan!',
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
      }
    });
  });
</script>