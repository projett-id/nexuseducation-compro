@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Create Permission</div>
    <div class="card-body">
        <form action="{{ route('permissions.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Permission Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
@endsection
