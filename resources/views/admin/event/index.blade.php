@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Event</h3>
        <div class="card-tools">
            <a href="{{ route('event.create') }}" class="btn btn-primary btn-sm float-right">Add</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Tags</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($event as $n)
                <tr>
                    <td>{{ $n->title }}</td>
                    <td>{{ $n->status }}</td>
                    <td>
                        @foreach($n->tags as $tag)
                            <span class="badge bg-info">{{ $tag->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('event.edit', $n) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('event.destroy', $n) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this news?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $event->links() }}
    </div>
</div>
@endsection
