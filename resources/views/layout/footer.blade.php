<footer class="footer footer_type_2">
  <div class="footer-middle container">
    <div class="row row-cols-lg-5 row-cols-2">
      <div class="footer-column footer-store-info col-12 mb-4 mb-lg-0">
        <p class="footer-address">{{ session('alamat') }}</p>
        <p class="m-0"><strong class="fw-medium">{{ session('email') }}</strong></p>
        <p><strong class="fw-medium">{{ session('no_hp') }}</strong></p>

      </div>

      {{-- <div class="footer-column footer-menu mb-4 mb-lg-0">
        <h6 class="sub-menu__title text-uppercase">Company</h6>
        <ul class="sub-menu__list list-unstyled">
          <li class="sub-menu__item"><a href="about-2.html" class="menu-link menu-link_us-s">About Us</a></li>
          <li class="sub-menu__item"><a href="contact-2.html" class="menu-link menu-link_us-s">Contact Us</a></li>
        </ul>
      </div> --}}
    </div>
  </div>

  <div class="footer-bottom">
    <div class="container d-md-flex align-items-center">
      <span class="footer-copyright me-auto">©{{ now()->year }} 23.Foodies</span>
      {{-- <div class="footer-settings d-md-flex align-items-center">
        <a href="privacy-policy.html">Privacy Policy</a> &nbsp;|&nbsp; <a href="terms-conditions.html">Terms &amp;
          Conditions</a>
      </div> --}}
    </div>
  </div>
</footer>