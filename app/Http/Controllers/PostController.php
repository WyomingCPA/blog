<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('admin.post.index', compact('posts',));
    }

    public function detail(Post $post)
    {
        return view('admin.post.detail', compact('post'));
    }

    public function create(Request $request)
    {
        $categories = Category::all();
        return view('admin.post.create',  compact('categories',));
    }

    public function update(Request $request, Post $post)
    {
        $request->request->add(['user_id' => 0]);

        $validatedData = $this->validate($request, [
            'title'         => 'required|min:3|max:255',
            'slug'          => 'required|min:3|max:255',
            'text'          => 'required',
            'user_id'   => 'required|numeric',
            'category_id'   => 'required|numeric',
            'status'   => 'in:public,draft,visible',
        ]);

        $post->update($validatedData);

        return redirect()->route('post.edit', $post->id)
            ->with('success', 'Пост успешно обновлен');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.post.edit', compact('post', 'categories'));
    }

    public function store(Request $request)
    {
        $request->request->add(['user_id' => 0]);

        $validatedData = $this->validate($request, [
            'title'         => 'required|min:3|max:255',
            'slug'          => 'required|min:3|max:255|unique:posts',
            'text'          => 'required',
            'user_id'   => 'required|numeric',
            'category_id'   => 'required|numeric',
            'status'   => 'in:public,draft,visible',
        ]);
        $post = Post::create($validatedData);

        return redirect()->route('post.create')
            ->with('success', 'Post успешно добавлен');;
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')
            ->with('success', 'Post deleted successfully');
    }
}
