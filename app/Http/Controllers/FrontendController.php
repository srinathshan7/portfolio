<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $skills = Skill::all();
        $projects = Project::all();

        return view('welcome', compact('profile', 'skills', 'projects'));
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        // Here you can add logic to send email or store contact message
        // For now, we'll just return a success response

        return response()->json(['message' => 'Message sent successfully!']);
    }
}
