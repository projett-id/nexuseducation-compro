@extends('admin.layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success mb-2">{{ session('success') }}</div>
@endif

<form class="card" action="{{ route('partner-school.update', $partner_school->id) }}" method="POST" enctype="multipart/form-data">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-edit"></i> Form School</h3>
    </div>
    <div class="card-body">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Banner Header</label>
            <input type="file" name="banner_header" class="form-control">
            @if($partner_school->banner_header)
                <img src="{{ asset('storage/'.$partner_school->banner_header) }}" class="mt-2" width="300">
            @endif
            @error('banner_header') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label>Country</label>
            <select name="country_id" class="form-control">
                @foreach($country as $c)
                <option value="{{ $c->id }}" {{ $partner_school->country_id == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                @endforeach
            </select>
            @error('country_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="form-group mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required autocomplete="off" value="{{ $partner_school->name }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label>Logo</label>
            <input type="file" name="logo" class="form-control">
            @if($partner_school->logo)
                <img src="{{ asset('storage/'.$partner_school->logo) }}" class="mt-2" width="100">
            @endif
            @error('logo') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label>Location</label>
            <input type="text" name="location" class="form-control" value="{{ $partner_school->name }}">
            @error('location') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label>Link Website</label>
            <input type="text" name="website" class="form-control" value="{{ $partner_school->website }}">
            @error('website') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label>Link Maps</label>
            <input type="text" name="maps" class="form-control" value="{{ $partner_school->maps }}">
            @error('maps') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>

<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">Detail</h3>
        <div class="card-tools">
            <a href="{{ route('partner-school.detail', ['partner_school' => $partner_school->id]) }}" class="btn btn-primary btn-sm float-right">Add</a>
        </div>
    </div>
    <div class="card-body">
           <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Section</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               @foreach($sections as $sc)
                <tr>
                    <td>{{$sc->title}}</td>
                    <td>{{$sc->content}}</td>
                    <td>
                        <a href="{{ route('partner-school.detail', ['partner_school' => $partner_school->id, 'detail'=>$sc]) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('partner-school.detail.destroy', ['partner_school' => $partner_school->id, 'detail'=>$sc]) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this data?')">Delete</button>
                        </form>
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $sections->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.tiny.cloud/1/wzom1ixn5sqob8678qukkfdqdosyzir7lsex72s09gyngyww/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>
<script>
    tinymce.init({
        selector: 'textarea.tinymce',
        height: 400,
        plugins: 'advlist autolink lists link image charmap preview anchor pagebreak code fullscreen insertdatetime media table emoticons',
        toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | code fullscreen',
        menubar: false,
        content_style: "body { font-family:Helvetica,Arial,sans-serif; font-size:14px }"
    });
</script>
@endpush
