@extends('layouts.admin', ['titlePage' => 'Создание поста'])
@section('scripts')
<script src="{{ asset('js/vendor/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
    tinymce.init({
        selector: '#content',
        plugins: "codesample",
        height: "680"
    });
    tinymce.init({
        selector: '#preview',
        plugins: "codesample",
        height: "200"
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
                            <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}" id=" title" name="title">
                            @if ($errors->has('title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="slug">Slug</label>
                            <input type="text" class="form-control {{ $errors->has('slug') ? 'is-invalid' : ''}}" id="slug" name="slug">
                            @if ($errors->has('slug'))
                            <div class="invalid-feedback">
                                {{ $errors->first('slug') }}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="input-group-text" for="preview">Краткое содержание</label>
                            <textarea class="form-control {{ $errors->has('preview') ? 'is-invalid' : ''}}" id="preview" name="preview"></textarea>
                            @if ($errors->has('preview'))
                            <div class="invalid-feedback">
                                {{ $errors->first('preview') }}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="input-group-text" for="content">Текст статьи</label>
                            <textarea class="form-control {{ $errors->has('text') ? 'is-invalid' : ''}}" id="content" name="text"></textarea>
                            @if ($errors->has('text'))
                            <div class="invalid-feedback">
                                {{ $errors->first('text') }}
                            </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection