<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Source;

class SourceController extends Controller
{
    public function index(Request $request, Post $post)
    {
        $sources = $post->sources;
        return response([
            'sources' => $sources,
        ], 200);
    }

    public function edit(Request $request, $id)
    {
        return response([
            'source' => Source::findOrFail($id),
        ], 200);
    }

    public function update(Request $request)
    {
        $source = Source::findOrFail($request->source_id);
        $source->update([
            'name' => $request->name,
            'source' => $request->source,
            'description' => $request->description,
        ]);

        return response([
            'status' => true,
        ], 200);
    }

    public function delete(Request $request)
    {
        $model = Source::find($request->id_source);
        $model->delete();
        return response([
            'status' => true,
        ], 200);
    }

    public function store(Request $request)
    {
        $request->request->add(['post_id' => $request->post_id]);

        $validatedData = $this->validate($request, [
            'post_id'   => 'required|numeric',
            'name'         => 'required|min:3|max:255',
            'source'          => 'required|min:3|max:255',
            'description'          => 'required',
        ]);

        $source = Source::create($validatedData);

        return response([
            'status' => true,
        ], 200);
    }
}
