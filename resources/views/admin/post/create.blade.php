@extends('layouts.admin', ['titlePage' => 'Создание поста'])
@section('scripts')
<script src="{{ asset('js/vendor/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
    tinymce.init({
        selector: '#content',
        plugins: "codesample",
        height: "680"
    });
</script>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Создание поста</h5>
                    <form method="post" action="{{ route('post.store') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="category">Категорий</label>
                            <select class="form-select" id="category" name="category_id">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->title }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="status">Статус:</label>
                            <select class="form-select" id="status" name="status">
                                <option value="draft" selected>Draft</option>
                                <option value="public">Public</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="title">Заголовок</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="slug">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" id="content" name="text"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection