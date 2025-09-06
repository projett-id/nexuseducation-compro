@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Edit Role</div>
    <div class="card-body">
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="form-group">
                <label>Role Name</label>
                <input type="text" name="name" value="{{ $role->name }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Permissions</label><br>
                @foreach($permissions as $permission)
                    <div class="form-check">
                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                            class="form-check-input"
                            {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                        <label class="form-check-label">{{ $permission->name }}</label>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
@endsection
