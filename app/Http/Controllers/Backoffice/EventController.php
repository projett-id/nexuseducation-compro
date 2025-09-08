<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Models\Event;
use App\Models\Tag;
use App\Models\Categories as Category;


class EventController extends Controller
{
    public function index()
    {
        $event = Event::with('tags')->latest()->paginate(1);
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
            'start_time' => 'required',
            'end_time' => 'required',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:upcoming,ongoing,finished,cancelled',
            'tags' => 'required|array'
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['organizer_id'] = auth()->id();
        $data['start_date']= $request->start_date.' '.$request->start_time;
        $data['end_date']= $request->end_date.' '.$request->end_time;
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
            'start_time' => 'required',
            'end_time' => 'required',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
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
        $data['start_date']= $request->start_date.' '.$request->start_time;
        $data['end_date']= $request->end_date.' '.$request->end_time;
        $event->update($data);

        if ($request->filled('tags')) {
            $a = $event->tags()->sync($request->tags);
        }

        return redirect()->route('event.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('event.index')->with('success', 'Event deleted successfully.');
    }

    public function indexFE(Request $request)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $query = Event::query();
        // 🔍 Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('title', 'like', "%{$request->search}%");
        }else{
            if ($request->filled('category')) {
                $query->where('category_id', $request->category);
            }
    
            // Date filter
            if ($request->filled('date_range')) {
                switch ($request->date_range) {
                    case 'today':
                        $query->whereDate('start_date', Carbon::today());
                        break;
                    case 'week':
                        $query->whereBetween('start_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                        break;
                    case 'month':
                        $query->whereMonth('start_date', Carbon::now()->month)
                            ->whereYear('start_date', Carbon::now()->year);
                        break;
                    case 'quarter':
                        $query->whereBetween('start_date', [Carbon::now(), Carbon::now()->addMonths(3)]);
                        break;
                }
            }
            // Price filter
            // if ($request->filled('price')) {
            //     if ($request->price === 'free') {
            //         $query->where('price', 0);
            //     } elseif ($request->price === 'paid') {
            //         $query->where('price', '>', 0);
            //     }
            // }
        }

        $event = $query->latest()->paginate(10);
        return view('frontend.event.index', compact('event', 'tags','categories'));
    }

    public function detailFE($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        return view('frontend.event.detail', compact('event'));
    }
}
