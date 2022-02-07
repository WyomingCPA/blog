<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Post;

class BlogController extends Controller
{
    public function index(Request $reqeust)
    {
        return view('blog.index', []);
    }

    public function category(Request $reqeust, Category $category)
    {
        return view('blog.post.category', []);
    }
}
