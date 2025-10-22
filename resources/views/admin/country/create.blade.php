@extends('admin.layouts.app')

@section('content')
<form class="card" action="{{ route('country.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-header">Country</div>
    <div class="card-body">

        <!-- Name -->
        <div class="form-group mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required autocomplete="off" value="{{ old('name') }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Flag -->
        <div class="form-group mb-3">
            <label>Flag</label>
            <input type="file" name="flag" class="form-control">
            @error('flag') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Sections -->
        <div id="sections-container" class="mt-4">
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
                                        <textarea id="tinymce_0" name="sections[0][description]" class="tinymce" rows="3"></textarea>
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

            <button type="button" class="btn btn-success mt-2" id="add-section">
                <i class="fas fa-plus"></i> Add Section
            </button>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>

<!-- Hidden template for cloning -->
<div id="section-template" style="display:none;">
    <div class="section-group mb-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-11">
                        <div class="form-group mb-3">
                            <label>Section Name</label>
                            <input type="text" name="sections[__INDEX__][name]" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea id="tinymce___INDEX__" name="sections[__INDEX__][description]" class="tinymce" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-1">
                        <button type="button" class="btn btn-danger remove-section">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {

    // Inisialisasi awal TinyMCE
    function initTinyBySelector(selector) {
        tinymce.init({
            selector: selector,
            height: 400,
            plugins: 'advlist autolink lists link image charmap preview anchor pagebreak code fullscreen insertdatetime media table emoticons',
            toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | code fullscreen',
            menubar: false,
            content_style: "body { font-family:Helvetica,Arial,sans-serif; font-size:14px }"
        });
    }

    initTinyBySelector('.tinymce');

    let sectionCount = 1;
    const sectionsContainer = document.querySelector('.sections');
    const template = document.getElementById('section-template').innerHTML;

    // Tambah section baru
    document.getElementById('add-section').addEventListener('click', function() {
        const index = sectionCount;
        const html = template.replace(/__INDEX__/g, index);

        const wrapper = document.createElement('div');
        wrapper.innerHTML = html.trim();
        const newSection = wrapper.firstElementChild;

        sectionsContainer.appendChild(newSection);

        // Inisialisasi TinyMCE untuk textarea baru
        const textareaId = `tinymce_${index}`;
        initTinyBySelector(`#${textareaId}`);

        sectionCount++;
    });

    // Hapus section + hapus instance TinyMCE
    sectionsContainer.addEventListener('click', function(e) {
        if (e.target.closest('.remove-section')) {
            const sectionGroup = e.target.closest('.section-group');
            const textarea = sectionGroup.querySelector('textarea');
            if (textarea && textarea.id && tinymce.get(textarea.id)) {
                tinymce.get(textarea.id).remove();
            }
            sectionGroup.remove();
        }
    });
});
</script>
@endpush
