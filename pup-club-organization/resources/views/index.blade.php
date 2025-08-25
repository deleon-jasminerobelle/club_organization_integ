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
                
                <div class="hidden md:flex space-x-8">
                    <a href="#home" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Home</a>
                    <a href="#clubs" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Clubs</a> 
                    <a href="#events" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Events</a> 
                    <a href="#news & media" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">News & Media</a>
                    <a href="/gallery" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Gallery</a>
                    <a href="officers" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Officers</a>
                    <a href="#about" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">About</a>
                    <a href="#contact" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Contact</a>
                </div>

                <div class="md:hidden">
                    <button class="text-maroon focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
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
                <button class="bg-gold text-maroon px-8 py-4 rounded-full font-semibold hover:bg-yellow-300 transform hover:scale-105 transition-all duration-300 shadow-lg">
                    Explore Clubs
                </button>
                <button class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-maroon transform hover:scale-105 transition-all duration-300">
                    Join Now
                </button>
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
    <section id="clubs" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold text-maroon mb-4">Featured Clubs</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Discover the most active and exciting student organizations on campus
                </p>
            </div>

            <div class="flex justify-center">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl">
                    <!-- Club Card 1 -->
                    <div class="bg-white rounded-2xl shadow-xl p-6 card-hover fade-in">
                        <div class="w-16 h-16 bg-maroon rounded-full flex items-center justify-center mb-4 mx-auto">
                            <i class="fas fa-code text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-maroon mb-3 text-center">Non-Academic</h3>
                        <p class="text-gray-600 mb-4 text-center">
                            For tech enthusiasts and future innovators. Join us for hackathons, workshops, and tech talks.
                        </p>
                        <div class="text-center">
                            <span class="inline-block bg-gold text-maroon px-3 py-1 rounded-full text-sm font-semibold">
                                150 Members
                            </span>
                        </div>
                    </div>

                    <!-- Club Card 2 -->
                    <div class="bg-white rounded-2xl shadow-xl p-6 card-hover fade-in" style="animation-delay: 0.2s;">
                        <div class="w-16 h-16 bg-gold rounded-full flex items-center justify-center mb-4 mx-auto">
                            <i class="fas fa-music text-2xl text-maroon"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-maroon mb-3 text-center">Academic</h3>
                        <p class="text-gray-600 mb-4 text-center">
                            Express your musical talent. Join our band, choir, or participate in musical events.
                        </p>
                        <div class="text-center">
                            <span class="inline-block bg-maroon text-white px-3 py-1 rounded-full text-sm font-semibold">
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

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Event 1 -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden card-hover fade-in">
                    <div class="h-48 bg-maroon flex items-center justify-center">
                        <i class="fas fa-calendar-alt text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-maroon mb-2">Tech Conference 2024</h3>
                        <p class="text-gray-600 mb-4">March 15, 2024 • 2:00 PM</p>
                        <p class="text-gray-700 mb-4">Annual technology conference featuring industry experts and workshops.</p>
                        <button class="w-full bg-maroon text-white py-2 rounded-lg hover:bg-red-800 transition-colors">
                            Register Now
                        </button>
                    </div>
                </div>

                <!-- Event 2 -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden card-hover fade-in" style="animation-delay: 0.2s;">
                    <div class="h-48 bg-maroon flex items-center justify-center">
                        <i class="fas fa-music text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-maroon mb-2">Music Festival</h3>
                        <p class="text-gray-600 mb-4">April 20, 2024 • 6:00 PM</p>
                        <p class="text-gray-700 mb-4">Annual music festival featuring student bands and performances.</p>
                        <button class="w-full bg-gold text-maroon py-2 rounded-lg hover:bg-yellow-300 transition-colors">
                            Get Tickets
                        </button>
                    </div>
                </div>

                <!-- Event 3 -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden card-hover fade-in" style="animation-delay: 0.4s;">
                    <div class="h-48 bg-maroon flex items-center justify-center">
                        <i class="fas fa-trophy text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-maroon mb-2">Sports Tournament</h3>
                        <p class="text-gray-600 mb-4">May 5, 2024 • 9:00 AM</p>
                        <p class="text-gray-700 mb-4">Inter-college sports tournament with various competitions.</p>
                        <button class="w-full bg-maroon text-white py-2 rounded-lg hover:bg-red-800 transition-colors">
                            Join Team
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News & Media Section -->
    <section id="news-media" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold text-maroon mb-4">News & Media</h2>
                <p class="text-xl text-gray-600">Stay updated with the latest campus happenings and events</p>
            </div>

            <!-- Interactive Slideshow -->
            <div class="relative max-w-6xl mx-auto">
                <!-- Slideshow Container -->
                <div class="relative h-96 md:h-[500px] rounded-2xl overflow-hidden shadow-2xl">
                    <!-- Slides -->
                    <div class="slideshow-container h-full">
                        <!-- Slide 1 -->
                        <div class="slide fade">
                            <div class="absolute inset-0 bg-gradient-to-r from-maroon/90 to-maroon/60"></div>
                            <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" 
                                 alt="Campus Event" class="w-full h-full object-cover">
                            <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                                <h3 class="text-2xl md:text-3xl font-bold mb-2">Annual Tech Conference 2024</h3>
                                <p class="text-lg mb-4">Join us for the biggest technology event of the year featuring industry experts and workshops</p>
                                <span class="bg-gold text-maroon px-4 py-2 rounded-full text-sm font-semibold">March 15, 2024</span>
                            </div>
                        </div>

                        <!-- Slide 2 -->
                        <div class="slide fade">
                            <div class="absolute inset-0 bg-gradient-to-r from-maroon/90 to-maroon/60"></div>
                            <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" 
                                 alt="Student Activities" class="w-full h-full object-cover">
                            <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                                <h3 class="text-2xl md:text-3xl font-bold mb-2">Student Leadership Summit</h3>
                                <p class="text-lg mb-4">Developing future leaders through workshops and networking opportunities</p>
                                <span class="bg-gold text-maroon px-4 py-2 rounded-full text-sm font-semibold">April 10, 2024</span>
                            </div>
                        </div>

                        <!-- Slide 3 -->
                        <div class="slide fade">
                            <div class="absolute inset-0 bg-gradient-to-r from-maroon/90 to-maroon/60"></div>
                            <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" 
                                 alt="Cultural Festival" class="w-full h-full object-cover">
                            <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                                <h3 class="text-2xl md:text-3xl font-bold mb-2">Cultural Diversity Festival</h3>
                                <p class="text-lg mb-4">Celebrating diversity with performances, food, and cultural exhibitions</p>
                                <span class="bg-gold text-maroon px-4 py-2 rounded-full text-sm font-semibold">May 20, 2024</span>
                            </div>
                        </div>

                        <!-- Slide 4 -->
                        <div class="slide fade">
                            <div class="absolute inset-0 bg-gradient-to-r from-maroon/90 to-maroon/60"></div>
                            <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" 
                                 alt="Sports Tournament" class="w-full h-full object-cover">
                            <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                                <h3 class="text-2xl md:text-3xl font-bold mb-2">Inter-College Sports Championship</h3>
                                <p class="text-lg mb-4">Witness the best athletes compete in various sports competitions</p>
                                <span class="bg-gold text-maroon px-4 py-2 rounded-full text-sm font-semibold">June 5, 2024</span>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Arrows -->
                    <button class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-white/20 hover:bg-white/40 text-white p-3 rounded-full transition-all duration-300 prev-btn">
                        <i class="fas fa-chevron-left text-xl"></i>
                    </button>
                    <button class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-white/20 hover:bg-white/40 text-white p-3 rounded-full transition-all duration-300 next-btn">
                        <i class="fas fa-chevron-right text-xl"></i>
                    </button>

                    <!-- Dots Indicator -->
                    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                        <span class="dot w-3 h-3 bg-white/50 rounded-full cursor-pointer"></span>
                        <span class="dot w-3 h-3 bg-white/50 rounded-full cursor-pointer"></span>
                        <span class="dot w-3 h-3 bg-white/50 rounded-full cursor-pointer"></span>
                        <span class="dot w-3 h-3 bg-white/50 rounded-full cursor-pointer"></span>
                    </div>
                </div>

                <!-- News Grid Below Slideshow -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                    <!-- News Card 1 -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover">
                        <div class="w-12 h-12 bg-maroon rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-newspaper text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-maroon mb-3">New Club Launches</h3>
                        <p class="text-gray-600 mb-4">Three new student organizations have been approved this semester...</p>
                        <a href="#" class="text-maroon hover:text-red-800 font-semibold flex items-center">
                            Read More <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>

                    <!-- News Card 2 -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover">
                        <div class="w-12 h-12 bg-gold rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-trophy text-maroon"></i>
                        </div>
                        <h3 class="text-xl font-bold text-maroon mb-3">Award Winners</h3>
                        <p class="text-gray-600 mb-4">Our students won 5 awards at the regional competition...</p>
                        <a href="#" class="text-maroon hover:text-red-800 font-semibold flex items-center">
                            Read More <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>

                    <!-- News Card 3 -->
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover">
                        <div class="w-12 h-12 bg-maroon rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-calendar text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-maroon mb-3">Upcoming Events</h3>
                        <p class="text-gray-600 mb-4">Mark your calendars for these exciting events happening next month...</p>
                        <a href="#" class="text-maroon hover:text-red-800 font-semibold flex items-center">
                            Read More <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
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
        });

        // Interactive Slideshow Functionality
        function initSlideshow() {
            let slideIndex = 0;
            const slides = document.querySelectorAll('.slide');
            const dots = document.querySelectorAll('.dot');
            const prevBtn = document.querySelector('.prev-btn');
            const nextBtn = document.querySelector('.next-btn');

            // Show specific slide
            function showSlide(n) {
                if (n >= slides.length) slideIndex = 0;
                if (n < 0) slideIndex = slides.length - 1;
                
                slides.forEach(slide => slide.style.display = 'none');
                dots.forEach(dot => dot.classList.remove('bg-white'));
                
                slides[slideIndex].style.display = 'block';
                dots[slideIndex].classList.add('bg-white');
            }

            // Next/previous controls
            function plusSlides(n) {
                showSlide(slideIndex += n);
            }

            // Thumbnail image controls
            function currentSlide(n) {
                showSlide(slideIndex = n);
            }

            // Auto-advance slides
            function autoSlide() {
                plusSlides(1);
                setTimeout(autoSlide, 5000); // Change slide every 5 seconds
            }

            // Event listeners
            prevBtn.addEventListener('click', () => plusSlides(-1));
            nextBtn.addEventListener('click', () => plusSlides(1));
            
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => currentSlide(index));
            });

            // Initialize slideshow
            showSlide(slideIndex);
            setTimeout(autoSlide, 5000); // Start auto-slide after 5 seconds

            // Pause on hover
            const slideshowContainer = document.querySelector('.slideshow-container');
            slideshowContainer.addEventListener('mouseenter', () => {
                clearTimeout(autoSlide);
            });
            
            slideshowContainer.addEventListener('mouseleave', () => {
                setTimeout(autoSlide, 3000); // Resume after 3 seconds
            });
        }

        // Add slideshow styles
        const style = document.createElement('style');
        style.textContent = `
            .slide {
                display: none;
                position: relative;
                width: 100%;
                height: 100%;
            }
            
            .slide.fade {
                animation: fade 1.5s ease-in-out;
            }
            
            @keyframes fade {
                from { opacity: 0.4; }
                to { opacity: 1; }
            }
            
            .dot.active {
                background-color: #ffffff !important;
                transform: scale(1.2);
            }
            
            .slideshow-container {
                position: relative;
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>
