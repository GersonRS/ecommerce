<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm main-header">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="img/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav col-md-6">
                        <li class="nav-item col-md-12">
                            <div class="input-group input-group-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </li>
                    </ul>

                    <ul class="navbar-nav col-md-2 text-center justify-content-center">
                        <li class="nav-item">
                            <div class="delivery-input-wrapper">
                                <span class="delivery-input-wrapper__title">Entregar em</span>
                                <p>Rua seila o que.</p>
                            </div>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav nav-pills nav-fill col-md-4">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('welcome') }}"><i class="fas fa-percentage"></i> <b class="d-none d-xl-block">Promoção</b></a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-user-alt"></i> <b class="d-none d-xl-block">Perfil</b></a>
                            </li>
{{--                            @if (Route::has('register'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i class="fas fa-shopping-bag"></i> <b class="d-none d-xl-block">Sacola</b></a>--}}
{{--                        </li>--}}
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-shopping-bag"></i><span class="badge badge-warning navbar-badge">15</span> <b class="d-none d-xl-block">Sacola</b>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right cart" aria-labelledby="navbarDropdown">
                                <div class="container px-4 py-3">
                                    <div class="card border-light mb-3">
                                        <div class="card-body p-0" style="display: block;">
                                            <div class="container my-3">
                                                <h2>Tile</h2>
                                            </div>
                                            <div class="container">
                                                <blockquote class="quote-secondary">
                                                    <ul class="products-list product-list-in-card pl-2 pr-2">
                                                        <li class="item">
                                                            <div class="product-img">
                                                                <img src="https://via.placeholder.com/400x400.png" alt="Product Image" class="img-size-50">
                                                            </div>
                                                            <div class="product-info">
                                                                <a href="javascript:void(0)" class="product-title">Samsung TV
                                                                    <span class="badge badge-warning float-right">$1800</span></a>
                                                                <span class="product-description">Samsung 32" 1080p 60Hz LED Smart HDTV.</span>
                                                            </div>
                                                        </li>
                                                        <!-- /.item -->
                                                        <li class="item">
                                                            <div class="product-img">
                                                                <img src="https://via.placeholder.com/400x400.png" alt="Product Image" class="img-size-50">
                                                            </div>
                                                            <div class="product-info">
                                                                <a href="javascript:void(0)" class="product-title">Bicycle
                                                                    <span class="badge badge-info float-right">$700</span></a>
                                                                <span class="product-description">26" Mongoose Dolomite Men's 7-speed, Navy Blue.</span>
                                                            </div>
                                                        </li>
                                                        <!-- /.item -->
                                                    </ul>
                                                </blockquote>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer text-center" style="display: block;">
                                            <ul class="list-unstyled">
                                                <li class="d-flex justify-content-between py-1 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>$390.00</strong></li>
                                                <li class="d-flex justify-content-between py-1"><strong class="text-muted">Tax</strong><strong>$0.00</strong></li>
                                            </ul>
                                        </div>
                                        <!-- /.card-footer -->
                                    </div>
                                    <div class="card border-light mb-3">
                                        <div class="card-body p-0" style="display: block;">
                                            <div class="container my-3">
                                                <h2>Tile</h2>
                                            </div>
                                            <div class="container">
                                                <blockquote class="quote-secondary">
                                                    <ul class="products-list product-list-in-card pl-2 pr-2">
                                                        <li class="item">
                                                            <div class="product-img">
                                                                <img src="https://via.placeholder.com/400x400.png" alt="Product Image" class="img-size-50">
                                                            </div>
                                                            <div class="product-info">
                                                                <a href="javascript:void(0)" class="product-title">
                                                                    Xbox One <span class="badge badge-danger float-right">$350</span>
                                                                </a>
                                                                <span class="product-description">Xbox One Console Bundle with Halo Master Chief Collection.</span>
                                                            </div>
                                                        </li>
                                                        <!-- /.item -->
                                                        <li class="item">
                                                            <div class="product-img">
                                                                <img src="https://via.placeholder.com/400x400.png" alt="Product Image" class="img-size-50">
                                                            </div>
                                                            <div class="product-info">
                                                                <a href="javascript:void(0)" class="product-title">PlayStation 4
                                                                    <span class="badge badge-success float-right">$399</span></a>
                                                                <span class="product-description">PlayStation 4 500GB Console (PS4)</span>
                                                            </div>
                                                        </li>
                                                        <!-- /.item -->
                                                    </ul>
                                                </blockquote>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer text-center" style="display: block;">
                                            <ul class="list-unstyled">
                                                <li class="d-flex justify-content-between py-1 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>$390.00</strong></li>
                                                <li class="d-flex justify-content-between py-1"><strong class="text-muted">Tax</strong><strong>$0.00</strong></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <div class="container">
                                    <ul class="list-unstyled mb-4 p-4">
                                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping and handling</strong><strong>$10.00</strong></li>
                                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                                            <h5 class="font-weight-bold">$400.00</h5>
                                        </li>
                                    </ul>
                                </div>
                                <div class="dropdown-divider"></div>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="{{ route('cart') }}" class="btn btn-outline-dark btn-lg btn-block rounded-pill">Carrinho</a>
                                        </div>
                                        <div class="col-6">
                                            <a href="#" class="btn btn-outline-dark btn-lg btn-block rounded-pill">Finalizar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container-fluid py-4">
            @yield('content')
        </main>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Carrinho</h5>
                <p>Sidebar content</p>
                <a href="{{ route('cart') }}">Carrinho</a>

            </div>
        </aside>
        <!-- /.control-sidebar -->

        <div class="container">
            <footer class="pt-4 my-md-3 pt-md-5 border-top">
                <div class="row">
                    <div class="col-12 col-md">
                        <img class="mb-2" src="img/bootstrap-solid.svg" alt="" width="64" height="64">
                        <small class="d-block mb-3 text-muted">&copy; 2017-2019</small>
                    </div>
                    <div class="col-6 col-md">
                        <h5>Features</h5>
                        <ul class="list-unstyled text-small">
                            <li><a class="text-muted" href="#">Cool stuff</a></li>
                            <li><a class="text-muted" href="#">Random feature</a></li>
                            <li><a class="text-muted" href="#">Team feature</a></li>
                            <li><a class="text-muted" href="#">Stuff for developers</a></li>
                            <li><a class="text-muted" href="#">Another one</a></li>
                            <li><a class="text-muted" href="#">Last time</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md">
                        <h5>Resources</h5>
                        <ul class="list-unstyled text-small">
                            <li><a class="text-muted" href="#">Resource</a></li>
                            <li><a class="text-muted" href="#">Resource name</a></li>
                            <li><a class="text-muted" href="#">Another resource</a></li>
                            <li><a class="text-muted" href="#">Final resource</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md">
                        <h5>About</h5>
                        <ul class="list-unstyled text-small">
                            <li><a class="text-muted" href="#">Team</a></li>
                            <li><a class="text-muted" href="#">Locations</a></li>
                            <li><a class="text-muted" href="#">Privacy</a></li>
                            <li><a class="text-muted" href="#">Terms</a></li>
                        </ul>
                    </div>
                </div>
                <div class="border-top pt-5">
                    <p class="float-right"><a href="#">Back to top</a></p>
                    <p>&copy; 2017-2019 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>
