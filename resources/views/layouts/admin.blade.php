<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicons -->
        <link rel="icon" href="assets/img/favicons/favicon.ico">

        <!-- Custom styles for this template with bootstrap css -->

        <link rel="stylesheet" href={{ asset('css/app.min.css') }}>
        @yield('style')
        <style type="text/css">
            .sidebar {
                position: fixed;
                top: 0;
                /* rtl:raw:
  right: 0;
  */
                bottom: 0;
                /* rtl:remove */
                left: 0;
                z-index: 100;
                /* Behind the navbar */
                padding: 48px 0 0;
                /* Height of navbar */
                box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            }

            .bi {
                vertical-align: -.125em;
                pointer-events: none;
                fill: currentColor;
            }

            .dropdown-toggle {
                outline: 0;
            }

            .nav-flush .nav-link {
                border-radius: 0;
            }

            .btn-toggle {
                display: inline-flex;
                align-items: center;
                padding: .25rem .5rem;
                font-weight: 600;
                color: rgba(0, 0, 0, .65);
                background-color: transparent;
                border: 0;
            }

            .btn-toggle:hover,
            .btn-toggle:focus {
                color: rgba(0, 0, 0, .85);
                background-color: #d2f4ea;
            }

            .btn-toggle::before {
                width: 1.25em;
                line-height: 0;
                content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%280,0,0,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
                transition: transform .35s ease;
                transform-origin: .5em 50%;
            }

            .btn-toggle[aria-expanded="true"] {
                color: rgba(0, 0, 0, .85);
            }

            .btn-toggle[aria-expanded="true"]::before {
                transform: rotate(90deg);
            }

            .btn-toggle-nav a {
                display: inline-flex;
                padding: .1875rem .5rem;
                margin-top: .125rem;
                margin-left: 1.25rem;
                text-decoration: none;
            }

            .btn-toggle-nav a:hover,
            .btn-toggle-nav a:focus {
                background-color: #d2f4ea;
            }
        </style>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/styles/default.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.0.3/styles/vs2015.min.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/highlight.min.js"></script>
        <script>
            hljs.highlightAll();
        </script>
    </head>
    <script>
        window.Laravel = {
            csrfToken: '{{ csrf_token() }}'
        }
    </script>
    @yield('scripts')
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid">
        <div class="row">
            @if(Gate::check('isAdmin'))
            @include('layouts.navbars.sidebar')
            @endif

            <main>
                @yield('content')
            </main>
        </div>
    </div>
    @if(Gate::check('isAdmin'))
    @include('layouts.navbars.footer')
    @endif
    <!-- Bootstrap 5 Javascript -->
    <script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
    <!-- Custom Javascript -->
    <script src="{{ asset('js/app.min.js') }}"></script>
</body>

</html>