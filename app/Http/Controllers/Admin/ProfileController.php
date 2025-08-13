<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::all();
        return view('admin.profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'bio' => 'required|string',
            'about_content' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['name', 'tagline', 'bio', 'about_content']);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('profiles', 'public');
            $data['photo'] = $photoPath;
        }

        Profile::create($data);

        return redirect()->route('admin.profiles.index')
            ->with('success', 'Profile created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profile = Profile::findOrFail($id);
        return view('admin.profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profile = Profile::findOrFail($id);
        return view('admin.profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profile = Profile::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'bio' => 'required|string',
            'about_content' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['name', 'tagline', 'bio', 'about_content']);

        // Handle explicit remove request
        if ($request->boolean('remove_photo') && $profile->photo) {
            Storage::disk('public')->delete($profile->photo);
            $data['photo'] = null;
        }

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($profile->photo) {
                Storage::disk('public')->delete($profile->photo);
            }
            
            $photoPath = $request->file('photo')->store('profiles', 'public');
            $data['photo'] = $photoPath;
        }

        $profile->update($data);

        return redirect()->route('admin.profiles.index')
            ->with('success', 'Profile updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profile = Profile::findOrFail($id);

        // Delete photo if exists
        if ($profile->photo) {
            Storage::disk('public')->delete($profile->photo);
        }

        $profile->delete();

        return redirect()->route('admin.profiles.index')
            ->with('success', 'Profile deleted successfully!');
    }
}
