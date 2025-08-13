@extends('layouts.admin')

@section('admin-header')
    @include('admin.partials.breadcrumbs', ['items' => [
        ['label' => 'Dashboard', 'url' => route('dashboard')],
        ['label' => 'Skills', 'url' => route('admin.skills.index')],
        ['label' => 'Create']
    ]])
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-success">Add New Skill</h6>
                        <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left me-2"></i>Back to List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.skills.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Skill Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name') }}" 
                                   placeholder="e.g., Laravel, React, JavaScript" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="percentage" class="form-label">Skill Level <span class="text-danger">*</span></label>
                            <div class="d-flex align-items-center gap-3">
                                <input type="range" class="form-range flex-grow-1 @error('percentage') is-invalid @enderror" 
                                       id="percentage" name="percentage" min="0" max="100" 
                                       value="{{ old('percentage', 50) }}" required>
                                <span class="badge bg-success fs-6" id="percentageValue">{{ old('percentage', 50) }}%</span>
                            </div>
                            <div class="form-text">Drag the slider to set your skill level (0-100%)</div>
                            @error('percentage')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="progress" style="height: 25px;">
                                <div class="progress-bar bg-success" 
                                     role="progressbar" 
                                     id="progressBar"
                                     style="width: {{ old('percentage', 50) }}%" 
                                     aria-valuenow="{{ old('percentage', 50) }}" 
                                     aria-valuemin="0" 
                                     aria-valuemax="100">
                                    {{ old('percentage', 50) }}%
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save me-2"></i>Add Skill
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
    // Update percentage display and progress bar
    $('#percentage').on('input', function() {
        const value = $(this).val();
        $('#percentageValue').text(value + '%');
        $('#progressBar').css('width', value + '%').text(value + '%').attr('aria-valuenow', value);
    });
});
</script>
@endsection 