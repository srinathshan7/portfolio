@extends('layouts.admin')

@section('admin-header')
    @include('admin.partials.breadcrumbs', ['items' => [
        ['label' => 'Dashboard', 'url' => route('dashboard')],
        ['label' => 'Projects']
    ]])
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">Manage Projects</h1>
                <a href="{{ route('admin.projects.create') }}" class="btn btn-info">
                    <i class="fas fa-plus me-2"></i>Add Project
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">Projects Information</h6>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($projects->count() > 0)
                        <div class="row">
                            @foreach($projects as $project)
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="card h-100 border-0 shadow-sm">
                                        @if($project->image)
                                            <img src="{{ asset('storage/' . $project->image) }}" 
                                                 class="card-img-top" 
                                                 alt="{{ $project->title }}" 
                                                 style="height: 200px; object-fit: cover;">
                                        @else
                                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                                                 style="height: 200px;">
                                                <i class="fas fa-image fa-3x text-muted"></i>
                                            </div>
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $project->title }}</h5>
                                            <p class="card-text">{{ Str::limit($project->description, 100) }}</p>
                                            @if($project->link)
                                                <a href="{{ $project->link }}" target="_blank" class="btn btn-sm btn-outline-info mb-2">
                                                    <i class="fas fa-external-link-alt me-1"></i>View Project
                                                </a>
                                            @endif
                                        </div>
                                        <div class="card-footer bg-transparent">
                                            <div class="btn-group w-100" role="group">
                                                <a href="{{ route('admin.projects.edit', $project->id) }}" 
                                                   class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit me-1"></i>Edit
                                                </a>
                                                <form action="{{ route('admin.projects.destroy', $project->id) }}" 
                                                      method="POST" 
                                                      class="d-inline"
                                                      onsubmit="return confirm('Are you sure you want to delete this project?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-trash me-1"></i>Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-project-diagram fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No projects found</h5>
                            <p class="text-muted">Add your first project to showcase your work.</p>
                            <a href="{{ route('admin.projects.create') }}" class="btn btn-info">
                                <i class="fas fa-plus me-2"></i>Add Project
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 