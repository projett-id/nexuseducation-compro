@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Testimonials</h3>
        <div class="card-tools">
            <a href="{{ route('testimonials.create') }}" class="btn btn-primary btn-sm float-right">Add</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered mt-3 datatables">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Testimonial</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($testimonials as $testimonial)
                <tr>
                    <td>{{ $testimonial->name }}</td>
                    <td>{{ $testimonial->description }}</td>
                    <td>
                        <a href="{{ route('testimonials.edit', $testimonial->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection