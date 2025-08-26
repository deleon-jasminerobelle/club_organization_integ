<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gallery - PUP Clubs & Organizations</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap');
        
        body {
            font-family: 'Nunito', sans-serif;
            scroll-behavior: smooth;
        }
                                                     
        .maroon {
            color: #800000;
        }

        .bg-maroon {
            background-color: #800000;
        }

        .gold {
            color: #FFD700;
        }

        .bg-gold {
            background-color: #FFD700;
        }

        .card-hover {
            transition: all 0.3s ease;
            transform: translateY(0);
        }

        .card-hover:hover {
            transform: translateY(-5px);
        }

        .font-playfair {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>
<body class="antialiased">
    <!-- Navigation -->
    <nav class="fixed w-full bg-white backdrop-blur-sm shadow-lg z-50 transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <img src="{{ asset('images/pup_logo.png') }}" alt="PUP Logo" class="h-10 w-auto mr-2">
                    <span class="text-lg font-semibold text-maroon">Clubs & Organizations</span>
                </div>
                
                <div class="hidden md:flex space-x-8">
<a href="/" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Home</a>
                    <a href="/#clubs" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Clubs</a> 
                    <a href="/#events" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Events</a> 
                    <a href="/#news-media" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">News & Media</a>
                    <a href="/gallery" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Gallery</a>
                    <a href="/#officers" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Officers</a>
                    <a href="/#about" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">About</a>
                    <a href="/#contact" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Contact</a>
                </div>

                <div class="md:hidden">
                    <button class="text-maroon focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div class="min-h-screen bg-gray-50 pt-20">
    <!-- Header Section -->
    <div class="relative h-96 bg-maroon overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-maroon/90 to-maroon/60"></div>
        <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" 
             alt="Gallery Header" class="w-full h-full object-cover">
        <div class="absolute inset-0 flex items-center justify-center text-center text-white">
            <div class="max-w-4xl mx-auto px-4">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 font-playfair">Our Moments, Our Stories</h1>
                <p class="text-xl md:text-2xl text-white/90">Capturing our journey through photos, events and achievements</p>
            </div>
        </div>
    </div>

    <!-- Filter and Search Bar -->
    <div class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <!-- Filter Buttons -->
                <div class="flex flex-wrap gap-3">
                    <a href="?filter=All" class="px-6 py-3 rounded-full font-semibold bg-maroon text-white">
                        All
                    </a>
                    <a href="?filter=Photo" class="px-6 py-3 rounded-full font-semibold bg-gray-200 text-gray-700 hover:bg-gray-300">
                        Photos
                    </a>
                    <a href="?filter=Event" class="px-6 py-3 rounded-full font-semibold bg-gray-200 text-gray-700 hover:bg-gray-300">
                        Events
                    </a>
                    <a href="?filter=Achievement" class="px-6 py-3 rounded-full font-semibold bg-gray-200 text-gray-700 hover:bg-gray-300">
                        Achievements
                    </a>
                </div>
                <div class="flex items-center gap-4">
                    <!-- Search Bar -->
                    <div class="flex-grow">
                        <input type="text" placeholder="Search..." class="w-full px-4 py-2 border border-gray-300 rounded-md" />
                    </div>
                    <!-- Upload Button -->
                    <a href="{{ route('media.create') }}" class="px-6 py-3 rounded-full font-semibold bg-green-600 text-white hover:bg-green-700">
                        <i class="fas fa-plus mr-2"></i>Upload
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        @if($media->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($media as $item)
                    <div class="bg-white rounded-lg shadow-md card-hover">
                        <img src="{{ asset($item->file_path) }}" 
                             alt="{{ $item->alt_text ?? $item->title }}" 
                             class="w-full h-48 object-cover rounded-t-lg">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold">{{ $item->title ?? 'Untitled' }}</h3>
                            <p class="text-gray-500">{{ $item->created_at->format('M Y') }}</p>
                            <p class="text-gray-700">{{ $item->description ?? 'No description available' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <div class="text-gray-400 text-6xl mb-4">
                    <i class="fas fa-image"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">No media items found</h3>
                <p class="text-gray-500">There are currently no gallery items to display.</p>
            </div>
        @endif
    </div>
</div>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Navbar background on scroll - Keep it white always
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 100) {
                navbar.classList.add('shadow-lg');
            } else {
                navbar.classList.remove('shadow-lg');
            }
        });

        // Counter animation
        function animateCounter() {
            const counters = document.querySelectorAll('.counter');
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText;
                const increment = target / 100;
                
                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(() => animateCounter(counter), 20);
                } else {
                    counter.innerText = target;
                }
            });
        }

        // Intersection Observer for fade-in animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    if (entry.target.classList.contains('counter')) {
                        animateCounter();
                    }
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });

        // Initialize animations on page load
        window.addEventListener('load', function() {
            document.querySelectorAll('.fade-in').forEach(el => {
                el.classList.add('visible');
            });
            animateCounter();
        });
    </script>
</body>
</html>
