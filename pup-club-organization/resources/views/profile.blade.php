<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PUP Clubs & Organizations - My Profile</title>
  <link href="https://fonts.bunny.net/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Nunito', sans-serif;
      scroll-behavior: smooth;
    }
    .profile-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .profile-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
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
              <a href="{{ route('events') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Events</a>
              <a href="{{ route('news.list') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">News & Media</a>
              <a href="{{ route('announcements') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Announcements</a>
              <a href="{{ route('gallery') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Gallery</a>
              <a href="{{ route('about') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">About</a>
              <a href="{{ route('profile') }}" class="text-red-700 hover:text-red-800 transition-all duration-300 font-medium hover:scale-110" title="Profile">
                <i class="fas fa-user-circle text-xl"></i>
              </a>


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

    <!-- Page Header -->
    <div class="text-center mb-12">
      <h1 class="text-4xl font-bold text-red-700 mb-4">My Profile</h1>
      <p class="text-gray-600 text-lg">View and manage your account information</p>
    </div>

    <!-- Profile Information Card -->
    <div class="bg-white rounded-xl shadow-md p-8 profile-card mb-8">
      <div class="flex items-center mb-6">
        <div class="w-20 h-20 bg-red-600 rounded-full flex items-center justify-center mr-6">
          <i class="fas fa-user text-white text-3xl"></i>
        </div>
        <div>
          <h2 class="text-2xl font-bold text-gray-800">{{ session('user.name') ?? 'User' }}</h2>
          <p class="text-gray-600">{{ session('user.username') ?? session('user.email') ?? 'No email available' }}</p>
        </div>
      </div>

      <div class="grid md:grid-cols-2 gap-6">
        <!-- Account Information -->
        <div class="bg-gray-50 rounded-lg p-6">
          <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
            <i class="fas fa-user-circle mr-2 text-red-600"></i>
            Account Information
          </h3>
          <div class="space-y-3">
            <div class="flex justify-between">
              <span class="text-gray-600">Name:</span>
              <span class="font-medium">{{ session('user.name') ?? 'Not available' }}</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-600">Email:</span>
              <span class="font-medium">{{ session('user.username') ?? session('user.email') ?? 'Not available' }}</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-600">User ID:</span>
              <span class="font-medium">{{ session('user.id') ?? 'Not available' }}</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-600">Status:</span>
              <span class="font-medium text-green-600">
                <i class="fas fa-circle mr-1"></i>
                {{ session('user.authenticated') ? 'Active' : 'Inactive' }}
              </span>
            </div>
          </div>
        </div>

        <!-- Additional Information -->
        <div class="bg-gray-50 rounded-lg p-6">
          <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
            <i class="fas fa-info-circle mr-2 text-red-600"></i>
            Additional Details
          </h3>
          <div class="text-center py-8">
            <i class="fas fa-database text-gray-300 text-4xl mb-4"></i>
            <p class="text-gray-600 mb-2">Detailed signup information</p>
            <p class="text-sm text-gray-500">Your complete profile details (student number, program, year, etc.) are securely stored in our external registration system.</p>
            <p class="text-sm text-gray-500 mt-2">For any changes to your personal information, please contact the administration.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Activity Summary -->
    <div class="bg-white rounded-xl shadow-md p-8 profile-card mb-8">
      <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
        <i class="fas fa-chart-line mr-2 text-red-600"></i>
        Activity Summary
      </h3>

      <div class="grid md:grid-cols-3 gap-6">
        <div class="text-center">
          <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
            <i class="fas fa-newspaper text-blue-600 text-2xl"></i>
          </div>
          <h4 class="font-semibold text-gray-800">News Articles</h4>
          <p class="text-2xl font-bold text-blue-600">0</p>
          <p class="text-sm text-gray-600">Articles created</p>
        </div>

        <div class="text-center">
          <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
            <i class="fas fa-calendar-check text-green-600 text-2xl"></i>
          </div>
          <h4 class="font-semibold text-gray-800">Events</h4>
          <p class="text-2xl font-bold text-green-600">0</p>
          <p class="text-sm text-gray-600">Events participated</p>
        </div>

        <div class="text-center">
          <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3">
            <i class="fas fa-users text-purple-600 text-2xl"></i>
          </div>
          <h4 class="font-semibold text-gray-800">Clubs</h4>
          <p class="text-2xl font-bold text-purple-600">0</p>
          <p class="text-sm text-gray-600">Clubs joined</p>
        </div>
      </div>
    </div>

    <!-- Account Settings -->
    <div class="bg-white rounded-xl shadow-md p-8 profile-card">
      <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
        <i class="fas fa-cog mr-2 text-red-600"></i>
        Account Settings
      </h3>

      <div class="space-y-4">
        <div class="flex items-center justify-between p-4 border rounded-lg">
          <div>
            <h4 class="font-semibold text-gray-800">Email Notifications</h4>
            <p class="text-sm text-gray-600">Receive notifications about new events and announcements</p>
          </div>
          <label class="relative inline-flex items-center cursor-pointer">
            <input type="checkbox" class="sr-only peer" checked>
            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-red-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-600"></div>
          </label>
        </div>

        <div class="flex items-center justify-between p-4 border rounded-lg">
          <div>
            <h4 class="font-semibold text-gray-800">Profile Visibility</h4>
            <p class="text-sm text-gray-600">Make your profile visible to other club members</p>
          </div>
          <label class="relative inline-flex items-center cursor-pointer">
            <input type="checkbox" class="sr-only peer">
            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-red-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-600"></div>
          </label>
        </div>
      </div>

      <div class="mt-6 pt-6 border-t">
        <p class="text-sm text-gray-600">
          <i class="fas fa-info-circle mr-1"></i>
          For security reasons, password changes and major account modifications must be handled through the main registration system.
        </p>
      </div>
    </div>

  </main>

</body>
</html>
