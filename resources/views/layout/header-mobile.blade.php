  {{-- Mobile --}}
  <div class="header-mobile header_sticky">
    <div class="container d-flex align-items-center h-100">
      <a class="mobile-nav-activator d-block position-relative" href="#">
        <svg class="nav-icon" width="25" height="18" viewBox="0 0 25 18" xmlns="http://www.w3.org/2000/svg">
          <use href="#icon_nav" />
        </svg>
        <button class="btn-close-lg position-absolute top-0 start-0 w-100"></button>
      </a>

      <div class="logo">
        <a href="#">
          <img src="assets/images/logo.png" alt="Uomo" class="logo__image d-block" />
        </a>
      </div>

      {{-- Logo Cart --}}
      <a href="#" class="header-tools__item header-tools__cart js-open-aside" data-aside="cartDrawer">
        <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <use href="#icon_cart" />
        </svg>
        <span class="cart-amount d-block position-absolute js-cart-items-count">3</span>
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
              <a href="#" class="navigation__link">About</a>
            </li>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>