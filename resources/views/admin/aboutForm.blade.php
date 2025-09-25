@extends('admin.layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Form About</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('about.form') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label>Company Name</label>
                <input type="text" name="company_name" class="form-control" value="{{$data->company_name}}">
                @error('company_name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group mb-3">
                <label>Proprietor</label>
                <input type="text" name="proprietor" class="form-control" value="{{$data->proprietor}}">
                @error('proprietor') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group mb-3">
                <label>Contact No</label>
                <input type="text" name="contact_no" class="form-control" value="{{$data->contact_no}}">
                @error('contact_no') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group mb-3">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="{{$data->email}}">
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group mb-3">
                <label>Address</label>
                <input type="text" name="address" class="form-control" value="{{$data->address}}">
                @error('address') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group mb-3">
                <label>Link Maps</label>
                <input type="text" name="link_maps" class="form-control" value="{{$data->link_maps}}">
                @error('link_maps') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group mb-3">
                <label>About</label>
                <textarea rows="10" name="about" class="form-control" required>{{ old('about',$data->about ?? '')}}</textarea>
                @error('about') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group mb-3">
                <label>Vision</label>
                <textarea rows="10" name="vision" class="form-control" required>{{ old('vision',$data->vision ?? '')}}</textarea>
                @error('vision') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group mb-3">
                <label>Mission</label>
                <textarea rows="10" name="mission" class="form-control" required>{{ old('mission',$data->mission ?? '')}}</textarea>
                @error('mission') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group mb-3" style="border:1px solid lightgray;padding:10px; border-radius:5px">
                <label>Values</label>
                @foreach($data->values as $vl)
                    <div class="form-group mb-3">
                        <label>Image</label>
                        <input type="file" name="values[][img]" class="form-control" accept="image/*">
                    </div>
                    <div class="form-group mb-3">
                        <label>Name</label>
                        <input type="text" name="values[][name]" class="form-control" value="{{$vl['name']}}">
                    </div>
                @endforeach
            </div>
            <div class="form-group mb-3">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>
</div>
@endsection
