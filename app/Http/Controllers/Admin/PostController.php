<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Post;
use App\Models\Category;
use App\Models\Word;

class PostController extends Controller
{
    public function list(Request $request)
    {
        return response([
            'posts' => Post::all()->toArray(),
        ], 200);
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
            'preview'       => 'nullable',
            'text'          => 'nullable',
            'user_id'   => 'required|numeric',
            'category_id'   => 'required|numeric',
            'status'   => 'in:public,draft,visible',
        ]);

        if ($validatedData->fails()) {
            return response([
                'status' => false,
            ], 200);
        }

        $post = Post::create($request->all());

        return response([
            'status' => true,
        ], 200);
    }

    public function create(Request $request)
    {
        return response([
            'categorys' => Category::all(),
        ], 200);
    }
    public function edit(Request $request, $id)
    {
        return response([
            'post' => Post::findOrFail($id),
            'categorys' => Category::all(),
        ], 200);
    }

    public function update(Request $request)
    {
        $post = Post::findOrFail($request->post_id);
        $post->update([
            'title' => $request->title,
            'preview'       => 'nullable',
            'text' => $request->text,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'preview' => $request->preview,
        ]);
        
        $stripped = strip_tags($request->text);
        $decoded  = html_entity_decode($stripped);
        $count_word =  str_word_count($decoded);
        $word = Word::create([
            'post_id' => $post->id,
            'count_word' => $count_word,
        ]);

        return response([
            'status' => true,
        ], 200);
    }

    public function delete(Request $request)
    {
        $model = Post::find($request->id_post);
        $model->delete();
        return response([
            'status' => true,
        ], 200);
    }
}
