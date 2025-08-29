<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $news->title }} - PUP Clubs & Organizations</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="antialiased bg-gray-50">

    <!-- Navigation -->
    <nav class="fixed w-full bg-white backdrop-blur-sm shadow-lg z-50 transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <img src="{{ asset('images/pup_logo.png') }}" alt="PUP Logo" class="h-10 w-auto mr-2">
                    <span class="text-lg font-semibold text-maroon">Clubs & Organizations</span>
                </div>

               <div class="hidden md:flex space-x-8">
                    <a href="{{ route('index') }}#home" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Home</a>
                    <a href="{{ route('club') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Clubs</a>
                    <a href="{{ route('index') }}#events" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Events</a> 
                    <a href="{{ route('news.list') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">News & Media</a>
                    <a href="{{ route('gallery') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Gallery</a>
                    <a href="{{ route('index') }}#about" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">About</a>
                    <a href="{{ route('index') }}#contact" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Contact</a>
               
                    <!-- Logout Button -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">
                        Logout
                    </button>
                </form>
            </div>

            <div class="md:hidden">
                <button class="text-maroon focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </div>
</nav>

    <main class="pt-24 px-4 max-w-4xl mx-auto">
        
        <!-- Back Button -->
        <div class="mb-6">
            <a href="/news" class="text-red-600 hover:text-red-800 font-semibold flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Back to News
            </a>
        </div>

        <!-- News Article -->
        <article class="bg-white rounded-xl shadow-md overflow-hidden">
            @if($news->featured_image)
                <img src="{{ $news->featured_image }}" alt="{{ $news->title }}" class="w-full h-64 object-cover">
            @else
                <div class="w-full h-64 bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center">
                    <i class="fas fa-newspaper text-white text-6xl"></i>
                </div>
            @endif

            <div class="p-8">
                <!-- Meta Information -->
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center space-x-4">
                        <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-semibold">
                            {{ ucfirst($news->type) }}
                        </span>
                        <span class="text-gray-500 text-sm">
                            {{ $news->organization->name }}
                        </span>
                    </div>
                    <div class="text-right">
                        <span class="text-gray-500 text-sm">
                            {{ $news->published_at->format('F j, Y') }}
                        </span>
                        <div class="text-gray-500 text-sm">
                            <i class="fas fa-eye mr-1"></i>{{ $news->view_count }} views
                        </div>
                    </div>
                </div>

                <!-- Title -->
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    {{ $news->title }}
                </h1>

                <!-- Content -->
                <div class="prose max-w-none text-gray-700 mb-8">
                    {!! nl2br(e($news->content)) !!}
                </div>

                <!-- Author and Published Info -->
                <div class="border-t pt-6">
                    <p class="text-gray-600 text-sm">
                        Published by {{ $news->user->name ?? 'System' }} on {{ $news->published_at->format('F j, Y \\a\\t g:i A') }}
                    </p>
                </div>
            </div>
        </article>

        <!-- Related News Section -->
        <section class="mt-12">
            <h2 class="text-2xl font-bold text-red-700 mb-6">Related News</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <!-- You can add related news functionality here later -->
                <div class="bg-white p-6 rounded-xl shadow-md text-center">
                    <i class="fas fa-newspaper text-gray-300 text-4xl mb-4"></i>
                    <p class="text-gray-600">More news coming soon...</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md text-center">
                    <i class="fas fa-calendar text-gray-300 text-4xl mb-4"></i>
                    <p class="text-gray-600">Stay tuned for updates!</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-maroon text-white py-12 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p>&copy; 2024 PUP Clubs & Organizations. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Navbar background on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 100) {
                navbar.classList.add('shadow-lg');
            } else {
                navbar.classList.remove('shadow-lg');
            }
        });
    </script>
</body>
</html>
