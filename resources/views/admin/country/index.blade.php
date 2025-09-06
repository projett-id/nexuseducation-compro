@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Country</h3>
        <div class="card-tools">
            <a href="{{ route('country.create') }}" class="btn btn-primary btn-sm float-right">Add</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card-body">
       <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Flag</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($country as $dt)
                <tr>
                    <td>{{ $dt->name }}</td>
                    <td><img src="{{ asset('storage/'.$dt->flag) }}" class="mt-2" width="150"></td>
                    <td>{{ $dt->status == 1 ? 'Active' : 'In-Active' }}</td>
                    <td>
                        <a href="{{ route('country.edit', $dt) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('country.destroy', $dt) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this category?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $country->links() }}
    </div>
</div>
@endsection
