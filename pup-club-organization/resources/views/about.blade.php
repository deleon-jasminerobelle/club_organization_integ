<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>About PUP Taguig — Clubs & Organizations</title>
	<link href="https://fonts.bunny.net/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
	<style>
		body { font-family: 'Nunito', sans-serif; }
		.hero-gradient { background: linear-gradient(135deg, #800000 0%, #800000 100%); }
	</style>
</head>
<body class="antialiased">
	<!-- Navigation -->
	<nav class="w-full bg-white backdrop-blur-sm shadow-lg z-50">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="flex justify-between items-center py-4">
				<div class="flex items-center">
					<img src="{{ asset('images/pup_logo.png') }}" alt="PUP Logo" class="h-10 w-auto mr-2">
					<span class="text-lg font-semibold text-maroon">Clubs & Organizations</span>
				</div>
				<div class="hidden md:flex space-x-8">
					<a href="{{ route('index') }}#home" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium">Home</a>
					<a href="{{ route('club') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium">Clubs</a>
					<a href="{{ route('events') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium">Events</a>
					<a href="{{ route('news.list') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium">News & Media</a>
					<a href="{{ route('gallery') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium">Gallery</a>
					<a href="{{ route('about') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium">About</a>
					<form method="POST" action="{{ route('logout') }}">
						@csrf
						<button type="submit" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium">Logout</button>
					</form>
				</div>
			</div>
		</div>
	</nav>

	<!-- Hero -->
	<section class="hero-gradient text-white">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
			<h1 class="text-5xl md:text-6xl font-extrabold">About PUP Taguig</h1>
			<p class="mt-4 text-xl text-white/90 max-w-3xl mx-auto">A dynamic campus of the Polytechnic University of the Philippines, committed to providing quality, affordable, and inclusive education.</p>
		</div>
	</section>

	<!-- Content -->
	<section class="py-16">
		<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="bg-white rounded-2xl shadow-xl p-8 md:p-12">
				<h2 class="font-bold text-maroon mb-6 text-center" style="font-size: 50px; line-height: 1.0;">Campus Overview:</h2>
				<h2 class="text-2xl md:text-3xl font-bold text-maroon mb-6 text-center" style="line-height: 1.0;">Polytechnic University of the Philippines – Taguig Campus (PUP Taguig)</h2>
				<p class="text-gray-700 text-lg mb-6" style="text-align: justify; line-height: 1.5;">
					The Polytechnic University of the Philippines Taguig Campus, established in 1992, is one of the extension campuses of the country’s premier state university. Strategically located at Gen. Santos Avenue, Lower Bicutan, Taguig City, the campus provides accessible and affordable quality education to students in Metro Manila and nearby provinces.
				</p>
				<p class="text-gray-700 text-lg mb-6" style="text-align: justify; line-height: 1.5;">
					PUP Taguig is committed to nurturing competent, innovative, and socially responsible graduates equipped with the skills and knowledge to meet the demands of a rapidly changing society. It offers various undergraduate programs in Information Technology, Engineering, Business, and other disciplines, all designed to promote academic excellence and holistic student development.
				</p>
				<p class="text-gray-700 text-lg mb-8" style="text-align: justify; line-height: 1.5;">
					With its strong sense of service, inclusivity, and nationalism, PUP Taguig continues to uphold the values of the PUP community, integrity, accountability, and a passion for lifelong learning—while serving as a beacon of hope and opportunity for the youth.
				</p>

				<h3 class="text-xl font-semibold text-maroon mb-3">What we stand for</h3>
				<ul class="list-disc pl-6 text-gray-700 space-y-2 mb-8">
					<li>Delivering accessible, high-quality polytechnic education</li>
					<li>Developing industry-ready, ethical, and innovative professionals</li>
					<li>Enriching holistic growth through active clubs and campus life</li>
				</ul>

				<div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
					<a href="https://www.pup.edu.ph/taguig/" target="_blank" rel="noopener" class="inline-flex items-center bg-gold text-maroon px-6 py-3 rounded-full font-semibold hover:bg-yellow-300 transition-colors">
						Visit Official Page
						<i class="fas fa-arrow-up-right-from-square ml-2"></i>
					</a>
					<div class="text-gray-700">
						<p><span class="font-semibold">Phone:</span> (+63 2) 5335-1PUP (5335-1787) or 5335-1777</p>
						<p><span class="font-semibold">Email:</span> inquire@pup.edu.ph</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<footer class="bg-maroon text-white py-12">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="text-center">
				<p>&copy; 2024 PUP Clubs & Organizations. All rights reserved.</p>
				<p class="mt-2">&copy; 1998-2025 Polytechnic University of the Philippines</p>
			</div>
		</div>
	</footer>
</body>
</html>


