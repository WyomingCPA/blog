<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href={{ asset('css/app.min.css') }}>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        /* stylelint-disable selector-list-comma-newline-after */

        .blog-header {
            line-height: 1;
            border-bottom: 1px solid #e5e5e5;
        }

        .blog-header-logo {
            font-family: "Playfair Display", Georgia, "Times New Roman", serif
                /*rtl:Amiri, Georgia, "Times New Roman", serif*/
            ;
            font-size: 2.25rem;
        }

        .blog-header-logo:hover {
            text-decoration: none;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Playfair Display", Georgia, "Times New Roman", serif
                /*rtl:Amiri, Georgia, "Times New Roman", serif*/
            ;
        }

        .display-4 {
            font-size: 2.5rem;
        }

        @media (min-width: 768px) {
            .display-4 {
                font-size: 3rem;
            }
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .nav-scroller .nav-link {
            padding-top: .75rem;
            padding-bottom: .75rem;
            font-size: .875rem;
        }

        .card-img-right {
            height: 100%;
            border-radius: 0 3px 3px 0;
        }

        .flex-auto {
            flex: 0 0 auto;
        }

        .h-250 {
            height: 250px;
        }

        @media (min-width: 768px) {
            .h-md-250 {
                height: 250px;
            }
        }

        /* Pagination */
        .blog-pagination {
            margin-bottom: 4rem;
        }

        .blog-pagination>.btn {
            border-radius: 2rem;
        }

        /*
 * Blog posts
 */
        .blog-post {
            margin-bottom: 4rem;
        }

        .blog-post-title {
            margin-bottom: .25rem;
            font-size: 2.5rem;
        }

        .blog-post-meta {
            margin-bottom: 1.25rem;
            color: #727272;
        }

        /*
 * Footer
 */
        .blog-footer {
            padding: 2.5rem 0;
            color: #727272;
            text-align: center;
            background-color: #f9f9f9;
            border-top: .05rem solid #e5e5e5;
        }

        .blog-footer p:last-child {
            margin-bottom: 0;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-12 text-center">
                    <a class="blog-header-logo text-dark" href="#">Название блога</a>
                </div>
            </div>
        </header>
        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                <a class="p-2 link-secondary" href="#">Категория</a>
                <a class="p-2 link-secondary" href="#">Категория</a>
                <a class="p-2 link-secondary" href="#">Категория</a>
                <a class="p-2 link-secondary" href="#">Категория</a>
                <a class="p-2 link-secondary" href="#">Категория</a>
                <a class="p-2 link-secondary" href="#">Категория</a>
                <a class="p-2 link-secondary" href="#">Категория</a>
                <a class="p-2 link-secondary" href="#">Категория</a>
                <a class="p-2 link-secondary" href="#">Категория</a>
                <a class="p-2 link-secondary" href="#">Категория</a>
                <a class="p-2 link-secondary" href="#">Категория</a>
                <a class="p-2 link-secondary" href="#">Категория</a>
            </nav>
        </div>
    </div>

    <main class="container">
        <div class="row g-5">
            <div class="col-md-8">
                <article class="post vt-post mt-5">
                    <div class="row">
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4">
                            <div class="post-type post-img">
                                <a href="#"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-responsive" alt="image post"></a>
                            </div>
                            <div class="author-info author-info-2">
                                <ul class="list-inline">
                                    <li>
                                        <div class="info">
                                            <p>Posted on:</p>
                                            <strong>Mar 21, 2015</strong>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="info">
                                            <p>Comments:</p>
                                            <strong>127</strong>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
                            <div class="caption">
                                <h3 class="md-heading"><a href="post.html">The Heading Text Size Should Match</a></h3>
                                <p> Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus
                                    mus. Donec ullamcorper nulla non metus auctor fringilla. </p>
                                <a class="btn btn-default" href="post.html" role="button">Read More</a>
                            </div>
                        </div>
                    </div>
                </article>
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