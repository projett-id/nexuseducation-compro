@extends('admin.layouts.app')

@section('content')
<form class="card" action="{{ route('program-types.store') }}" method="POST" enctype="multipart/form-data">
    <div class="card-header">Form Program Types</div>
    <div class="card-body">
        @csrf
        <div class="mb-3">
            <label>Country</label>
            <select name="country_id" class="form-control">
                @foreach($country as $c)
                <option value="{{ $c->id }}" {{ old('country_id') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                @endforeach
            </select>
            @error('country_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="form-group mb-3">
            <label>Section</label>
            <input type="text" name="title" class="form-control" required autocomplete="off" value="{{ old('title') }}">
            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control tinymce" rows="5">{{ old('content') }}</textarea>
            @error('content') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>
@endsection

