<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <title>Admin | {{ $title }}</title>
    <meta charset="utf-8">
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layout.admin.link-admin')
    <style>
        .center-screen {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh; /* Full viewport height */
        }
    </style>
</head>

<body class="body">
    <div id="wrapper">
        <div class="layout-wrap center-screen">

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="main-content-wrap">
                        <div class="tf-section mb-30">
                            <div class="wg-box" style="width: 460px; margin: auto;">
                                <h4 class="text-center mb-30">Login</h4>

                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
                                
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                <form action="{{ route('login.post') }}" method="POST">
                                    @csrf

                                    {{-- <div class="mb-20">
                                        <label for="email" class="body-text mb-2">Email</label>
                                        <input type="email" id="email" name="email" required
                                            class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan email...">
                                        @error('email')
                                            <div class="text-danger text-tiny mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-20">
                                        <label for="password" class="body-text mb-2">Password</label>
                                        <input type="password" id="password" name="password" required
                                            class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password...">
                                        @error('password')
                                            <div class="text-danger text-tiny mt-2">{{ $message }}</div>
                                        @enderror
                                    </div> --}}

                                    <fieldset class="name mb-20">
                                        <div class="body-title">Email</div>
                                        <input class="flex-grow form-control @error('email') is-invalid @enderror" type="email" placeholder="Masukkan email..." name="email"
                                            tabindex="0" aria-required="true" required>
                                    </fieldset>
                                    <fieldset class="name mb-20">
                                        <div class="body-title">Password</div>
                                        <input class="flex-grow form-control @error('password') is-invalid @enderror" type="password" placeholder="Masukkan password..." name="password"
                                            tabindex="0" aria-required="true" required>
                                    </fieldset>

                                    <div class="mb-20 text-center">
                                        <button type="submit" class="tf-button w-full">Log In</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</body>

</html>