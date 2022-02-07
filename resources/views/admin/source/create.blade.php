@extends('layouts.admin', ['titlePage' => 'Создание источника'])

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
                    <h5 class="card-title">Создание источника:</h5>
                    <form method="post" action="{{ route('sources.store', $post->id) }}">
                        @csrf
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="name">Название</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="source">Source</label>
                            <input type="text" class="form-control" id="source" name="source">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" id="content" name="description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection