<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\News;
use App\Models\Tag;
use App\Models\Categories as Category;


class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('tags')->latest()->get();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.news.create', compact('tags','categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:draft,published,archived',
            'tags' => 'required|array'
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['author_id'] = auth()->id();

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('news', 'public');
        }

        if($request->status == 'published'){
            $data['published_at'] = now();
        }else{
            $data['published_at'] = null;
        }

        $news = News::create($data);

        if ($request->filled('tags')) {
            $news->tags()->sync($request->tags);
        }
        
        return redirect()->route('news.index')->with('success', 'News created successfully.');
    }

    public function edit(News $news)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.news.update', compact('news', 'tags','categories'));
    }

    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:draft,published,archived',
            'tags' => 'array'
        ]);

        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('thumbnail')) {
            if ($news->thumbnail && \Storage::disk('public')->exists($news->thumbnail)) {
                \Storage::disk('public')->delete($news->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('news', 'public');
        }

        if($request->status == 'published'){
            $data['published_at'] = now();
        }else{
            $data['published_at'] = null;
        }

        $news->update($data);

        if ($request->filled('tags')) {
            $news->tags()->sync($request->tags);
        }

        return redirect()->route('news.index')->with('success', 'News updated successfully.');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')->with('success', 'News deleted successfully.');
    }

    public function indexFE(Request $request)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $query = News::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', "%{$request->search}%");
        }

        if ($request->filled('categories')) {
            $query->whereIn('category_id', $request->categories);
        }

        if ($request->filled('tags')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->whereIn('tags.id', $request->tags);
            });
        }

        $news = $query->latest()->paginate(10)->appends($request->all());
        return view('frontend.news.index', compact('news', 'tags','categories'));
    }

    public function detailFE($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        return view('frontend.news.detail', compact('news'));
    }
}
