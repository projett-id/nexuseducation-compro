@extends('admin.layouts.app')

@section('content')
<form class="card" action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
    <div class="card-header">Create</div>
    <div class="card-body">
        @csrf

        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-control">
                <option value="">-- Select Category --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Location</label>
            <input type="text" name="location" class="form-control" value="{{ old('location') }}">
            @error('location') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3 row">
            <label>Start Date</label>
             <div class="col-md-6">
                <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}">
            </div>
            <div class="col-md-6">
                <input type="time" name="start_time" class="form-control" value="{{ old('start_time') }}">
            </div>
            @error('start_date') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3 row">
            <label>End Date</label>
             <div class="col-md-6">
                <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}">
            </div>
            <div class="col-md-6">
                <input type="time" name="end_time" class="form-control" value="{{ old('end_time') }}">
            </div>
            @error('start_date') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control tinymce" rows="5">{{ old('description') }}</textarea>
            @error('content') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control">
            @error('thumbnail') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="upcoming" {{ old('status') == 'upcomming' ? 'selected' : '' }}>Upcoming</option>
                <option value="ongoing" {{ old('status') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="finished" {{ old('status') == 'finished' ? 'selected' : '' }}>Finished</option>
                <option value="canceled" {{ old('status') == 'canceled' ? 'selected' : '' }}>Canceled</option>
            </select>
            @error('status') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Tags</label>
            <select name="tags[]" multiple class="form-control">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" 
                        {{ collect(old('tags', []))->contains($tag->id) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
            @error('tags') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
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
