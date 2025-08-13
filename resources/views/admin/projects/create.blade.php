@extends('layouts.admin')

@section('admin-header')
    @include('admin.partials.breadcrumbs', ['items' => [
        ['label' => 'Dashboard', 'url' => route('dashboard')],
        ['label' => 'Projects', 'url' => route('admin.projects.index')],
        ['label' => 'Create']
    ]])
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-info">Add New Project</h6>
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left me-2"></i>Back to List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="title" class="form-label">Project Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" name="title" value="{{ old('title') }}" 
                                   placeholder="e.g., E-commerce Website" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Project Description <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="5" required 
                                      placeholder="Describe your project, technologies used, features, etc...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="link" class="form-label">Project Link</label>
                            <input type="url" class="form-control @error('link') is-invalid @enderror" 
                                   id="link" name="link" value="{{ old('link') }}" 
                                   placeholder="https://example.com">
                            <div class="form-text">Optional: Link to live demo or GitHub repository</div>
                            @error('link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Project Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                   id="image" name="image" accept="image/*">
                            <div class="form-text">Recommended size: 800x600 pixels. Max file size: 2MB.</div>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div id="imagePreview" class="d-none">
                                <label class="form-label">Image Preview:</label>
                                <div>
                                    <img id="previewImage" src="" alt="Preview" 
                                         class="img-thumbnail" style="max-width: 300px; max-height: 200px;">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                            <button type="submit" class="btn btn-info">
                                <i class="fas fa-save me-2"></i>Add Project
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Image preview
    $('#image').change(function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#previewImage').attr('src', e.target.result);
                $('#imagePreview').removeClass('d-none');
            }
            reader.readAsDataURL(file);
        } else {
            $('#imagePreview').addClass('d-none');
        }
    });
});
</script>
@endsection 