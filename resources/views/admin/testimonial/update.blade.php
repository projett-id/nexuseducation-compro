@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Testimonial</h1>
    <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $testimonial->name }}" required>
        </div>
        <div class="form-group">
            <label>Testimonial</label>
            <textarea name="description" class="form-control" required>{{ $testimonial->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection