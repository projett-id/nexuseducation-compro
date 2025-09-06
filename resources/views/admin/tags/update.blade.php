@extends('admin.layouts.app')

@section('content')
<form method="POST" action="{{ route('tags.update', $tag) }}" class="card">
    @csrf @method('PUT')
    <div class="card-header">Create</div>
    <div class="card-body">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $tag->name }}" required>
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>
@endsection
