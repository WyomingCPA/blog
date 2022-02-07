@extends('layouts.admin', ['titlePage' => 'Dashboard'])
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Создание поста</h5>
                    <form>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="category">Категорий</label>
                            <select class="form-select" id="category">
                                <option selected>Выбор...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" id="content"></textarea>
                        </div>
                        <button type="button" class="btn btn-primary">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>