@extends('layouts.admin')

@section('admin-header')
    @include('admin.partials.breadcrumbs', ['items' => [
        ['label' => 'Dashboard', 'url' => route('dashboard')],
        ['label' => 'Profiles', 'url' => route('admin.profiles.index')],
        ['label' => 'Edit']
    ]])
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
                        <a href="{{ route('admin.profiles.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left me-2"></i>Back to List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.profiles.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name', $profile->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tagline" class="form-label">Tagline</label>
                                    <input type="text" class="form-control @error('tagline') is-invalid @enderror" 
                                           id="tagline" name="tagline" value="{{ old('tagline', $profile->tagline) }}" 
                                           placeholder="e.g., Full Stack Developer">
                                    @error('tagline')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('bio') is-invalid @enderror" 
                                      id="bio" name="bio" rows="5" required 
                                      placeholder="Tell us about yourself, your experience, and what you do...">{{ old('bio', $profile->bio) }}</textarea>
                            @error('bio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="about_content" class="form-label">About Me Content</label>
                            <textarea class="form-control @error('about_content') is-invalid @enderror" 
                                      id="about_content" name="about_content" rows="8" 
                                      placeholder="Write your detailed About Me section here (supports rich text if you later add an editor)">{{ old('about_content', $profile->about_content) }}</textarea>
                            @error('about_content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="photo" class="form-label">Profile Photo</label>
                            <input type="file" class="form-control @error('photo') is-invalid @enderror" 
                                   id="photo" name="photo" accept="image/*">
                            <div class="form-text">Recommended size: 400x400 pixels. Max file size: 2MB.</div>
                            @error('photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            @if($profile->photo)
                                <div class="mb-2" id="currentPhotoWrapper">
                                    <label class="form-label">Current Photo:</label>
                                    <div>
                                        <img src="{{ asset('storage/' . $profile->photo) }}" 
                                             alt="Current Profile Photo" 
                                             class="img-thumbnail" 
                                             style="max-width: 200px; max-height: 200px;">
                                    </div>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="remove_photo" name="remove_photo" value="1">
                                    <label class="form-check-label" for="remove_photo">Remove current photo</label>
                                </div>
                            @endif
                            <div id="photoPreview" class="d-none">
                                <label class="form-label">New Photo Preview:</label>
                                <div>
                                    <img id="previewImage" src="" alt="Preview" 
                                         class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.profiles.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Profile
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
    // Photo preview
    $('#photo').change(function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#previewImage').attr('src', e.target.result);
                $('#photoPreview').removeClass('d-none');
            }
            reader.readAsDataURL(file);
        } else {
            $('#photoPreview').addClass('d-none');
        }
    });

    // Toggle remove photo
    $('#remove_photo').on('change', function() {
        if (this.checked) {
            $('#currentPhotoWrapper').addClass('d-none');
            // Clear selected new file if any
            $('#photo').val('');
            $('#photoPreview').addClass('d-none');
        } else {
            $('#currentPhotoWrapper').removeClass('d-none');
        }
    });
});
</script>
@endsection 