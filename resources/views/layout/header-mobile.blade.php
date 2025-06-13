{{-- Mobile --}}
<div class="header-mobile header_sticky">
  <div class="container d-flex align-items-center h-100">
    <!-- Mobile Nav -->
    <a class="mobile-nav-activator d-block position-relative" href="#">
      <svg class="nav-icon" width="25" height="18" viewBox="0 0 25 18" xmlns="http://www.w3.org/2000/svg">
        <use href="#icon_nav" />
      </svg>
      <button class="btn-close-lg position-absolute top-0 start-0 w-100"></button>
    </a>

    {{-- Logo Cart --}}
    <a href="javascript:void(0)" id="btn-shopping-bag" class="header-tools__item header-tools__cart ms-auto position-relative" data-aside="cartDrawer">
      <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <use href="#icon_cart" />
      </svg>
      @if (session('jmlIsiKeranjang'))
        <span class="cart-amount d-block position-absolute top-100 start-100 translate-middle badge rounded-pill bg-danger js-cart-items-count">
          {{ session('jmlIsiKeranjang') }}
        </span>
      @endif
    </a>
  </div>

  <nav class="header-mobile__navigation navigation d-flex flex-column w-100 position-absolute top-100 bg-body overflow-auto">
    <div class="container  mt-3">
      <div class="overflow-hidden">
        <ul class="navigation__list list-unstyled position-relative">
          <li class="navigation__item">
            <a href="{{ route('dashboard-website') }}" class="navigation__link">Home</a>
          </li>
          <li class="navigation__item">
            <a href="{{ route('index-riwayat') }}" class="navigation__link">Riwayat Pemesanan</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>