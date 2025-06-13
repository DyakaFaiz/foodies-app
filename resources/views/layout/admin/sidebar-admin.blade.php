<div class="center-item">
    <div class="center-heading">Halaman Utama</div>
    <ul class="menu-list">
        <li class="menu-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">
            <a href="{{ route('admin.index') }}" class="">
                <div class="icon"><i class="icon-grid"></i></div>
                <div class="text">Dashboard</div>
            </a>
        </li>
    </ul>
</div>
<div class="center-item">
    <ul class="menu-list">
        {{-- <li class="menu-item has-children">
            <a href="javascript:void(0);" class="menu-item-button">
                <div class="icon"><i class="icon-shopping-cart"></i></div>
                <div class="text">Products</div>
            </a>
            <ul class="sub-menu">
                <li class="sub-menu-item">
                    <a href="add-product.html" class="">
                        <div class="text">Add Product</div>
                    </a>
                </li>
                <li class="sub-menu-item">
                    <a href="products.html" class="">
                        <div class="text">Products</div>
                    </a>
                </li>
            </ul>
        </li> --}}
        <li class="menu-item {{ request()->routeIs('admin.pesanan.index') ? 'active' : '' }}">
            <a href="{{ route('admin.pesanan.index') }}" class="">
                <div class="icon"><i class="icon-file-plus"></i></div>
                <div class="text">Pesanan</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('admin.produk.index') ? 'active' : '' }}">
            <a href="{{ route('admin.produk.index') }}" class="">
                <div class="icon"><i class="icon-shopping-cart"></i></div>
                <div class="text">Produk</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('admin.profil.index') ? 'active' : '' }}">
            <a href="{{ route('admin.profil.index') }}" class="">
                <div class="icon"><i class="icon-user"></i></div>
                <div class="text">Profil Toko</div>
            </a>
        </li>
        {{-- <li class="menu-item has-children">
            <a href="javascript:void(0);" class="menu-item-button">
                <div class="icon"><i class="icon-layers"></i></div>
                <div class="text">Brand</div>
            </a>
            <ul class="sub-menu">
                <li class="sub-menu-item">
                    <a href="add-brand.html" class="">
                        <div class="text">New Brand</div>
                    </a>
                </li>
                <li class="sub-menu-item">
                    <a href="brands.html" class="">
                        <div class="text">Brands</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item has-children">
            <a href="javascript:void(0);" class="menu-item-button">
                <div class="icon"><i class="icon-layers"></i></div>
                <div class="text">Category</div>
            </a>
            <ul class="sub-menu">
                <li class="sub-menu-item">
                    <a href="add-category.html" class="">
                        <div class="text">New Category</div>
                    </a>
                </li>
                <li class="sub-menu-item">
                    <a href="categories.html" class="">
                        <div class="text">Categories</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item has-children">
            <a href="javascript:void(0);" class="menu-item-button">
                <div class="icon"><i class="icon-file-plus"></i></div>
                <div class="text">Order</div>
            </a>
            <ul class="sub-menu">
                <li class="sub-menu-item">
                    <a href="orders.html" class="">
                        <div class="text">Orders</div>
                    </a>
                </li>
                <li class="sub-menu-item">
                    <a href="order-tracking.html" class="">
                        <div class="text">Order tracking</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="slider.html" class="">
                <div class="icon"><i class="icon-image"></i></div>
                <div class="text">Slider</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="coupons.html" class="">
                <div class="icon"><i class="icon-grid"></i></div>
                <div class="text">Coupns</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="settings.html" class="">
                <div class="icon"><i class="icon-settings"></i></div>
                <div class="text">Settings</div>
            </a>
        </li> --}}
    </ul>
</div>