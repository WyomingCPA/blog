@extends('layouts.admin', ['titlePage' => 'Обзор поста'])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="mt-2 text-center font-weight-light text-muted text-uppercase mb-4">{{ $post->title }}</h2>
            <div class="card">
                <div class="card-body">
                    {!! $post->text !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection