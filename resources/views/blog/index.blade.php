@extends('layouts.blog', ['titlePage' => 'Главная'])
@section('content')
@foreach ($posts as $post)
<div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
    <div class="col p-4 d-flex flex-column position-static">
        <strong class="d-inline-block mb-2 text-success">{{ $post->category->title }}</strong>
        <h3 class="mb-0">{{ $post->title }}</h3>
        <div class="mb-1 text-muted">{{ $post->created_at }}</div>
        <p class="mb-auto">{{ $post->preview }}</p>
        <a href="{{ route('blog.view', $post->id) }}" class="stretched-link">Читать</a>
    </div>
    <div class="col-auto d-none d-lg-block">
        @if(!is_null($post->photo))
        <img src="{{ url('/storage/images/thumbnails/' . $post->photo->path) }}" class="img-fluid" />
        @else
        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="{{ $post->category->title }}" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>{{ $post->category->title }}</title>
            <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $post->category->title }}</text>
        </svg>
        @endif
    </div>
</div>
@endforeach
<div class="row">
    <div class="col-6">
        {!! $posts->links() !!}
    </div>
</div>
@endsection