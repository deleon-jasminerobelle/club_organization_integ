<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PUP Clubs & Organizations</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap');
        
        body {
            font-family: 'Nunito', sans-serif;
            scroll-behavior: smooth;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #800000 0%, #800000 100%);
        }

        .card-hover {
            transition: all 0.3s ease;
            transform: translateY(0);
        }

        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(128, 0, 0, 0.2);
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-pulse-slow {
            animation: pulse-slow 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        .animate-bounce-slow {
            animation: bounce-slow 2s infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @keyframes pulse-slow {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        @keyframes bounce-slow {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-30px); }
            60% { transform: translateY(-15px); }
        }

        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .counter {
            font-variant-numeric: tabular-nums;
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
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex space-x-8">
                    <a href="{{ route('index') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Home</a>
                        <a href="{{ route('club') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Clubs</a>
                        <a href="{{ route('events') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Events</a> 
                        <a href="{{ route('news.list') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">News & Media</a>
                        <a href="{{ route('gallery') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Gallery</a>
                        <a href="{{ route('about') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">About</a>
                    
                <!-- Logout Button -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">
                        Logout
                    </button>
                </form>
            </div>

                <!-- Mobile Menu Button -->
            <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-maroon focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>

            <!-- Mobile Navigation (Hidden by default) -->
            <div id="mobile-menu" class="md:hidden hidden bg-white border-t border-gray-200">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="{{ route('index') }}" class="block px-3 py-2 text-maroon hover:text-red-800 font-medium">Home</a>
                    <a href="{{ route('club') }}" class="block px-3 py-2 text-maroon hover:text-red-800 font-medium">Clubs</a>
                    <a href="{{ route('events') }}" class="block px-3 py-2 text-maroon hover:text-red-800 font-medium">Events</a>
                    <a href="{{ route('news.list') }}" class="block px-3 py-2 text-maroon hover:text-red-800 font-medium">News & Media</a>
                    <a href="{{ route('gallery') }}" class="block px-3 py-2 text-maroon hover:text-red-800 font-medium">Gallery</a>
                    <a href="{{ route('about') }}" class="block px-3 py-2 text-maroon hover:text-red-800 font-medium">About</a>
                    
                    <!-- Mobile Logout Button -->
                    <form method="POST" action="{{ route('logout') }}" class="border-t border-gray-200 pt-2 mt-2">
                        @csrf
                        <button type="submit" class="block w-full text-left px-3 py-2 text-maroon hover:text-red-800 font-medium">
                            Logout
                        </button>
                    </form>
            </div>
        </div>
    </div>
</nav>

    <!-- Hero Section -->
    <section id="home" class="min-h-screen flex items-center justify-center hero-gradient text-white pt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="animate-float">
                <div class="w-32 h-32 mx-auto bg-white/20 rounded-full flex items-center justify-center mb-8">
                    <i class="fas fa-users text-6xl text-white"></i>
                </div>
            </div>
            
            <h1 class="text-5xl md:text-7xl font-bold mb-6 font-playfair fade-in">
                Welcome to <span class="text-gold">PUP TAGUIG</span>
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-white/90 fade-in" style="animation-delay: 0.2s;">
                Discover Amazing Clubs & Organizations
            </p>
            <p class="text-lg mb-12 max-w-3xl mx-auto fade-in" style="animation-delay: 0.4s;">
                Join our vibrant community of student organizations and experience campus life like never before. 
                From academic clubs to cultural societies, there's something for everyone!
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center fade-in" style="animation-delay: 0.6s;">
                <a href="{{ route('club') }}" class="bg-gold text-maroon px-8 py-4 rounded-full font-semibold hover:bg-yellow-300 transform hover:scale-105 transition-all duration-300 shadow-lg text-center">
                    Explore Clubs
                </a>
                <a href="/signup" class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-maroon transform hover:scale-105 transition-all duration-300 text-center">
                    Join Now
                </a>
            </div>

            <div class="mt-16 animate-bounce-slow">
                <i class="fas fa-chevron-down text-2xl text-white/80"></i>
            </div>
        </div>
    </section>

    

    <!-- Statistics Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="fade-in">
                    <div class="text-4xl md:text-6xl font-bold text-maroon counter" data-target="13">0</div>
                    <p class="text-gray-600 mt-2">Active Clubs</p>
                </div>
                <div class="fade-in" style="animation-delay: 0.2s;">
                    <div class="text-4xl md:text-6xl font-bold text-gold counter" data-target="1000">0</div>
                    <p class="text-gray-600 mt-2">Members</p>
                </div>
                <div class="fade-in" style="animation-delay: 0.4s;">
                    <div class="text-4xl md:text-6xl font-bold text-maroon counter" data-target="200">0</div>
                    <p class="text-gray-600 mt-2">Events Yearly</p>
                </div>
                <div class="fade-in" style="animation-delay: 0.6s;">
                    <div class="text-4xl md:text-6xl font-bold text-gold counter" data-target="15">0</div>
                    <p class="text-gray-600 mt-2">Categories</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Clubs Section -->
    <section id="featured-clubs" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold text-maroon mb-4">Featured Clubs</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Discover the most active and exciting student organizations on campus
                </p>
            </div>

            <div class="flex justify-center">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl">
                    <!-- Academic Club Card -->
                    <div class="bg-white rounded-2xl shadow-xl p-6 card-hover fade-in">
                        <div class="w-16 h-16 bg-gold rounded-full flex items-center justify-center mb-4 mx-auto">
                            <i class="fas fa-book text-2xl text-maroon"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-maroon mb-3 text-center">Academic Clubs</h3>
                        <p class="text-gray-600 mb-4 text-center">
                            Enhance your academic journey with subject-specific clubs that focus on learning, research, and professional development in various fields of study.
                        </p>
                        <div class="text-center">
                            <span class="inline-block bg-maroon text-white px-3 py-1 rounded-full text-sm font-semibold">
                                150 Members
                            </span>
                        </div>
                    </div>

                    <!-- Non-Academic Club Card -->
                    <div class="bg-white rounded-2xl shadow-xl p-6 card-hover fade-in" style="animation-delay: 0.2s;">
                        <div class="w-16 h-16 bg-maroon rounded-full flex items-center justify-center mb-4 mx-auto">
                            <i class="fas fa-paint-brush text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-maroon mb-3 text-center">Non-Academic Clubs</h3>
                        <p class="text-gray-600 mb-4 text-center">
                            Explore your passions beyond academics with clubs focused on arts, sports, culture, and recreational activities that enrich campus life.
                        </p>
                        <div class="text-center">
                            <span class="inline-block bg-gold text-maroon px-3 py-1 rounded-full text-sm font-semibold">
                                80 Members
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Events Section -->
    <section id="events" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold text-maroon mb-4">Upcoming Events</h2>
                <p class="text-xl text-gray-600">Don't miss out on these exciting campus events</p>
            </div>

            <!-- Slideshow Container -->
            <div class="slideshow-container mb-12 rounded-2xl overflow-hidden shadow-xl fade-in">
                <!-- Slide 1 -->
                <div class="slide fade">
                    <img src="{{ asset('images/482959368_965891369002240_6039744627788978939_n.jpg') }}" 
                         alt="Event Image 1" class="w-full h-96 object-cover">
                </div>
                
                <!-- Slide 2 -->
                <div class="slide fade">
                    <img src="{{ asset('images/490955491_992222476369129_491892461594551543_n.jpg') }}" 
                         alt="Event Image 2" class="w-full h-96 object-cover">
                </div>
                
                <!-- Slide 3 -->
                <div class="slide fade">
                    <img src="{{ asset('images/491420048_992221616369215_2117323626313947212_n.jpg') }}" 
                         alt="Event Image 3" class="w-full h-96 object-cover">
                </div>
                
                <!-- Slide 4 -->
                <div class="slide fade">
                    <img src="{{ asset('images/506299233_1032447152346661_7683062886974793151_n.jpg') }}" 
                         alt="Event Image 4" class="w-full h-96 object-cover">
                </div>

                <!-- Navigation buttons -->
                <button class="prev-btn absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/80 text-maroon p-3 rounded-full hover:bg-white transition-colors">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="next-btn absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/80 text-maroon p-3 rounded-full hover:bg-white transition-colors">
                    <i class="fas fa-chevron-right"></i>
                </button>

                <!-- Dots indicator -->
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                    <span class="dot w-3 h-3 bg-white/50 rounded-full cursor-pointer"></span>
                    <span class="dot w-3 h-3 bg-white/50 rounded-full cursor-pointer"></span>
                    <span class="dot w-3 h-3 bg-white/50 rounded-full cursor-pointer"></span>
                    <span class="dot w-3 h-3 bg-white/50 rounded-full cursor-pointer"></span>
                </div>
            </div>

            <div id="upcoming-events-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if(isset($upcomingEvents) && $upcomingEvents->count() > 0)
                    @foreach($upcomingEvents as $event)
                        <div class="bg-white rounded-2xl shadow-xl overflow-hidden card-hover fade-in">
                            @php $img = $event->featured_image_url ?? $event->featured_image; @endphp
                            @if($img)
                                <img src="{{ url($img) }}" alt="{{ $event->title }}" class="w-full h-48 object-cover">
                            @else
                                <div class="h-48 bg-maroon flex items-center justify-center">
                                    <i class="fas fa-calendar-alt text-6xl text-white"></i>
                                </div>
                            @endif
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-maroon mb-2">{{ $event->title }}</h3>
                                <p class="text-gray-600 mb-4">{{ $event->start_datetime->format('F j, Y') }} • {{ $event->start_datetime->format('h:i A') }}</p>
                                <p class="text-gray-700 mb-4">{{ Str::limit($event->description, 100) }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Recently Added Events -->
            <div class="mt-16">
                <div class="text-center mb-8 fade-in">
                    <h3 class="text-3xl font-bold text-maroon">Recently Added Events</h3>
                    <p class="text-gray-600">Your most recent event creations</p>
                </div>
                <div id="recent-events-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @if(isset($recentEvents) && $recentEvents->count() > 0)
                        @foreach($recentEvents as $event)
                            @php 
                                $img = $event->featured_image_url ?? $event->featured_image; 
                                $date = \Carbon\Carbon::parse($event->start_datetime);
                            @endphp
                            <div class="bg-white rounded-2xl shadow-xl overflow-hidden card-hover fade-in">
                                @if($img)
                                    <img src="{{ url($img) }}" alt="{{ $event->title }}" class="w-full h-48 object-cover">
                                @else
                                    <div class="h-48 bg-gold flex items-center justify-center">
                                        <i class="fas fa-bullhorn text-6xl text-maroon"></i>
                                    </div>
                                @endif
                                <div class="p-6">
                                    <h3 class="text-xl font-bold text-maroon mb-2">{{ $event->title }}</h3>
                                    <p class="text-gray-600 mb-4">{{ $date->format('F j, Y') }} • {{ $date->format('h:i A') }}</p>
                                    <p class="text-gray-700 mb-4">{{ Str::limit($event->description, 100) }}</p>
                                    <a href="{{ route('events') }}" class="w-full inline-block text-center bg-maroon text-white py-2 rounded-lg hover:bg-red-800 transition-colors">Manage Events</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                <div class="text-center py-12 fade-in col-span-full">
                            <i class="fas fa-spinner fa-spin text-maroon text-4l mb-4"></i>
                            <p class="text-gray-600">Loading recent events...</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>


    <!-- Latest News Section -->
    <section id="latest-news" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold text-maroon mb-4">Latest News</h2>
                <p class="text-xl text-gray-600">Stay updated with the latest happenings on campus</p>
            </div>

            <!-- News Slideshow Container -->
            @if($latestNews->count() > 0)
            <div class="news-slideshow-container mb-12 rounded-2xl overflow-hidden shadow-xl fade-in">
                @foreach($latestNews as $index => $news)
                <!-- News Slide {{ $index + 1 }} -->
                <div class="news-slide fade">
                    <div class="relative">
                        @if($news->featured_image)
                            <img src="{{ $news->featured_image }}" 
                                 alt="{{ $news->title }}" 
                                 class="w-full h-96 object-cover">
                        @else
                            <div class="w-full h-96 bg-gradient-to-br from-maroon to-red-800 flex items-center justify-center">
                                <i class="fas fa-newspaper text-white text-6xl"></i>
                            </div>
                        @endif
                        
                        <!-- News Overlay Content -->
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6">
                            <div class="flex items-center mb-2">
                                <span class="bg-gold text-maroon text-xs px-3 py-1 rounded-full font-semibold mr-3">
                                    {{ ucfirst($news->type) }}
                                </span>
                                <span class="text-white/80 text-sm">
                                    {{ $news->organization->name }}
                                </span>
                            </div>
                            
                            <h3 class="text-2xl font-bold text-white mb-2">{{ $news->title }}</h3>
                            <p class="text-white/90 mb-4 line-clamp-2">{{ $news->excerpt ?? Str::limit($news->content, 120) }}</p>
                            
                            <div class="flex items-center justify-between">
                                <span class="text-white/70 text-sm">
                                    <i class="fas fa-clock mr-1"></i>{{ $news->published_at->diffForHumans() }}
                                </span>
                                <a href="{{ route('news.show', $news->slug) }}" 
                                   class="bg-gold text-maroon px-4 py-2 rounded-lg hover:bg-yellow-300 transition-colors font-semibold text-sm">
                                    Read More <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Navigation buttons -->
                <button class="news-prev-btn absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/80 text-maroon p-3 rounded-full hover:bg-white transition-colors">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="news-next-btn absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/80 text-maroon p-3 rounded-full hover:bg-white transition-colors">
                    <i class="fas fa-chevron-right"></i>
                </button>

                <!-- Dots indicator -->
                <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex space-x-2">
                    @foreach($latestNews as $index => $news)
                    <span class="news-dot w-3 h-3 bg-white/50 rounded-full cursor-pointer"></span>
                    @endforeach
                </div>
            </div>
            @else
            <div class="text-center py-12 fade-in">
                <i class="fas fa-newspaper text-gray-300 text-6xl mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">No news available</h3>
                <p class="text-gray-500">Check back later for the latest updates!</p>
            </div>
            @endif

            <!-- View All News Link -->
            <div class="text-center fade-in">
                <a href="/news" class="inline-flex items-center text-maroon hover:text-red-800 font-semibold text-lg">
                    View All News & Announcements
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-maroon text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-2xl font-bold text-gold mb-4">PUP Clubs</h3>
                    <p class="text-white/80">Building a vibrant campus community through student organizations.</p>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-white/80 hover:text-gold transition-colors">Home</a></li>
                        <li><a href="#clubs" class="text-white/80 hover:text-gold transition-colors">Clubs</a></li>
                        <li><a href="#events" class="text-white/80 hover:text-gold transition-colors">Events</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Connect</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-gold hover:text-maroon transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-gold hover:text-maroon transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-gold hover:text-maroon transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact</h4>
                    <p class="text-white/80">Email: clubs@pup.edu</p>
                    <p class="text-white/80">Phone: (123) 456-7890</p>
                </div>
            </div>
            
            <div class="border-t border-white/20 mt-8 pt-8 text-center">
                <p>&copy; 2024 PUP Clubs & Organizations. All rights reserved.</p>
            </div>
        </div>
    </footer>

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
            initSlideshow();
            // Keep server-rendered events; disable auto-refresh to avoid flicker/overwrite
        });

        // Fetch upcoming events from API
        function fetchUpcomingEvents() {
            fetch('{{ route('events.upcoming') }}')
                .then(response => response.json())
                .then(data => {
                    if (data && data.success && Array.isArray(data.events) && data.events.length > 0) {
                        displayUpcomingEvents(data.events);
                    } // else: keep server-rendered content
                })
                .catch(() => { /* keep server-rendered content on error */ });
        }

        // Display upcoming events in the container
        function displayUpcomingEvents(events) {
            const container = document.getElementById('upcoming-events-container');
            
            if (!events || events.length === 0) return; // keep existing content

            container.innerHTML = '';
            
            events.forEach((event, index) => {
                const eventCard = createEventCard(event, index);
                container.appendChild(eventCard);
                
                // Add fade-in animation with delay
                setTimeout(() => {
                    eventCard.classList.add('visible');
                }, index * 200);
            });
        }

        // Create event card HTML
        function createEventCard(event, index) {
            const eventDate = new Date(event.start_datetime);
            const formattedDate = eventDate.toLocaleDateString('en-US', {
                month: 'long',
                day: 'numeric',
                year: 'numeric'
            });
            const formattedTime = eventDate.toLocaleTimeString('en-US', {
                hour: '2-digit',
                minute: '2-digit'
            });

            const eventTypes = {
                'general': 'calendar-alt',
                'academic': 'book',
                'sports': 'trophy',
                'cultural': 'music',
                'social': 'users'
            };

            const icon = eventTypes[event.type] || 'calendar-alt';

            const card = document.createElement('div');
            card.className = 'bg-white rounded-2xl shadow-xl overflow-hidden card-hover fade-in';
            card.style.animationDelay = `${index * 0.2}s`;
            
            // Check if event has a featured image
            const imageSrc = event.featured_image_url || event.featured_image;
            const imageHtml = imageSrc 
                ? `<img src="${imageSrc}" alt="${event.title}" class="w-full h-48 object-cover">`
                : `<div class="h-48 bg-maroon flex items-center justify-center">
                      <i class="fas fa-${icon} text-6xl text-white"></i>
                   </div>`;
            
            card.innerHTML = `
                ${imageHtml}
                <div class="p-6">
                    <h3 class="text-xl font-bold text-maroon mb-2">${event.title}</h3>
                    <p class="text-gray-600 mb-4">${formattedDate} • ${formattedTime}</p>
                    <p class="text-gray-700 mb-4">${event.description.substring(0, 100)}${event.description.length > 100 ? '...' : ''}</p>
                    <button class="w-full bg-maroon text-white py-2 rounded-lg hover:bg-red-800 transition-colors">
                        View Details
                    </button>
                </div>
            `;
            
            return card;
        }

        // Fetch and display recent events (most recently created)
        function fetchRecentEvents() {
            fetch('{{ route('events.list') }}')
                .then(response => response.json())
                .then(data => {
                    if (!data || !data.success || !Array.isArray(data.events) || data.events.length === 0) {
                        return; // keep server-rendered recent events
                    }
                    const container = document.getElementById('recent-events-container');
                    container.innerHTML = '';
                    data.events.forEach((event, index) => {
                        const eventDate = new Date(event.start_datetime);
                        const formattedDate = eventDate.toLocaleDateString('en-US', {
                            month: 'long', day: 'numeric', year: 'numeric'
                        });
                        const formattedTime = eventDate.toLocaleTimeString('en-US', {
                            hour: '2-digit', minute: '2-digit'
                        });

                        const imageSrc = event.featured_image_url || event.featured_image;
                        const card = document.createElement('div');
                        card.className = 'bg-white rounded-2xl shadow-xl overflow-hidden card-hover fade-in';
                        card.style.animationDelay = `${index * 0.1}s`;
                        card.innerHTML = `
                            ${imageSrc 
                                ? `<img src="${imageSrc}" alt="${event.title}" class="w-full h-48 object-cover">`
                                : `<div class=\"h-48 bg-gold flex items-center justify-center\">` +
                                  `<i class=\"fas fa-bullhorn text-6xl text-maroon\"></i>` +
                                  `</div>`
                            }
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-maroon mb-2">${event.title}</h3>
                                <p class="text-gray-600 mb-4">${formattedDate} • ${formattedTime}</p>
                                <p class="text-gray-700 mb-4">${(event.description || '').toString().substring(0, 100)}${(event.description || '').length > 100 ? '...' : ''}</p>
                                <a href="{{ route('events') }}" class="w-full inline-block text-center bg-maroon text-white py-2 rounded-lg hover:bg-red-800 transition-colors">
                                    Manage Events
                                </a>
                            </div>
                        `;
                        container.appendChild(card);
                    });
                })
                .catch(() => { /* keep server-rendered content on error */ });
        }

        // Show message when no events are available
        function showNoEventsMessage() {
            const container = document.getElementById('upcoming-events-container');
            container.innerHTML = `
                <div class="text-center py-12 fade-in col-span-full">
                    <i class="fas fa-calendar-times text-maroon text-4xl mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">No upcoming events</h3>
                    <p class="text-gray-500">Check back later for upcoming events!</p>
                </div>
            `;
            
            // Add fade-in animation
            setTimeout(() => {
                container.querySelector('.fade-in').classList.add('visible');
            }, 100);
        }

        // Interactive Slideshow Functionality
        function initSlideshow() {
            // Events slideshow
            let slideIndex = 0;
            const slides = document.querySelectorAll('.slide');
            const dots = document.querySelectorAll('.dot');
            const prevBtn = document.querySelector('.prev-btn');
            const nextBtn = document.querySelector('.next-btn');

            // News slideshow
            let newsSlideIndex = 0;
            const newsSlides = document.querySelectorAll('.news-slide');
            const newsDots = document.querySelectorAll('.news-dot');
            const newsPrevBtn = document.querySelector('.news-prev-btn');
            const newsNextBtn = document.querySelector('.news-next-btn');

            // Show specific slide for events
            function showSlide(n) {
                if (n >= slides.length) slideIndex = 0;
                if (n < 0) slideIndex = slides.length - 1;
                
                slides.forEach(slide => slide.style.display = 'none');
                dots.forEach(dot => dot.classList.remove('bg-white'));
                
                slides[slideIndex].style.display = 'block';
                dots[slideIndex].classList.add('bg-white');
            }

            // Show specific slide for news
            function showNewsSlide(n) {
                if (n >= newsSlides.length) newsSlideIndex = 0;
                if (n < 0) newsSlideIndex = newsSlides.length - 1;
                
                newsSlides.forEach(slide => slide.style.display = 'none');
                newsDots.forEach(dot => dot.classList.remove('bg-white'));
                
                newsSlides[newsSlideIndex].style.display = 'block';
                newsDots[newsSlideIndex].classList.add('bg-white');
            }

            // Next/previous controls for events
            function plusSlides(n) {
                showSlide(slideIndex += n);
            }

            // Next/previous controls for news
            function plusNewsSlides(n) {
                showNewsSlide(newsSlideIndex += n);
            }

            // Thumbnail image controls for events
            function currentSlide(n) {
                showSlide(slideIndex = n);
            }

            // Thumbnail image controls for news
            function currentNewsSlide(n) {
                showNewsSlide(newsSlideIndex = n);
            }

            // Auto-advance slides for events
            function autoSlide() {
                plusSlides(1);
                setTimeout(autoSlide, 5000); // Change slide every 5 seconds
            }

            // Auto-advance slides for news
            function autoNewsSlide() {
                plusNewsSlides(1);
                setTimeout(autoNewsSlide, 5000); // Change slide every 5 seconds
            }

            // Event listeners for events slideshow
            if (prevBtn && nextBtn) {
                prevBtn.addEventListener('click', () => plusSlides(-1));
                nextBtn.addEventListener('click', () => plusSlides(1));
                
                dots.forEach((dot, index) => {
                    dot.addEventListener('click', () => currentSlide(index));
                });
            }

            // Event listeners for news slideshow
            if (newsPrevBtn && newsNextBtn) {
                newsPrevBtn.addEventListener('click', () => plusNewsSlides(-1));
                newsNextBtn.addEventListener('click', () => plusNewsSlides(1));
                
                newsDots.forEach((dot, index) => {
                    dot.addEventListener('click', () => currentNewsSlide(index));
                });
            }

            // Initialize events slideshow
            if (slides.length > 0) {
                showSlide(slideIndex);
                setTimeout(autoSlide, 5000);
            }

            // Initialize news slideshow
            if (newsSlides.length > 0) {
                showNewsSlide(newsSlideIndex);
                setTimeout(autoNewsSlide, 5000);
            }

            // Pause on hover for events slideshow
            const slideshowContainer = document.querySelector('.slideshow-container');
            if (slideshowContainer) {
                slideshowContainer.addEventListener('mouseenter', () => {
                    clearTimeout(autoSlide);
                });
                
                slideshowContainer.addEventListener('mouseleave', () => {
                    setTimeout(autoSlide, 3000);
                });
            }

            // Pause on hover for news slideshow
            const newsSlideshowContainer = document.querySelector('.news-slideshow-container');
            if (newsSlideshowContainer) {
                newsSlideshowContainer.addEventListener('mouseenter', () => {
                    clearTimeout(autoNewsSlide);
                });
                
                newsSlideshowContainer.addEventListener('mouseleave', () => {
                    setTimeout(autoNewsSlide, 3000);
                });
            }
        }

        // Add slideshow styles
        const style = document.createElement('style');
        style.textContent = `
            .slide, .news-slide {
                display: none;
                position: relative;
                width: 100%;
                height: 100%;
            }
            
            .slide.fade, .news-slide.fade {
                animation: fade 1.5s ease-in-out;
            }
            
            @keyframes fade {
                from { opacity: 0.4; }
                to { opacity: 1; }
            }
            
            .dot.active, .news-dot.active {
                background-color: #ffffff !important;
                transform: scale(1.2);
            }
            
            .slideshow-container, .news-slideshow-container {
                position: relative;
            }
            
            .line-clamp-2 {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>