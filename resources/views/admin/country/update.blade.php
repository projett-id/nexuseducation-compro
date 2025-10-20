@extends('admin.layouts.app')

@section('content')
<form class="card" action="{{ route('country.update', $country->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-header">Country</div>
    <div class="card-body">
        <div class="form-group mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required autocomplete="off" value="{{ $country->name }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="form-group mb-3">
            <label>Flag</label>
            <input type="file" name="flag" class="form-control">
            @if($country->flag)
                <img src="{{ asset('storage/'.$country->flag) }}" class="mt-2" width="150">
            @endif
            @error('flag') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ $country->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $country->status == 0? 'selected' : '' }}>In-Active</option>
            </select>
            @error('status') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Sections -->
        <div id="sections-container" class="mt-4">
            <h4>Sections</h4>
            <div class="sections">
                @forelse($country->sections as $key => $section)
                    <div class="section-group mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-11">
                                        <div class="form-group mb-3">
                                            <label>Section Name</label>
                                            <input type="text" name="sections[{{$key}}][name]" class="form-control" 
                                                required value="{{ $section->section_name }}">
                                            @error("sections.{$key}.name") 
                                                <small class="text-danger">{{ $message }}</small> 
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="sections[{{$key}}][description]" class="form-control" 
                                                rows="3">{{ $section->description }}</textarea>
                                            @error("sections.{$key}.description") 
                                                <small class="text-danger">{{ $message }}</small> 
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="btn btn-danger remove-section" 
                                            {{ $key == 0 ? 'style=display:none' : '' }}>
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
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
                                            <textarea name="sections[0][description]" class="form-control" rows="3"></textarea>
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
                @endforelse
            </div>
            <button type="button" class="btn btn-success" id="add-section">
                <i class="fas fa-plus"></i> Add Section
            </button>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let sectionCount = {{ $country->sections->count() ?: 1 }};
    
    document.getElementById('add-section').addEventListener('click', function() {
        const sectionsDiv = document.querySelector('.sections');
        const newSection = document.querySelector('.section-group').cloneNode(true);
        
        // Update input names and clear values
        newSection.querySelectorAll('input, textarea').forEach(input => {
            input.name = input.name.replace(/\[\d+\]/, `[${sectionCount}]`);
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
    
    // Add remove functionality to existing remove buttons
    document.querySelectorAll('.remove-section').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('.section-group').remove();
        });
    });
});
</script>
@endpush
