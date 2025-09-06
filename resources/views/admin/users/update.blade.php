@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Edit User</div>
    <div class="card-body">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Password (leave blank if not changing)</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            <div class="form-group">
                <label>Roles</label>
                <select name="roles[]" multiple class="form-control">
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}" 
                            {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
@endsection
