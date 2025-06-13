<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <title>Admin | {{ $title }}</title>
    <meta charset="utf-8">
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layout.admin.link-admin')
    @yield('custom-css-admin')
</head>

<body class="body">
    <div id="wrapper">
        <div id="page" class="">
            <div class="layout-wrap">

                <!-- <div id="preload" class="preload-container">
                        <div class="preloading">
                            <span></span>
                        </div>
                    </div> -->

                <div class="section-menu-left">
                    <div class="box-logo">
                        {{-- <a href="index.html" id="site-logo-inner">
                            <img class="" id="logo_header" alt="" src="{{ url('') }}/assets/images-admin/logo/logo.png"
                                data-light="{{ url('') }}/assets/images-admin/logo/logo.png" data-dark="{{ url('') }}/assets/images-admin/logo/logo.png">
                        </a> --}}
                        <h6 class="fw-bold">23.Foodies</h6>
                        <div class="button-show-hide ms-auto">
                            <i class="icon-menu-left"></i>
                        </div>
                    </div>
                    <div class="center">
                        @include('layout.admin.sidebar-admin')
                    </div>
                </div>
                <div class="section-content-right">

                    <div class="header-dashboard">
                        <div class="wrap">
                            <div class="header-left">
                                <a href="index-2.html">
                                    <img class="" id="logo_header_mobile" alt="" src="{{ url('') }}/assets/images-admin/logo/logo.png"
                                        data-light="{{ url('') }}/assets/images-admin/logo/logo.png" data-dark="{{ url('') }}/assets/images-admin/logo/logo.png"
                                        data-width="154px" data-height="52px" data-retina="{{ url('') }}/assets/images-admin/logo/logo.png">
                                </a>
                                <div class="button-show-hide">
                                    <i class="icon-menu-left"></i>
                                </div>
                            </div>
                            <div class="header-grid">
                                @include('layout.admin.profile-admin')
                            </div>
                        </div>
                    </div>

                    <div class="main-content">
                        @yield('content-admin')
                        @include('layout.admin.footer-page-admin')
                    </div>

                </div>
            </div>
        </div>
    </div>
@include('layout.admin.script-admin')
{{-- Sweet Alert --}}
@include('layout.sweetalert')

@yield('custom-js-admin')
</body>

</html>