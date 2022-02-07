@extends('layouts.admin', ['titlePage' => 'Создание поста'])
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
                    <h5 class="card-title">Редактирование поста</h5>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <form method="post" action="{{ route('post.update', $post->id ) }}">
                        @csrf
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="category">Категорий</label>
                            <select class="form-select" id="category" name="category_id">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if (isset($post)) @if($category->id == $post->category_id)
                                    selected
                                    @endif
                                    @endif
                                    >
                                    {{ $category->title }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="status">Статус: {{ $post->status }}</label>
                            <select class="form-select" id="status" name="status">
                                <option value="draft" selected>Draft</option>
                                <option value="public">Public</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="title">Заголовок</label>
                            <input value="{{ $post->title }}" type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="slug">Slug</label>
                            <input value="{{ $post->slug }}" type="text" class="form-control" id="slug" name="slug">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" id="content" name="text">{{ $post->text }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Обновить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection