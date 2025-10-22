@extends('admin.layouts.app')

@section('content')
<form class="card" action="{{ route('partner-school.store') }}" method="POST" enctype="multipart/form-data">
    <div class="card-header">Form Partner School</div>
    <div class="card-body">
        @csrf
        <div class="mb-3">
            <label>Banner Header</label>
            <input type="file" name="banner_header" class="form-control">
            @error('banner_header') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label>Country</label>
            <select name="country_id" class="form-control">
                @foreach($country as $c)
                <option value="{{ $c->id }}" {{ old('country_id') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                @endforeach
            </select>
            @error('country_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="form-group mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required autocomplete="off" value="{{ old('name') }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label>Logo</label>
            <input type="file" name="logo" class="form-control">
            @error('logo') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label>Location</label>
            <input type="text" name="location" class="form-control" value="{{ old('name') }}">
            @error('location') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label>Link Website</label>
            <input type="text" name="website" class="form-control" value="{{ old('website') }}">
            @error('website') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label>Link Maps</label>
            <input type="text" name="maps" class="form-control" value="{{ old('maps') }}">
            @error('maps') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>
@endsection