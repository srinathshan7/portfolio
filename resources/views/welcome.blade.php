@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section id="home" class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Hi, I'm <span class="text-warning">{{ $profile->name ?? 'Your Name' }}</span></h1>
                <h2 class="h3 mb-4">{{ $profile->tagline ?? 'Full Stack Developer' }}</h2>
                <p class="lead mb-4">{{ $profile->bio ?? 'Passionate about creating beautiful and functional web applications. I love turning ideas into reality through code.' }}</p>
                <div class="d-flex gap-3">
                    <a href="#projects" class="btn btn-warning btn-lg">
                        <i class="fas fa-eye me-2"></i>View My Work
                    </a>
                    <a href="#contact" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-envelope me-2"></i>Contact Me
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                @if($profile && $profile->photo)
                    <img src="{{ asset('storage/' . $profile->photo) }}" alt="Profile Photo" class="img-fluid rounded-circle" style="max-width: 400px;">
                @else
                    <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 400px; height: 400px;">
                        <i class="fas fa-user fa-8x text-muted"></i>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="portfolio-section bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="display-5 fw-bold">About Me</h2>
                <div class="divider mx-auto bg-primary" style="width: 60px; height: 4px;"></div>
            </div>
        </div>
        <div class="row align-items-start">
            <div class="col-lg-8">
                @if(!empty($profile?->about_content))
                    {!! $profile->about_content !!}
                @else
                    <p class="lead">{{ $profile->bio ?? 'I am a passionate and dedicated developer with a strong foundation in modern web technologies. I enjoy solving complex problems and creating user-friendly applications that make a difference.' }}</p>
                @endif
            </div>
            <div class="col-lg-4">
                <div class="row g-4">
                    <div class="col-6">
                        <div class="card text-center h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <i class="fas fa-code fa-3x text-primary mb-3"></i>
                                <h5 class="card-title">Clean Code</h5>
                                <p class="card-text">Writing maintainable and efficient code</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card text-center h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <i class="fas fa-mobile-alt fa-3x text-success mb-3"></i>
                                <h5 class="card-title">Responsive</h5>
                                <p class="card-text">Mobile-first responsive design</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card text-center h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <i class="fas fa-rocket fa-3x text-warning mb-3"></i>
                                <h5 class="card-title">Fast</h5>
                                <p class="card-text">Optimized for performance</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card text-center h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <i class="fas fa-shield-alt fa-3x text-danger mb-3"></i>
                                <h5 class="card-title">Secure</h5>
                                <p class="card-text">Security best practices</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="portfolio-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="display-5 fw-bold">My Skills</h2>
                <div class="divider mx-auto bg-primary" style="width: 60px; height: 4px;"></div>
            </div>
        </div>
        <div class="row">
            @forelse($skills ?? [] as $skill)
                <div class="col-lg-6 mb-4">
                    <div class="d-flex justify-content-between mb-2">
                        <h6 class="fw-bold">{{ $skill->name }}</h6>
                        <span class="text-muted">{{ $skill->percentage }}%</span>
                    </div>
                    <div class="progress skill-progress">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $skill->percentage }}%" aria-valuenow="{{ $skill->percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Skills will be displayed here once added through the admin panel.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="portfolio-section bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="display-5 fw-bold">My Projects</h2>
                <div class="divider mx-auto bg-primary" style="width: 60px; height: 4px;"></div>
            </div>
        </div>
        <div class="row">
            @forelse($projects ?? [] as $project)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card project-card h-100 border-0 shadow-sm">
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top" alt="{{ $project->title }}" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-image fa-3x text-muted"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <p class="card-text">{{ Str::limit($project->description, 100) }}</p>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            @if($project->link)
                                <a href="{{ $project->link }}" target="_blank" class="btn btn-primary btn-sm">
                                    <i class="fas fa-external-link-alt me-1"></i>View Project
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Projects will be displayed here once added through the admin panel.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="portfolio-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="display-5 fw-bold">Get In Touch</h2>
                <div class="divider mx-auto bg-primary" style="width: 60px; height: 4px;"></div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow">
                    <div class="card-body p-5">
                        <form id="contactForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-paper-plane me-2"></i>Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0">&copy; {{ date('Y') }} {{ $profile->name ?? 'Portfolio' }}. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="social-links">
                    <a href="#" class="text-white me-3" data-bs-toggle="tooltip" title="GitHub">
                        <i class="fab fa-github fa-lg"></i>
                    </a>
                    <a href="#" class="text-white me-3" data-bs-toggle="tooltip" title="LinkedIn">
                        <i class="fab fa-linkedin fa-lg"></i>
                    </a>
                    <a href="#" class="text-white me-3" data-bs-toggle="tooltip" title="Twitter">
                        <i class="fab fa-twitter fa-lg"></i>
                    </a>
                    <a href="#" class="text-white" data-bs-toggle="tooltip" title="Email">
                        <i class="fas fa-envelope fa-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
$(document).ready(function() {
    // Contact form submission
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();
        
        $.ajax({
            url: '/contact',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert('Thank you for your message! I will get back to you soon.');
                $('#contactForm')[0].reset();
            },
            error: function() {
                alert('Sorry, there was an error sending your message. Please try again.');
            }
        });
    });
    
    // Animate progress bars on scroll
    $(window).scroll(function() {
        var skillsSection = $('#skills');
        if ($(window).scrollTop() + $(window).height() > skillsSection.offset().top) {
            $('.progress-bar').each(function() {
                var percentage = $(this).attr('aria-valuenow');
                $(this).css('width', percentage + '%');
            });
        }
    });
});
</script>
@endsection 