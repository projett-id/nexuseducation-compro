@extends('admin.layouts.app')

@section('content')
<form class="card" action="{{ route('categories.store') }}" method="POST">
    <div class="card-header">Create</div>
    <div class="card-body">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required autocomplete="off" value="{{ old('name') }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>
@endsection
