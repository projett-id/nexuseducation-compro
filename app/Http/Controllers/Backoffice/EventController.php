<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Event;
use App\Models\Tag;
use App\Models\Categories as Category;


class EventController extends Controller
{
    public function index()
    {
        $event = Event::with('tags')->latest()->paginate(10);
        return view('admin.event.index', compact('event'));
    }

    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.event.create', compact('tags','categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'location' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:upcoming,ongoing,finished,cancelled',
            'tags' => 'required|array'
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['organizer_id'] = auth()->id();

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('event', 'public');
        }

        if($request->status == 'published'){
            $data['published_at'] = now();
        }else{
            $data['published_at'] = null;
        }

        $event = Event::create($data);

        if ($request->filled('tags')) {
            $event->tags()->sync($request->tags);
        }
        
        return redirect()->route('event.index')->with('success', 'Event created successfully.');
    }

    public function edit(Event $event)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.event.update', compact('event', 'tags','categories'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'location' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:upcoming,ongoing,finished,cancelled',
            'tags' => 'required|array'
        ]);

        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('thumbnail')) {
            if ($event->thumbnail && \Storage::disk('public')->exists($event->thumbnail)) {
                \Storage::disk('public')->delete($event->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('event', 'public');
        }

        if($request->status == 'published'){
            $data['published_at'] = now();
        }else{
            $data['published_at'] = null;
        }

        $event->update($data);

        if ($request->filled('tags')) {
            $event->tags()->sync($request->tags);
        }

        return redirect()->route('event.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('event.index')->with('success', 'Event deleted successfully.');
    }
}
