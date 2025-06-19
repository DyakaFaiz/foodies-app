
  {{-- Desktop --}}
  <header id="header" class="header header-fullwidth header-transparent-bg">
    <div class="container">
      <div class="header-desk header-desk_type_1">

        {{-- <div class="logo">
          <a href="index.html">
            <img src="assets/images/logo.png" alt="Uomo" class="logo__image d-block" />
          </a>
        </div> --}}

        <h6 class="fw-bold">23.Foodies</h6>

        <nav class="navigation">
          <ul class="navigation__list list-unstyled d-flex">
            <li class="navigation__item">
              <a href="{{ route('dashboard-website') }}" class="navigation__link">Home</a>
            </li>
            <li class="navigation__item">
              <a href="{{ route('index-riwayat') }}" class="navigation__link">Riwayat Pemesanan</a>
            </li>
          </ul>
        </nav>

        <div class="header-tools d-flex align-items-center">
          <div class="header-tools__item hover-container">
            <div class="js-hover__open position-relative">
              <a class="js-search-popup search-field__actor" href="#">
                <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_search" />
                </svg>
                <i class="btn-icon btn-close-lg"></i>
              </a>
            </div>
          </div>

          <a href="javascript:void(0)" id="btn-shopping-bag" class="header-tools__item header-tools__cart" data-aside="cartDrawer">
            <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_cart" />
            </svg>
            @if (session('jmlIsiKeranjang'))
              <span class="cart-amount d-block position-absolute js-cart-items-count">{{ session('jmlIsiKeranjang') }}</span>
            @endif
          </a>
        </div>
      </div>
    </div>
  </header>