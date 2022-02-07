@extends('layouts.admin', ['titlePage' => 'Редактирование категорий'])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Редактирование категорий</h5>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <form method="post" action="{{ route('category.update', $category->id) }}" class="form-horizontal">
                        @csrf
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="category">Название категорий</label>
                            <input value="{{ $category->title }}" type="text" class="form-control" id="category" name="category">
                        </div>
                        <button type="submit" class="btn btn-primary">Обновить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection