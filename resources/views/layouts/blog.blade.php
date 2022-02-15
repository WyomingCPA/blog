<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    @yield('scripts')
</head>

<body>
    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-12 text-center">
                    <a class="blog-header-logo text-dark" href="{{ route('blog.index') }}">{{ config('app.name', 'Laravel') }}</a>
                </div>
            </div>
        </header>
        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-start">
                @foreach ($categories as $category)
                <a class="p-2 link-secondary" href="#">{{ $category->title }}</a>
                @endforeach
            </nav>
        </div>
    </div>

    <main class="container">
        <div class="row g-5">
            <div class="col-md-8">
                @yield('content')
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </main>

    <footer class="blog-footer">

    </footer>

    <!-- Bootstrap 5 Javascript -->
    <script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
    <!-- Custom Javascript -->
    <script src="{{ asset('js/app.min.js') }}"></script>

</body>
</html>