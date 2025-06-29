@extends('layout.main')

@section('content')
<section class="products-grid container">
    <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">Menu</h2>

    <div class="row">
        @foreach ($produk as $row)
            <div class="col-6 col-md-4 col-lg-3">
                <div class="product-card product-card_style3 mb-3 mb-md-4 mb-xxl-5">
                <div class="pc__img-wrapper">
                    <a href="{{ route('detail-website', [$row->id]) }}">
                    <img loading="lazy" src="{{ url('') }}/assets/images/produk/{{ $row->foto }}" width="330" height="400"
                        alt="{{ $row->nama }}" class="pc__img">
                    </a>
                </div>

                <div class="pc__info position-relative">
                    <h6 class="pc__title"><a href="{{ route('detail-website', [$row->id]) }}">{{ $row->nama }}</a></h6>
                    <div class="product-card__price d-flex align-items-center">
                    <span class="money price text-secondary"><sup>Rp.</sup>{{ number_format($row->harga, 0, ',', '.') }}</span>
                    </div>

                    {{-- <div
                    class="anim_appear-bottom position-absolute bottom-0 start-0 d-none d-sm-flex align-items-center bg-body">
                    <button class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-add-cart js-open-aside"
                        data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                    </div> --}}
                </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection

@section('custom-js')
<script>
    const dataUser = {!! $dataUser !!};

    if (!localStorage.getItem('idTamu')) {
        let guestId;
        let found = false;
        do {
            guestId = 'guest-' + Date.now() + '-' + Math.floor(Math.random() * 10000);
            found = dataUser.includes(guestId);
        } while (found);

        localStorage.setItem('idTamu', guestId);
    }

    const formData = [
        {
            name: 'idTamu',
            value: localStorage.getItem('idTamu')
        }
    ];

    $.ajax({
        url: "{{ route('store-id') }}",
        type: "POST",
        data: $.param(formData),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function () {
            // Tampilkan loading jika perlu
        },
        success: function (response) {
            // console.log('====================================');
            // console.log(response);
            // console.log('====================================');
        },
        error: function (xhr) {
            // console.log('====================================');
            // console.log(xhr);
            // console.log('====================================');
        }
    });
</script>
@endsection