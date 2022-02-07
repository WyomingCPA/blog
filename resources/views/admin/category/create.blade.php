@extends('layouts.admin', ['titlePage' => 'Создание категорий'])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Создание категорий</h5>
                    <form method="post" action="{{ route('category.store') }}" class="form-horizontal">
                        @csrf
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="category">Название категорий</label>
                            <input type="text" class="form-control" id="category" name="category">
                        </div>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection