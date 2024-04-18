<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link rel="stylesheet" href="{{ asset('/css/adminProduct.css') }}">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">

    <!-- website logo -->
    <link rel="website icon" type="png" href="{{ asset('images/logo111.png') }}">
    <!-- website logo -->

    <!-- script MODAL -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <!-- end script MODAL -->

    <!-- script DATATABLES-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
    <!-- end script DATATABLES-->
    <script>
    </script>
    <!-- CSS -->

    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('admin.home') }}">
                    <!-- {{ config('app.name', 'Laravel') }} -->
                    Admin Dashboard
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{ route('request') }}">{{ __('Request') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{ route('transaction') }}">{{ __('Transaction') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ $firstName }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-5">
            @yield('content')
        </main>
    </div>
    <script>
        // datatables
        var $ = jQuery;
        $(document).ready(function () {
            var table = $('#productTable').DataTable();

            // Edit Datatables Records
            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');
                if($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                //console.log(data);

                $('#product_name').val(data[1]);
                $('#product_desc').val(data[3]);
                $('#product_seller').val(data[4]);
                $('#product_price').val(data[5]);
                $('#product_category').val(data[6]);
                $('#product_status').val(data[7]);

                $('#editForm').attr('action', '/admin/home/'+data[0]);
                $('#editModal').modal('show');
            });
            // END OF Edit Datatables Records

            // DELETE Datatables Records
            table.on('click', '.delete', function() {
                $tr = $(this).closest('tr');
                if($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();

                $('#deleteForm').attr('action', '/admin/home/'+data[0]);
                $('#deleteModal').modal('show');
            });
            // END OF DELETE Datatables Records
        });

        // modal
        $(document).ready(function() {
            $("#myModal").modal();
        });
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
        // manual closing of modal not working
        function modal_hide(){
                $('#editModal').modal('hide');
                $('#deleteModal').modal('hide');
        }
        // end modals
        // alert message
        $('#err_success_alert').fadeOut(3000);
        $(document).ready(function(){
            $("#alert_button").click(function(){
                $("#err_success_alert").hide(600);
            });
        });
        // end alert message
    </script>
</body>
</html>
