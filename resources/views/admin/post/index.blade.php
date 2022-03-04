@extends('layouts.admin', ['titlePage' => 'Список постов'])
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
                                <th scope="col">Words</th>
                                <th scope="col">Last Update</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->words }}</td>
                                <td>{{ $post->updated_at }}</td>
                                <td>{{ $post->status }}</td>
                                <td>
                                    <form action="{{ route('post.delete', $post->id) }}" method="POST">
                                        <a class="btn btn-primary" href="{{ route('post.detail', $post->id) }}" target="_blank">Detail</a>
                                        <a class="btn btn-primary" href="{{ route('sources.index', $post->id) }}" target="_blank">Source</a>
                                        <a class="btn btn-success" href="{{ route('post.edit', $post->id) }}">Edit</a>
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
                            @if ($posts->links()->paginator->hasPages())
                            <div class="mt-4 p-4 box has-text-centered">
                                {{ $posts->links() }}
                            </div>
                            @endif

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection