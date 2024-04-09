<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</head>
<body>
    <div id="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="navbar-brand d-block d-lg-none" href="#">
                    <a href="{{ route('home') }}">
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
                    <div class="navbar-brand d-none d-lg-block" href="">
                        <a href="{{ route('home') }}">
                        <h2 class="logo center-logo">Let's Ukay</h2>
                        </a>
                    </div>
                    <ul class="navbar-nav">
                        @guest
                            @if(Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">ABOUT</a>
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
                                    <a class="dropdown-item" href="{{ route('order-details') }}">
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


    <main class="">
        @yield('content')
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    </main>

    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        $('#messageAlert').fadeOut(3000);

        $(document).ready(function(){
            $('#selectAllIds').click(function () {
                $('.checkbox_ids').prop('checked', $(this).prop('checked'));
            })
        });


        $('#deleteAllSelectedRecord').click(function(e) {
            e.preventDefault();
            var allIds = [];
            $("input:checkbox[name=ids]:checked").each(function() {
                allIds.push($(this).val());
            });

            if (allIds.length == 0) {
                alert("Please Select at least one checkbox.");
            } else {
                var check = confirm("Are you sure you want to delete this?");
                if(check == true) {
                    var join_selected_values = allIds.join(",");
                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function(data) {
                            if(data['success']) {
                                $("input:checkbox[name=ids]:checked").each(function() {
                                    $(this).parents('.body').empty();
                                });
                                alert(data['success']);
                                location.reload();
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert("Whoops Something went wrong!");
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });

                    $.each(all_ids, function(key, val) {
                        $('#allProductIds'+val).remove();
                    });
                }
            }
        });


    </script>



</body>
</html>
