<!DOCTYPE html>
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
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar is-primary" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a href="/" class="navbar-item">
                    Olshop
                </a>

                <a class="navbar-burger burger" role="button" aria-label="menu" aria-expanded="false" data-target="navbarMenu">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div class="navbar-menu" id="navbarMenu">
                <div class="navbar-end">
                    @guest
                        <div class="navbar-item">
                            <div class="buttons">
                                <a href="{{ route('login') }}" class="button is-light">
                                    Login
                                </a>
                                <a href="{{ route('register') }}" class="button is-light">
                                    Register
                                </a>
                            </div>
                        </div>
                    @endguest

                    @auth
                    @php
                        $cartTotal = 0;
                        if (session()->has('cart')) {
                            $cartTotal = count(session('cart'));
                        }
                    @endphp
                        <div class="navbar-item">
                            <a href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart"></i> ( {{ $cartTotal }} )</a>
                        </div>
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">
                                {{ auth()->user()->name }}
                            </a>
                            <div class="navbar-dropdown">
                                <a href="" class="navbar-item">
                                    Hi, {{ auth()->user()->name }}
                                </a>
                                <a href="{{ route('frontend.order.index') }}" class="navbar-item">My Order</a>
                                <hr class="navbar-divider">
                                <a href="{{ route('logout') }}" class="navbar-item"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                            </div>
                        </div>

                        <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none">
                            @csrf
                        </form>
                    @endauth
                </div>
            </div>
        </nav>

        <section class="section">
            @yield('content')
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

        // Get all "navbar-burger" elements
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Check if there are any navbar burgers
        if ($navbarBurgers.length > 0) {

            // Add a click event on each of them
            $navbarBurgers.forEach( el => {
            el.addEventListener('click', () => {

                // Get the target from the "data-target" attribute
                const target = el.dataset.target;
                const $target = document.getElementById(target);

                // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                el.classList.toggle('is-active');
                $target.classList.toggle('is-active');

            });
            });
        }

        });
    </script>
    @stack('scripts')
</body>
</html>
