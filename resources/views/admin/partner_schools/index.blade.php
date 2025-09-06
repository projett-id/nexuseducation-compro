@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Partner School</h3>
        <div class="card-tools">
            <a href="{{ route('partner-school.create') }}" class="btn btn-primary btn-sm float-right">Add</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card-body">
       <table class="table table-bordered">
        <thead>
            <tr>
                <th>Country</th>
                <th>Section</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $dt)
                <tr>
                    <td>{{ $dt->country->name }}</td>
                    <td>{{ $dt->title }}</td>
                    <td>
                        <a href="{{ route('partner-school.edit', $dt) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('partner-school.destroy', $dt) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this data?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $data->links() }}
    </div>
</div>
@endsection
