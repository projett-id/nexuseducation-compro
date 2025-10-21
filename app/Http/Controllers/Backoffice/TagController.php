<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tag;
use Illuminate\Support\Str;


class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::latest()->get();
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:tags,name',
        ]);

        $data['slug'] = Str::slug($data['name']);
        Tag::create($data);

        return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.update', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:tags,name,' . $tag->id,
        ]);

        $data['slug'] = Str::slug($data['name']);
        $tag->update($data);

        return redirect()->route('tags.index')->with('success', 'Tag updated successfully.');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully.');
    }
}
