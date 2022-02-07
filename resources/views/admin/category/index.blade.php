@extends('layouts.admin', ['titlePage' => 'Список категорий'])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Last Update</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorys as $category)
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->updated_at }}</td>
                                <td>
                                    <form action="{{ route('category.delete', $category->id) }}" method="POST">
                                        <a class="btn btn-success" href="{{ route('category.edit', $category->id) }}">Edit</a>
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav>
                        <ul class="pagination pagination-sm">
                            @if ($categorys->links()->paginator->hasPages())
                            <div class="mt-4 p-4 box has-text-centered">
                                {{ $categorys->links() }}
                            </div>
                            @endif

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>