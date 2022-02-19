<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
        $id = auth()->user()->id;

        $request->request->add(['user_id' => $id]);
        $request->request->add(['reading_time' => '00:00']);

        $validatedData = validator()->make($request->all(), [
            'title'         => 'required|min:3|max:255',
            'text'          => 'nullable',
            'user_id'   => 'required|numeric',
            'category_id'   => 'required|numeric',
            'status'   => 'in:public,draft,visible',
        ]);

        if($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData);
        }

        $post->update($request->all());

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
        $id = auth()->user()->id;
        $request->request->add(['user_id' => $id]);
        $request->request->add(['slug' => Str::slug($request->title)]);
        $request->request->add(['reading_time' => '00:00']);
        
        $validatedData = validator()->make($request->all(), [
            'title'         => 'required|min:3|max:255',
            'slug'          => 'required|min:3|max:255|unique:posts',
            'text'          => 'nullable',
            'user_id'   => 'required|numeric',
            'category_id'   => 'required|numeric',
            'status'   => 'in:public,draft,visible',
        ]);
        
        if($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData);
        }

        $post = Post::create($request->all());

        return redirect()->route('post.index')
            ->with('success', 'Post успешно добавлен');;
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')
            ->with('success', 'Post deleted successfully');
    }
}
