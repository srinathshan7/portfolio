<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Portfolio') }} - Admin</title>

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
		<style>
			.admin-wrapper{display:flex;min-height:100vh}
			.admin-sidebar{width:260px;background:#1f2937;color:#fff;position:fixed;top:0;bottom:0}
			.admin-sidebar .brand{padding:1rem 1.25rem;border-bottom:1px solid rgba(255,255,255,.1);font-weight:700}
			.admin-sidebar .nav-link{color:#cbd5e1;padding:.75rem 1.25rem}
			.admin-sidebar .nav-link.active,.admin-sidebar .nav-link:hover{background:#111827;color:#fff}
			.admin-content{margin-left:260px;width:calc(100% - 260px)}
			.admin-header{position:sticky;top:0;z-index:10;background:#fff;border-bottom:1px solid #e5e7eb}
			.content-inner{padding:1.25rem}
			@media (max-width: 991.98px){.admin-sidebar{position:static;width:100%}.admin-content{margin-left:0;width:100%}}
		</style>
	</head>
	<body>
		<div class="admin-wrapper">
			<aside class="admin-sidebar">
				<div class="brand d-flex align-items-center justify-content-between">
					<span><i class="fas fa-toolbox me-2"></i> Admin</span>
				</div>
				<nav class="nav flex-column">
					<a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="fas fa-gauge-high me-2"></i> Dashboard</a>
					<a class="nav-link {{ request()->is('admin/profiles*') ? 'active' : '' }}" href="{{ route('admin.profiles.index') }}"><i class="fas fa-user me-2"></i> Profiles</a>
					<a class="nav-link {{ request()->is('admin/skills*') ? 'active' : '' }}" href="{{ route('admin.skills.index') }}"><i class="fas fa-screwdriver-wrench me-2"></i> Skills</a>
					<a class="nav-link {{ request()->is('admin/projects*') ? 'active' : '' }}" href="{{ route('admin.projects.index') }}"><i class="fas fa-diagram-project me-2"></i> Projects</a>
					<a class="nav-link" href="{{ url('/') }}" target="_blank"><i class="fas fa-external-link-alt me-2"></i> View Site</a>
				</nav>
			</aside>
			<div class="admin-content">
				<header class="admin-header">
					<div class="container-fluid py-2 d-flex justify-content-between align-items-center">
						<div>
							@yield('admin-header')
						</div>
						<div class="d-flex align-items-center gap-3">
							<span class="text-muted small">{{ auth()->user()->name ?? 'User' }}</span>
							<form method="POST" action="{{ route('logout') }}">
								@csrf
								<button class="btn btn-outline-secondary btn-sm"><i class="fas fa-sign-out-alt me-2"></i>Logout</button>
							</form>
						</div>
					</div>
				</header>
				<main class="content-inner">
					@yield('content')
				</main>
			</div>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	</body>
</html> 