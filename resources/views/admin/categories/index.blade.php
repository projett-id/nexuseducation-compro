@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Categories</h3>
        <div class="card-tools">
            <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm float-right">Add</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card-body">
       <table class="table table-bordered datatables">
        <thead>
            <tr>
                <th>#</th><th>Name</th><th>Slug</th><th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $cat)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $cat->name }}</td>
                    <td>{{ $cat->slug }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $cat) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('categories.destroy', $cat) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this category?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection
