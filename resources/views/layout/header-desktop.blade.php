
  {{-- Desktop --}}
  <header id="header" class="header header-fullwidth header-transparent-bg">
    <div class="container">
      <div class="header-desk header-desk_type_1">
        <div class="logo">
          <a href="index.html">
            <img src="assets/images/logo.png" alt="Uomo" class="logo__image d-block" />
          </a>
        </div>

        <nav class="navigation">
          <ul class="navigation__list list-unstyled d-flex">
            <li class="navigation__item">
              <a href="{{ route('dashboard-website') }}" class="navigation__link">Home</a>
            </li>
            <li class="navigation__item">
              <a href="about.html" class="navigation__link">About</a>
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

          <div class="header-tools__item hover-container">
            <a href="login.html" class="header-tools__item">
              <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_user" />
              </svg>
            </a>
          </div>

          <a href="wishlist.html" class="header-tools__item">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_heart" />
            </svg>
          </a>

          <a href="cart.html" class="header-tools__item header-tools__cart">
            <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_cart" />
            </svg>
            <span class="cart-amount d-block position-absolute js-cart-items-count">3</span>
          </a>
        </div>
      </div>
    </div>
  </header>