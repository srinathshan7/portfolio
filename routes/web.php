<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index']);

Route::post('/contact', [FrontendController::class, 'contact'])->name('contact');

Route::get('/dashboard', function () {
    $profileCount = \App\Models\Profile::count();
    $skillCount = \App\Models\Skill::count();
    $projectCount = \App\Models\Project::count();
    
    return view('dashboard', compact('profileCount', 'skillCount', 'projectCount'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('profiles', ProfileController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('projects', ProjectController::class);
});


require __DIR__.'/auth.php';
