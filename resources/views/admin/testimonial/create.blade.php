@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Add Testimonial</h1>
    <form action="{{ route('testimonials.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Testimonial</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection