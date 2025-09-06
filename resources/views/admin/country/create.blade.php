@extends('admin.layouts.app')

@section('content')
<form class="card" action="{{ route('country.store') }}" method="POST" enctype="multipart/form-data">
    <div class="card-header">Country</div>
    <div class="card-body">
        @csrf
        <div class="form-group mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required autocomplete="off" value="{{ old('name') }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="form-group mb-3">
            <label>Flag</label>
            <input type="file" name="flag" class="form-control">
            @error('flag') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status') == 0? 'selected' : '' }}>In-Active</option>
            </select>
            @error('status') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>
@endsection
