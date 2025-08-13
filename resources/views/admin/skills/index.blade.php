@extends('layouts.admin')

@section('admin-header')
    @include('admin.partials.breadcrumbs', ['items' => [
        ['label' => 'Dashboard', 'url' => route('dashboard')],
        ['label' => 'Skills']
    ]])
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">Manage Skills</h1>
                <a href="{{ route('admin.skills.create') }}" class="btn btn-success">
                    <i class="fas fa-plus me-2"></i>Add Skill
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Skills Information</h6>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($skills->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-success">
                                    <tr>
                                        <th>#</th>
                                        <th>Skill Name</th>
                                        <th>Percentage</th>
                                        <th>Progress Bar</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($skills as $index => $skill)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <strong>{{ $skill->name }}</strong>
                                            </td>
                                            <td>
                                                <span class="badge bg-success">{{ $skill->percentage }}%</span>
                                            </td>
                                            <td>
                                                <div class="progress" style="height: 20px;">
                                                    <div class="progress-bar bg-success" 
                                                         role="progressbar" 
                                                         style="width: {{ $skill->percentage }}%" 
                                                         aria-valuenow="{{ $skill->percentage }}" 
                                                         aria-valuemin="0" 
                                                         aria-valuemax="100">
                                                        {{ $skill->percentage }}%
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.skills.edit', $skill->id) }}" 
                                                       class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.skills.destroy', $skill->id) }}" 
                                                          method="POST" 
                                                          class="d-inline"
                                                          onsubmit="return confirm('Are you sure you want to delete this skill?')">
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
                            <i class="fas fa-tools fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No skills found</h5>
                            <p class="text-muted">Add your first skill to showcase your expertise.</p>
                            <a href="{{ route('admin.skills.create') }}" class="btn btn-success">
                                <i class="fas fa-plus me-2"></i>Add Skill
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 