@extends('layouts.admin', ['titlePage' => 'Редактирование источника'])

@section('scripts')
<script src="{{ asset('js/vendor/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
    tinymce.init({
        selector: '#content',
        plugins: "codesample",
        height : "680"
    });
</script>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Редактирование источника:</h5>
                    <form method="post" action="{{ route('sources.update', $source->id) }}">
                        @csrf
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="name">Название</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $source->name }}">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="source">Source</label>
                            <input type="text" class="form-control" id="source" name="source" value="{{ $source->source }}">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" id="content" name="description">{{ $source->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Обновить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection