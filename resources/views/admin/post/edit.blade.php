@extends('layouts.admin', ['titlePage' => 'Создание поста'])
@section('scripts')
<script src="{{ asset('js/vendor/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
    tinymce.init({
        selector: '#content',
        plugins: "codesample, toc, autosave, wordcount, link",
        height: "680",
    });

    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
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
                            <input value="{{ $post->title }}" type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}" id="title" name="title">
                            @if ($errors->has('title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="slug">Slug</label>
                            <input value="{{ $post->slug }}" type="text" class="form-control {{ $errors->has('slug') ? 'is-invalid' : ''}}" id="slug" name="slug">
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
                            <textarea class="form-control {{ $errors->has('text') ? 'is-invalid' : ''}}" id="content" name="text">{{ $post->text }}</textarea>
                            @if ($errors->has('text'))
                            <div class="invalid-feedback">
                                {{ $errors->first('text') }}
                            </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Обновить</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="{{ route('post.image.save', $post->id ) }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="image" name="image" onchange="preview()">
                        </div>
                        <div class="input-group mb-3">
                            @if(!is_null($post->photo))
                            <img id="frame" src="{{ url('/storage/images/thumbnails/' . $post->photo->path) }}" class="img-fluid" />
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