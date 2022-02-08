<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Source;

class SourceController extends Controller
{
    public function create(Post $post)
    {
        return view('admin.source.create', compact('post', ));
    }
    
    public function store(Request $request, Post $post)
    {
        $request->request->add(['post_id' => $post->id]);
        $validatedData = $this->validate($request, [
            'post_id'   => 'required|numeric',
            'name'         => 'required|min:3|max:255',
            'source'          => 'required|min:3|max:255',
            'description'          => 'required',
        ]);

        $source = Source::create($validatedData);
        return redirect()->route('sources.index', $post->id)
            ->with('success','Источник добавлен');
    }

    public function view(Post $post)
    {
        $sources = $post->sources;
        return view('admin.source.view', compact('post', 'sources'));
    }

    public function edit(Source $source)
    {
        return view('admin.source.edit', compact('source'));
    }

    public function update(Request $request, Source $source)
    {
        $request->request->add(['post_id' => $source->post_id]);
        $validatedData = $this->validate($request, [
            'post_id'   => 'required|numeric',
            'name'         => 'required|min:3|max:255',
            'source'          => 'required|min:3|max:255',
            'description'          => 'required',
        ]);

        $source->update($validatedData);
        return redirect()->route('sources.edit', $source->id)
            ->with('success','Источник обновлен');
    }

    public function delete(Source $source)
    {
        $post = $source->post;
        $source->delete();

        return redirect()->route('sources.index', compact('post', ))
            ->with('success','Элемент успешно удален');
    }
}
