<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Portfolio') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
        <!-- Custom CSS -->
        <style>
            .portfolio-section {
                padding: 80px 0;
            }
            .skill-progress {
                height: 25px;
                border-radius: 15px;
            }
            .project-card {
                transition: transform 0.3s ease;
            }
            .project-card:hover {
                transform: translateY(-5px);
            }
            .hero-section {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                padding: 120px 0;
                margin-top: 76px;
            }
            .navbar-brand {
                font-weight: bold;
                font-size: 1.5rem;
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-light">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
        
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        
        <!-- Custom JS -->
        <script>
            $(document).ready(function() {
                // Initialize tooltips
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl)
                });
                
                // Smooth scrolling for anchor links
                $('a[href^="#"]').on('click', function(event) {
                    var target = $(this.getAttribute('href'));
                    if( target.length ) {
                        event.preventDefault();
                        $('html, body').stop().animate({
                            scrollTop: target.offset().top - 70
                        }, 1000);
                    }
                });
            });
        </script>
    </body>
</html>
