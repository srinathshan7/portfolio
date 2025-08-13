@extends('layouts.admin')

@section('admin-header')
    @include('admin.partials.breadcrumbs', ['items' => [
        ['label' => 'Dashboard', 'url' => route('dashboard')],
        ['label' => 'Profiles']
    ]])
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">Manage Profile</h1>
                <a href="{{ route('admin.profiles.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add Profile
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Profile Information</h6>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($profiles->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Tagline</th>
                                        <th>Bio</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($profiles as $profile)
                                        <tr>
                                            <td>
                                                @if($profile->photo)
                                                    <img src="{{ asset('storage/' . $profile->photo) }}" 
                                                         alt="Profile Photo" 
                                                         class="rounded-circle" 
                                                         style="width: 50px; height: 50px; object-fit: cover;">
                                                @else
                                                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" 
                                                         style="width: 50px; height: 50px;">
                                                        <i class="fas fa-user text-muted"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>{{ $profile->name }}</td>
                                            <td>{{ Str::limit($profile->tagline, 50) }}</td>
                                            <td>{{ Str::limit($profile->bio, 100) }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.profiles.edit', $profile->id) }}" 
                                                       class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.profiles.destroy', $profile->id) }}" 
                                                          method="POST" 
                                                          class="d-inline"
                                                          onsubmit="return confirm('Are you sure you want to delete this profile?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-user fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No profile information found</h5>
                            <p class="text-muted">Create your first profile to get started.</p>
                            <a href="{{ route('admin.profiles.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Create Profile
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 