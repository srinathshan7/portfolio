<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample profile
        Profile::create([
            'name' => 'John Doe',
            'tagline' => 'Full Stack Developer',
            'bio' => 'I am a passionate and dedicated developer with 5+ years of experience in web development. I specialize in creating responsive, scalable, and maintainable applications using modern technologies like Laravel, React, and Vue.js. I love solving complex problems and turning ideas into reality through clean, efficient code.',
        ]);

        // Create sample skills
        $skills = [
            ['name' => 'Laravel', 'percentage' => 90],
            ['name' => 'PHP', 'percentage' => 85],
            ['name' => 'JavaScript', 'percentage' => 80],
            ['name' => 'React', 'percentage' => 75],
            ['name' => 'Vue.js', 'percentage' => 70],
            ['name' => 'MySQL', 'percentage' => 85],
            ['name' => 'HTML/CSS', 'percentage' => 90],
            ['name' => 'Git', 'percentage' => 80],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        // Create sample projects
        $projects = [
            [
                'title' => 'E-commerce Platform',
                'description' => 'A full-featured e-commerce platform built with Laravel and Vue.js. Features include user authentication, product management, shopping cart, payment integration, and admin dashboard.',
                'link' => 'https://github.com/example/ecommerce'
            ],
            [
                'title' => 'Task Management App',
                'description' => 'A collaborative task management application with real-time updates, team collaboration, and progress tracking. Built with React and Node.js.',
                'link' => 'https://github.com/example/taskmanager'
            ],
            [
                'title' => 'Portfolio Website',
                'description' => 'A responsive portfolio website showcasing projects and skills. Built with Laravel, Bootstrap, and jQuery for smooth interactions.',
                'link' => 'https://github.com/example/portfolio'
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
