@extends('layouts.blog', ['titlePage' => 'Главная'])
@section('scripts')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/styles/default.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.0.3/styles/vs2015.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/highlight.min.js"></script>
<script>
    hljs.highlightAll();
</script>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <article class="blog-post">
                <h2 class="blog-post-title">{{ $post->title }}</h2>
                <p class="blog-post-meta">{{ $post->created_at }}</p>
                {!! $post->text !!}
            </article>
        </div>
    </div>
</div>
@endsection