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
        <div id="sections-container">
            <h4>Sections</h4>
            <div class="sections">
                <div class="section-group mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-11">
                                        <div class="form-group mb-3">
                                            <label>Section Name</label>
                                            <input type="text" name="sections[0][name]" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="sections[0][description]" class="tinymce" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="btn btn-danger remove-section" style="display:none;">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-success" id="add-section">
                <i class="fas fa-plus"></i> Add Section
            </button>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>
@endsection
@push('scripts')  
<script>
    document.addEventListener('DOMContentLoaded', function() {
    let sectionCount = 1;
    
    document.getElementById('add-section').addEventListener('click', function() {
        const sectionsDiv = document.querySelector('.sections');
        const newSection = document.querySelector('.section-group').cloneNode(true);
        
        // Update input names
        newSection.querySelectorAll('input, textarea').forEach(input => {
            input.name = input.name.replace('[0]', `[${sectionCount}]`);
            input.value = '';
        });
        
        // Show remove button
        newSection.querySelector('.remove-section').style.display = 'block';
        
        sectionsDiv.appendChild(newSection);
        sectionCount++;
        
        // Add remove functionality
        newSection.querySelector('.remove-section').addEventListener('click', function() {
            newSection.remove();
        });
    });
    
    // Show remove button if there's more than one section
    document.querySelectorAll('.section-group').forEach((section, index) => {
        if (index > 0) {
            section.querySelector('.remove-section').style.display = 'block';
        }
    });
});
</script>
@endpush