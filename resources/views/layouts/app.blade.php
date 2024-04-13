<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/Auth.css') }}" />
    <link href="{{ asset('css/buyPage.css') }}" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        />

    <!-- Scripts -->
    <!-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
</head>
<body>
<main id="" style="background-color:#fff">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <div class="navbar-brand d-block d-lg-none mt-2" href="#">
                        <a href="{{ url('/') }}">
                            <h2 class="logo" style="color:#000">Let's Ukay</h2>
                        </a>
                    </div>
                    <button
                    class="navbar-toggler navbar_toggle"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                    style="background-color:#000">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-start mt-3" id="navbarSupportedContent">
                        <div class="navbar-brand d-none d-lg-block">
                            <a href="{{ url('/') }}">
                                <h2 style="color:#000" class="logo center-logo">Let's Ukay</h2>
                            </a>
                        </div>
                        <ul class="navbar-nav">
                            <li class="nav-item" style="margin-right: 0;">
                            <a style="color:#000;margin-left:1rem" class="nav-link active" aria-current="page" href="{{ route('buy') }}">| <span style="font-weight:700;margin-left:1rem;">Shop</span></a>
                            </li>
                            <li class="nav-item" style="margin-right: 0;">
                            <a style="color:#000;margin-left:1rem;" class="nav-link" href="{{ route('sell') }}">| <span style="font-weight:700;margin-left:1rem;">Sell</span></a>
                            </li>
                            <li class="nav-item" style="margin-right: 0;">
                            <a style="color:#000;margin-left:1rem" class="nav-link" href="{{ route('donate') }}">| <span style="font-weight:700;margin-left:1rem;">Donate</span></a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            @guest
                            <!--     @if(Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ Route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ Route('register') }}">Signup</a>
                            </li> -->
                            @endif
                            @else
                            <li class="nav-item">
                                <a href="{{ route('cart') }}" class="notification nav-link" style="text-decoration: none; color:#fff;">
                                Cart
                                    <i class="fa-solid fa-cart-shopping" style="font-size: 20px;cursor: pointer"></i>
                                    @if(empty($cart_order))
                                        <span class="badge"></span>
                                    @else
                                        <span class="badge">{{ $cart_order->count() }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="navbarDropdown" class="nav-link" href="{{ route('welcome') }}" >
                                    {{ $firstName }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('logout') }}" class="nav-link"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </nav>
            </div>
        </main>


    <main class="py-4">
        @yield('content')
    </main>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
