<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Photo;
use App\Models\Post;

class UploadImageController extends Controller
{
    public function save(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $name = $request->file('image')->getClientOriginalName();

        $path = $request->file('image')->store('public/images');

        $save = new Photo;

        $save->name = $name;
        $save->path = basename($path);
        $save->post_id = $post->id;
        $save->is_thumbnail = true;
        $save->save();

        return redirect()->route('post.edit', $post->id)
            ->with('success', 'Фотография обновлена');
    }
}
