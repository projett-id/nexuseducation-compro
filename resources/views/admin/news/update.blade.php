@extends('admin.layouts.app')

@section('content')
<form class="card" action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
    <div class="card-header">Edit</div>
    <div class="card-body">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-control">
                <option value="">-- Select Category --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}"
                        {{ (old('category_id', $news->category_id) == $cat->id) ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $news->title) }}">
            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control tinymce" rows="5">{{ old('content', $news->content) }}</textarea>
            @error('content') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control">
            @if($news->thumbnail)
                <img src="{{ asset('storage/'.$news->thumbnail) }}" class="mt-2" width="150">
            @endif
            @error('thumbnail') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="draft" {{ old('status', $news->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status', $news->status) == 'published' ? 'selected' : '' }}>Published</option>
                <option value="archived" {{ old('status', $news->status) == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
            @error('status') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Tags</label>
            <select name="tags[]" multiple class="form-control">
                @php
                    $selectedTags = old('tags', $news->tags->pluck('id')->toArray());
                @endphp
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}"
                        {{ in_array($tag->id, $selectedTags) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
            @error('tags') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
@endsection