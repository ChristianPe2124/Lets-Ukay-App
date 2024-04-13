<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ukay - Ukay</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        />

        <!-- Styles -->
        <style>
            html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">


        <div id="header">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <div class="navbar-brand d-block d-lg-none" href="#">
                        <a href="https://mdenjamulislam.github.io/">
                            <h2 class="logo">Let's Ukay</h2>
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
                        >
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('buy') }}">SHOP</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('sell') }}">SELL</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('donate') }}">DONATE</a>
                            </li>
                        </ul>
                        <div class="navbar-brand d-none d-lg-block" href="{{ route('home') }}">
                            <a href="#">
                            <h2 class="logo center-logo">Let's Ukay</h2>
                            </a>
                        </div>
                        <ul class="navbar-nav">
                            @guest
                                @if(Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('welcome') }}">ABOUT</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ Route('login') }}">LOGIN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ Route('register') }}">SIGNUP</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    About
                                </a>
                            </li>
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
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                                {{ $firstName }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ url('my-orders') }}">
                                        My Order
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">My Account</a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </nav>
            </div>
        </div>


    <!--Header-->
    <header
      class="py-5 bg-image"
      style="
        background-image: url('./images/header2.svg');
        height: 100vh;
        background-repeat: no-repeat;
        background-size: cover;
      "
    >
      <div class="container px-5">
        <div class="row gx-5 justify-content-start">
          <div class="col-lg-6">
            <div class="text-center my-5 first_Content">
              <h1 class="display-5 fw-normal text-black mb-2 title_Header">
                Discover a vibrant community that provides a platform for
                individuals alike to <span>shop</span> or <span>sell</span> and
                <span>donate</span> a wide range of products.
              </h1>
              <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                <a href="https://www.w3schools.com/">
                  <button class="display-5 btn_Start">Start Now</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!--About-->
    <section
      class="bg-warning p-2 text-black bg-opacity-50 py-5 border-bottom second_About"
    >
      <div class="container px-5 my-5">
        <div class="row gx-5">
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div>
              <img
                src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAyMS4wLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iX3gzMV8iIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgMjQgMjQiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDI0IDI0IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNDgiIGhlaWdodD0iNDgiPg0KPHBhdGggZD0iTTIwLjc1LDEzYy0xLjE5NCwwLTIuMjQtMC42NDctMi44MDYtMS42MUMxNy4zMjEsMTIuMzU4LDE2LjIzNCwxMywxNSwxM2MtMS4yNzEsMC0yLjM4Ny0wLjY4Mi0zLTEuNjk5DQoJQzExLjM4NywxMi4zMTgsMTAuMjcxLDEzLDksMTNjLTEuMjM0LDAtMi4zMjEtMC42NDItMi45NDQtMS42MUM1LjQ5LDEyLjM1Myw0LjQ0NCwxMywzLjI1LDEzQzEuNDU4LDEzLDAsMTEuNTQyLDAsOS43NVY0LjUNCglDMCw0LjIyNCwwLjIyNCw0LDAuNSw0UzEsNC4yMjQsMSw0LjV2NS4yNUMxLDEwLjk5MSwyLjAxLDEyLDMuMjUsMTJTNS41LDEwLjk5MSw1LjUsOS43NVY3LjVDNS41LDcuMjI0LDUuNzI0LDcsNiw3DQoJczAuNSwwLjIyNCwwLjUsMC41djJDNi41LDEwLjg3OCw3LjYyMSwxMiw5LDEyczIuNS0xLjEyMiwyLjUtMi41di0yQzExLjUsNy4yMjQsMTEuNzI0LDcsMTIsN3MwLjUsMC4yMjQsMC41LDAuNXYyDQoJYzAsMS4zNzgsMS4xMjEsMi41LDIuNSwyLjVzMi41LTEuMTIyLDIuNS0yLjV2LTJDMTcuNSw3LjIyNCwxNy43MjQsNywxOCw3czAuNSwwLjIyNCwwLjUsMC41djIuMjVjMCwxLjI0MSwxLjAxLDIuMjUsMi4yNSwyLjI1DQoJUzIzLDEwLjk5MSwyMyw5Ljc1VjQuNUMyMyw0LjIyNCwyMy4yMjQsNCwyMy41LDRTMjQsNC4yMjQsMjQsNC41djUuMjVDMjQsMTEuNTQyLDIyLjU0MiwxMywyMC43NSwxM3oiIHN0eWxlPSJzdHJva2U6IGN1cnJlbnRDb2xvcjsgc3Ryb2tlLXdpZHRoOiAxcHg7IHN0cm9rZS1saW5lY2FwOiByb3VuZDsiLz4NCjxwYXRoIGQ9Ik0xOC41LDI0Yy0wLjI3NiwwLTAuNS0wLjIyNC0wLjUtMC41di02YzAtMC44MjctMC42NzMtMS41LTEuNS0xLjVoLTlDNi42NzMsMTYsNiwxNi42NzMsNiwxNy41djZDNiwyMy43NzYsNS43NzYsMjQsNS41LDI0DQoJUzUsMjMuNzc2LDUsMjMuNXYtNkM1LDE2LjEyMiw2LjEyMSwxNSw3LjUsMTVoOWMxLjM3OSwwLDIuNSwxLjEyMiwyLjUsMi41djZDMTksMjMuNzc2LDE4Ljc3NiwyNCwxOC41LDI0eiIgc3R5bGU9InN0cm9rZTogY3VycmVudENvbG9yOyBzdHJva2Utd2lkdGg6IDFweDsgc3Ryb2tlLWxpbmVjYXA6IHJvdW5kOyIvPg0KPHBhdGggZD0iTTIzLjUsNWgtMjNDMC4yMjQsNSwwLDQuNzc2LDAsNC41UzAuMjI0LDQsMC41LDRoMjNDMjMuNzc2LDQsMjQsNC4yMjQsMjQsNC41UzIzLjc3Niw1LDIzLjUsNXoiIHN0eWxlPSJzdHJva2U6IGN1cnJlbnRDb2xvcjsgc3Ryb2tlLXdpZHRoOiAxcHg7IHN0cm9rZS1saW5lY2FwOiByb3VuZDsiLz4NCjxwYXRoIGQ9Ik0yMS41LDI0aC0xOUMxLjEyMSwyNCwwLDIyLjg3OCwwLDIxLjV2LTE3YzAtMC4wNzgsMC4wMTktMC4xNTQsMC4wNTMtMC4yMjRMMS43NzYsMC44M0MyLjAzMSwwLjMxOCwyLjU0NiwwLDMuMTE4LDBoMTcuNzY0DQoJYzAuNTcyLDAsMS4wODcsMC4zMTgsMS4zNDIsMC44M2wxLjcyNCwzLjQ0N0MyMy45ODEsNC4zNDYsMjQsNC40MjIsMjQsNC41djE3QzI0LDIyLjg3OCwyMi44NzksMjQsMjEuNSwyNHogTTEsNC42MThWMjEuNQ0KCUMxLDIyLjMyNywxLjY3MywyMywyLjUsMjNoMTljMC44MjcsMCwxLjUtMC42NzMsMS41LTEuNVY0LjYxOGwtMS42NzEtMy4zNDJDMjEuMjQ0LDEuMTA1LDIxLjA3MywxLDIwLjg4MiwxSDMuMTE4DQoJQzIuOTI3LDEsMi43NTYsMS4xMDUsMi42NzEsMS4yNzZ2MEwxLDQuNjE4eiBNMi4yMjQsMS4wNTNoMC4wMUgyLjIyNHoiIHN0eWxlPSJzdHJva2U6IGN1cnJlbnRDb2xvcjsgc3Ryb2tlLXdpZHRoOiAxcHg7IHN0cm9rZS1saW5lY2FwOiByb3VuZDsiLz4NCjwvc3ZnPg0K"
                alt="Blendicons"
              />
            </div>

            <h2 class="h4 fw-bolder">A Marketplace for you</h2>
            <p>
              Let’s Ukay Website serve as a marketplace where individuals can
              buy and sell used goods.
            </p>
          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div>
              <img
                src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAyMS4wLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iX3gzMV9fcHgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgMjQgMjQiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDI0IDI0IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNDgiIGhlaWdodD0iNDgiPg0KPHBhdGggZD0iTTE3LjUsMjRjLTAuMTA1LDAtMC4yMS0wLjAzMy0wLjI5OS0wLjA5OUMxNi45NDcsMjMuNzEyLDExLDE5LjIzMSwxMSwxNS42M2MwLTIuMDAyLDEuNjI5LTMuNjMsMy42MzEtMy42Mw0KCWMxLjE0LDAsMi4xOTIsMC41MzEsMi44NjksMS40MDRDMTguMTc3LDEyLjUzMSwxOS4yMjksMTIsMjAuMzY5LDEyQzIyLjM3MSwxMiwyNCwxMy42MjgsMjQsMTUuNjNjMCwzLjYwMS01Ljk0Nyw4LjA4Mi02LjIwMSw4LjI3MQ0KCUMxNy43MSwyMy45NjcsMTcuNjA1LDI0LDE3LjUsMjR6IE0xNC42MzEsMTNDMTMuMTgxLDEzLDEyLDE0LjE4LDEyLDE1LjYzYzAsMi40MywzLjcyMyw1Ljg0OSw1LjUsNy4yNA0KCWMxLjc3Ni0xLjM5Miw1LjUtNC44MTMsNS41LTcuMjRjMC0xLjQ1LTEuMTgxLTIuNjMtMi42MzEtMi42M2MtMS4wNDgsMC0xLjk5NCwwLjYxOS0yLjQxLDEuNTc4Yy0wLjE2LDAuMzY1LTAuNzU4LDAuMzY1LTAuOTE4LDANCglDMTYuNjI1LDEzLjYxOSwxNS42NzksMTMsMTQuNjMxLDEzeiIgc3R5bGU9InN0cm9rZTogY3VycmVudENvbG9yOyBzdHJva2Utd2lkdGg6IDFweDsgc3Ryb2tlLWxpbmVjYXA6IHJvdW5kOyIvPg0KPHBhdGggZD0iTTE0LjM2MywyNEg2LjVDNS42NzMsMjQsNSwyMy4zMjcsNSwyMi41VjEwLjIwOGwtMS45MzUsMC42ODVjLTAuMzY3LDAuMTU5LTAuODIxLDAuMTUtMS4yMTItMC4wMzkNCgljLTAuMzkyLTAuMTg4LTAuNjgyLTAuNTM3LTAuNzk2LTAuOTU2TDAuMDUsNS44MjhjLTAuMTctMC42MjUsMC4wODYtMS4yOSwwLjYzOS0xLjY0NWw1LjcwMi0zLjkzNkM2LjY0NiwwLjA4Myw2LjkyNywwLDcuMjE1LDANCgloOS40NzNjMC4zMDcsMCwwLjYwMywwLjA5MiwwLjg1NCwwLjI2N2w1LjgxMSwzLjk5NWMwLjUyMywwLjM2MiwwLjc2MiwxLjAxNiwwLjU5NSwxLjYyOUwyMi45LDkuOTAxDQoJYy0wLjEwNywwLjM5NS0wLjM2LDAuNzE5LTAuNzEyLDAuOTE3Yy0wLjM1NCwwLjE5OC0wLjc2MywwLjI0Ni0xLjE0OCwwLjEzNUwxOSwxMC4yMTN2MC42MzhjMCwwLjI3Ni0wLjIyNCwwLjUtMC41LDAuNQ0KCXMtMC41LTAuMjI0LTAuNS0wLjVWOS41YzAtMC4xNjMsMC4wNzktMC4zMTYsMC4yMTMtMC40MWMwLjEzMy0wLjA5MywwLjMwNi0wLjExNiwwLjQ1OC0wLjA2bDIuNjc4LDAuOTczDQoJYzAuMDk1LDAuMDI0LDAuMjI5LDAuMDExLDAuMzQ5LTAuMDU2YzAuMTE3LTAuMDY2LDAuMjAyLTAuMTc0LDAuMjM3LTAuMzA0bDEuMDQ3LTQuMDFjMC4wNTctMC4yMDktMC4wMjItMC40MjgtMC4xOTYtMC41NDgNCglMMTYuOTc0LDEuMDlDMTYuODksMS4wMzIsMTYuNzg4LDEsMTYuNjg4LDFINy4yMTVjLTAuMDk2LDAtMC4xODksMC4wMjctMC4yNywwLjA4TDEuMjQzLDUuMDE1QzEuMDQ1LDUuMTQzLDAuOTYsNS4zNjQsMS4wMTgsNS41NzcNCglsMS4wMDgsNC4wNjljMC4wMzYsMC4xMywwLjEzLDAuMjQ0LDAuMjYzLDAuMzA3YzAuMTMyLDAuMDY0LDAuMjc5LDAuMDY2LDAuNDEzLDAuMDA5bDIuNjMyLTAuOTMzDQoJYzAuMTUzLTAuMDU0LDAuMzIyLTAuMDMxLDAuNDU1LDAuMDYzUzYsOS4zMzcsNiw5LjV2MTNDNiwyMi43NzYsNi4yMjUsMjMsNi41LDIzaDcuODYzYzAuMjc2LDAsMC41LDAuMjI0LDAuNSwwLjUNCglTMTQuNjQsMjQsMTQuMzYzLDI0eiIgc3R5bGU9InN0cm9rZTogY3VycmVudENvbG9yOyBzdHJva2Utd2lkdGg6IDFweDsgc3Ryb2tlLWxpbmVjYXA6IHJvdW5kOyIvPg0KPHBhdGggZD0iTTEyLDVDOS43OTQsNSw4LDMuMjA2LDgsMVYwLjVDOCwwLjIyNCw4LjIyNCwwLDguNSwwaDdDMTUuNzc2LDAsMTYsMC4yMjQsMTYsMC41VjFDMTYsMy4yMDYsMTQuMjA2LDUsMTIsNXogTTksMQ0KCWMwLDEuNjU0LDEuMzQ2LDMsMywzczMtMS4zNDYsMy0zSDl6IiBzdHlsZT0ic3Ryb2tlOiBjdXJyZW50Q29sb3I7IHN0cm9rZS13aWR0aDogMXB4OyBzdHJva2UtbGluZWNhcDogcm91bmQ7Ii8+DQo8cGF0aCBkPSJNMTUuNSw5aC0yQzEzLjIyNCw5LDEzLDguNzc2LDEzLDguNVMxMy4yMjQsOCwxMy41LDhoMkMxNS43NzYsOCwxNiw4LjIyNCwxNiw4LjVTMTUuNzc2LDksMTUuNSw5eiIgc3R5bGU9InN0cm9rZTogY3VycmVudENvbG9yOyBzdHJva2Utd2lkdGg6IDFweDsgc3Ryb2tlLWxpbmVjYXA6IHJvdW5kOyIvPg0KPC9zdmc+DQo="
                alt="Blendicons"
              />
            </div>
            <h2 class="h4 fw-bolder">Declutter your things</h2>
            <p>
              It provides a convenient platform for people to declutter their
              homes by selling items they no longer need or use, while also
              offering shoppers the opportunity to find unique and affordable
              items.
            </p>
          </div>
          <div class="col-lg-4">
            <div>
              <img
                src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAyMS4wLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0ibGlnaHQiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgMjQgMjQiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDI0IDI0IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNDgiIGhlaWdodD0iNDgiPg0KPHBhdGggZD0iTTkuMDkzLDguODM3Yy0xLjA1MiwwLTIuMTMxLTAuMzk2LTIuOTQ5LTEuMTgzQzUuMjg3LDYuODMxLDUuMDc5LDUuNzkyLDQuODU5LDQuNjkyQzQuNjE1LDMuNDY4LDQuMzYyLDIuMjAyLDMuMTUzLDEuMDQNCglDMy4wMTMsMC45MDUsMi45NjQsMC43LDMuMDI3LDAuNTE3QzMuMDkxLDAuMzMyLDMuMjU2LDAuMjAxLDMuNDUsMC4xODNsMC4xMzctMC4wMTRDNi4wNzEtMC4wODQsOS4xNjItMC4zOSwxMS41OSwxLjk0M2wwLDANCgljMC43NjksMC43MzgsMS4yMzQsMS44NzEsMS4yNDUsMy4wMjhjMC4wMTEsMS4xMDItMC4zNzYsMi4xMDItMS4wOSwyLjgxNEMxMS4wNDIsOC40ODgsMTAuMDgsOC44MzcsOS4wOTMsOC44Mzd6IE00LjUyNSwxLjA4Mw0KCUM1LjM4OSwyLjIzNSw1LjYyNiwzLjQyNSw1Ljg0LDQuNDk3YzAuMTk2LDAuOTgxLDAuMzY1LDEuODMsMC45OTYsMi40MzdjMS4wNzEsMS4wMjgsMy4wMTUsMS4zMzMsNC4yMDEsMC4xNDYNCgljMC41MjItMC41MjEsMC44MDUtMS4yNjcsMC43OTctMi4wOThjLTAuMDA5LTAuODk1LTAuMzU5LTEuNzYxLTAuOTM4LTIuMzE3bDAsMEM5LjA0MywwLjg4NCw2LjcwMSwwLjg5MSw0LjUyNSwxLjA4M3oiIHN0eWxlPSJzdHJva2U6IGN1cnJlbnRDb2xvcjsgc3Ryb2tlLXdpZHRoOiAxcHg7IHN0cm9rZS1saW5lY2FwOiByb3VuZDsiLz4NCjxwYXRoIGQ9Ik0xOC4wMTcsN2MtMC4wNywwLTAuMTQxLTAuMDAyLTAuMjExLTAuMDA3Yy0wLjgxMi0wLjA0OC0xLjUxNy0wLjM3LTEuOTg2LTAuOTA3Yy0xLjMzNi0xLjUyOS0wLjg5NC0zLjYxOCwwLjI4Mi00LjY3N2wwLDANCgljMS45ODMtMS43ODUsNC40MS0xLjQ2Nyw2LjM1OC0xLjIxbDAuMTA1LDAuMDE0YzAuMTkzLDAuMDI1LDAuMzU0LDAuMTYxLDAuNDEzLDAuMzQ4YzAuMDU4LDAuMTg3LDAuMDAyLDAuMzktMC4xNDMsMC41MjENCgljLTAuOTQyLDAuODQ4LTEuMTY2LDEuODA3LTEuMzgyLDIuNzM0Yy0wLjE5MywwLjgyNy0wLjM5MiwxLjY4Mi0xLjEwNSwyLjMyNEMxOS43NCw2LjY4NiwxOC44ODEsNywxOC4wMTcsN3ogTTIwLjEyOSwwLjk5OQ0KCWMtMS4xOCwwLTIuMzUzLDAuMjQ3LTMuMzU5LDEuMTU0bDAsMGMtMC44MjQsMC43NDEtMS4xMzMsMi4yMDQtMC4xOTgsMy4yNzRjMC4yOTIsMC4zMzQsMC43NTEsMC41MzUsMS4yOTMsMC41NjcNCgljMC42NjgsMC4wMzUsMS4zNS0wLjE4NSwxLjgxMy0wLjZjMC40OC0wLjQzMiwwLjYyMi0xLjAzOSwwLjgwMS0xLjgwOGMwLjE3NS0wLjc1MywwLjM4NC0xLjY0NiwxLjAwOC0yLjUwMg0KCUMyMS4wNCwxLjAzNiwyMC41ODMsMC45OTksMjAuMTI5LDAuOTk5eiBNMTYuNDM2LDEuNzgxaDAuMDFIMTYuNDM2eiIgc3R5bGU9InN0cm9rZTogY3VycmVudENvbG9yOyBzdHJva2Utd2lkdGg6IDFweDsgc3Ryb2tlLWxpbmVjYXA6IHJvdW5kOyIvPg0KPHBhdGggZD0iTTEzLjYyOSwxMi4wNmMtMC4yMzYsMC0wLjQ0Ny0wLjE2OC0wLjQ5MS0wLjQwOUMxMi40OCw4LjA5Niw5LjEsNS4xNjksOS4wNjUsNS4xNEM4Ljg1NSw0Ljk2MSw4LjgzMSw0LjY0NSw5LjAxLDQuNDM2DQoJQzkuMTg5LDQuMjI1LDkuNTA0LDQuMTk5LDkuNzE1LDQuMzhjMC4xNSwwLjEyOCwzLjY4MywzLjE4LDQuNDA3LDcuMDg5YzAuMDUsMC4yNzEtMC4xMjksMC41MzItMC40MDEsMC41ODINCglDMTMuNjksMTIuMDU3LDEzLjY2LDEyLjA2LDEzLjYyOSwxMi4wNnoiIHN0eWxlPSJzdHJva2U6IGN1cnJlbnRDb2xvcjsgc3Ryb2tlLXdpZHRoOiAxcHg7IHN0cm9rZS1saW5lY2FwOiByb3VuZDsiLz4NCjxwYXRoIGQ9Ik0zLjUsMjJoLTNDMC4yMjQsMjIsMCwyMS43NzYsMCwyMS41di05QzAsMTIuMjI0LDAuMjI0LDEyLDAuNSwxMmMzLjQwMSwwLDUuMTk4LDEuMTQ2LDUuMjczLDEuMTk1DQoJYzAuMTc5LDAuMTE3LDAuMjY0LDAuMzM1LDAuMjEyLDAuNTQybC0yLDcuODg2QzMuOTI4LDIxLjg0NSwzLjcyOSwyMiwzLjUsMjJ6IE0xLDIxaDIuMTExbDEuODA5LTcuMTMNCglDNC4zNTcsMTMuNjAxLDMuMDMxLDEzLjA4NCwxLDEzLjAwOVYyMXoiIHN0eWxlPSJzdHJva2U6IGN1cnJlbnRDb2xvcjsgc3Ryb2tlLXdpZHRoOiAxcHg7IHN0cm9rZS1saW5lY2FwOiByb3VuZDsiLz4NCjxwYXRoIGQ9Ik0xMywyNGMtMi4zNiwwLTYuOTIzLTEuOTg0LTkuNDM0LTMuMTY4Yy0wLjI1LTAuMTE3LTAuMzU2LTAuNDE2LTAuMjM5LTAuNjY1YzAuMTE3LTAuMjUxLDAuNDE2LTAuMzU2LDAuNjY2LTAuMjM5DQoJQzUuOTUzLDIwLjg1MiwxMC43NTMsMjMsMTMsMjNjMi40MzIsMCw4LjE2NS0yLjg1Nyw5LjgxNC0zLjcwNkMyMi41NTQsMTguOTU0LDIyLjAxNywxOC41LDIxLDE4LjUNCgljLTAuOTIzLDAtMi4wOTMsMC4zNjktMy4yMjUsMC43MjdDMTYuNTcyLDE5LjYwNiwxNS4zMjcsMjAsMTQuMjUsMjBjLTIuMDY0LDAtNC44MDUtMC45ODgtNC45MjEtMS4wMw0KCWMtMC4yNTktMC4wOTQtMC4zOTMtMC4zODEtMC4yOTktMC42NDFjMC4wOTQtMC4yNTksMC4zOC0wLjM5MiwwLjY0MS0wLjI5OUM5LjY5NywxOC4wNCwxMi4zNjMsMTksMTQuMjUsMTkNCgljMC45MjMsMCwyLjA5My0wLjM2OSwzLjIyNS0wLjcyN0MxOC42NzgsMTcuODk0LDE5LjkyMywxNy41LDIxLDE3LjVjMi4zMzMsMCwyLjk0OSwxLjc2NywyLjk3NCwxLjg0Mg0KCWMwLjA3NywwLjIzMS0wLjAyMywwLjQ4NC0wLjIzOSwwLjZDMjMuNDI0LDIwLjEwNiwxNi4wODksMjQsMTMsMjR6IiBzdHlsZT0ic3Ryb2tlOiBjdXJyZW50Q29sb3I7IHN0cm9rZS13aWR0aDogMXB4OyBzdHJva2UtbGluZWNhcDogcm91bmQ7Ii8+DQo8cGF0aCBkPSJNMTYuNSwxOS41OWMtMC4yNzYsMC0wLjUtMC4yMjQtMC41LTAuNXYtMC41YzAtMC42OTgtMC40Ny0xLjI5Ni0xLjE0NC0xLjQ1MmwtOS42NTQtMi4zMzENCgljLTAuMjY5LTAuMDY1LTAuNDM0LTAuMzM1LTAuMzY5LTAuNjA0YzAuMDY0LTAuMjcsMC4zMzktMC40MjksMC42MDMtMC4zNjlsOS42NSwyLjMzQzE2LjIxMiwxNi40MjcsMTcsMTcuNDI1LDE3LDE4LjU5djAuNQ0KCUMxNywxOS4zNjYsMTYuNzc2LDE5LjU5LDE2LjUsMTkuNTl6IiBzdHlsZT0ic3Ryb2tlOiBjdXJyZW50Q29sb3I7IHN0cm9rZS13aWR0aDogMXB4OyBzdHJva2UtbGluZWNhcDogcm91bmQ7Ii8+DQo8cGF0aCBkPSJNMTMuNjMsMTIuMDU4Yy0wLjAwMSwwLTAuMDAyLDAtMC4wMDMsMGMtMC4yNzUtMC4wMDItMC40OTgtMC4yMjUtMC40OTctMC41YzAtMC4xNzMsMC4wNjMtNC4yNDcsNC42MTItNi45ODYNCgljMC4yMzYtMC4xNDIsMC41NDMtMC4wNjcsMC42ODYsMC4xNzFjMC4xNDMsMC4yMzYsMC4wNjYsMC41NDQtMC4xNywwLjY4N2MtNC4wNDcsMi40MzctNC4xMjYsNS45ODMtNC4xMjcsNi4xMzMNCglDMTQuMTI4LDExLjgzNiwxMy45MDUsMTIuMDU4LDEzLjYzLDEyLjA1OHoiIHN0eWxlPSJzdHJva2U6IGN1cnJlbnRDb2xvcjsgc3Ryb2tlLXdpZHRoOiAxcHg7IHN0cm9rZS1saW5lY2FwOiByb3VuZDsiLz4NCjwvc3ZnPg0K"
                alt="Blendicons"
              />
            </div>
            <h2 class="h4 fw-bolder">Suistanable and Eco-Friendly</h2>
            <p>
              It also emphasizes sustainability and eco-consciousness by
              promoting the reuse of goods and reducing waste. It supports
              charitable organizations or local communities through its
              operations.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!---Donate-->
    <section
      class="py-5 bg-image"
      style="
        background-image: url('./images/donatebox.svg');
        height: 50vh;
        background-repeat: no-repeat;
        background-size: cover;
      "
    >
      <div class="container px-5">
        <div class="row gx-5 justify-content-end">
          <div class="col-lg-6">
            <div class="text-center my-5 donate_Content">
              <h1 class="display-5 fw-normal text-black mb-2 title_Donate">
                10 Places Where You Can Donate Your Old Clothes
              </h1>
              <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                <a
                  href="https://shielasample.my.canva.site/donation-charities"
                  class="display-5 btn_Read"
                >
                  Read More
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--Sample Items-->
    <section class="card-group">
      <div class="card bg-white text-white">
        <img src="./images/kids.svg" class="card-img" alt="..." />
        <div class="text-center my-5 card-img-overlay">
          <h5 class="card-title display-4 fw-normal bg-warning">Card title</h5>
          <p class="card-text">
            This is a wider card with supporting text below as a natural lead-in
            to additional content. This content is a little bit longer.
          </p>
        </div>
      </div>
      <div class="card bg-white text-white">
        <img src="./images/adultclothes.svg" class="card-img" alt="..." />
        <div class="card-img-overlay">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">
            This is a wider card with supporting text below as a natural lead-in
            to additional content. This content is a little bit longer.
          </p>
        </div>
      </div>
      <div class="card bg-white text-white">
        <img src="./images/shoes.svg" class="card-img" alt="..." />
        <div class="card-img-overlay">
          <h5 class="card-title text-center">Card title</h5>
          <p class="card-text">
            This is a wider card with supporting text below as a natural lead-in
            to additional content. This content is a little bit longer.
          </p>
        </div>
      </div>
    </section>

    <!-- Footer-->
    <footer class="py-5">
      <p class="m-0 text-center text-black">Copyright &copy; Let's Ukay 2024</p>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js""></script>
    </body>
</html>
