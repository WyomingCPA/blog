<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Post;

class BlogController extends Controller
{
    public function index(Request $reqeust)
    {
        $posts = Post::where('status', 'public')->orderBy('created_at', 'desc')->simplePaginate(10);
        return view('blog.index', compact('posts',));
    }

    public function view(Request $request, Post $post)
    {
        return view('blog.post.detail', compact('post'));
    }

    public function category(Request $reqeust, Category $category)
    {
        $posts = $category->posts()->where('status', 'public')->orderBy('created_at', 'desc')->simplePaginate(10);
        return view('blog.post.category', compact('posts',));
    }
}
