@extends('layouts.admin', ['titlePage' => 'Создание поста'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <a class="btn btn-primary" href="{{ route('sources.create', $post->id) }}">Добавить источник</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 p-3">
            @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                <p>{{ $message }}</p>
            </div>
            @endif
        </div>
        @foreach ($sources as $source)
        <div class="col-12 pt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $source->name }}</h5>
                    <p class="card-text">{!! $source->description !!}</p>
                    <a href='{{ $source->source }}' class="btn btn-primary" target="_blank">Перейти</a>
                    <a href="{{ route('sources.edit', $source->id) }}" class="btn btn-success">Редактировать</a>
                    <form action="{{ route('sources.delete', $source->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</i></button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection