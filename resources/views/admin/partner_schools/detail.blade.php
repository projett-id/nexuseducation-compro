@extends('admin.layouts.app')

@section('content')
<form class="card" action="{{ route('partner-school.detail', ['partner_school' => $partner_school->id, 'detail'=>optional($detail)->id]) }}" method="POST" enctype="multipart/form-data">
    <div class="card-header">Form Detail Partner School</div>
    <div class="card-body">
        @csrf
        <div class="form-group mb-3">
            <label>Section</label>
            <input type="text" name="title" class="form-control" required autocomplete="off" value="{{ old('title', $detail->title ?? '')  }}">
            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control tinymce" rows="5">{{ old('content', $detail->content ?? '') }}</textarea>
            @error('content') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>
@endsection