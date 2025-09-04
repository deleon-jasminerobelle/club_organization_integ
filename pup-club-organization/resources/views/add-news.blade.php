<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Add News - PUP Clubs & Organizations</title>
  <link href="https://fonts.bunny.net/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
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
          <a href="{{ route('index') }}">
            <img src="{{ asset('images/pup_logo.png') }}" alt="PUP Logo" class="h-10 w-auto mr-2" />
          </a>
          <span class="text-lg font-semibold text-maroon">Clubs & Organizations</span>
        </div>

        <div class="hidden md:flex space-x-8">
          <a href="{{ route('index') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Home</a>
          <a href="{{ route('club') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Clubs</a>
          <a href="{{ route('events') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Events</a>
          <a href="{{ route('news.list') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">News & Media</a>
          <a href="{{ route('announcements') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Announcements</a>
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

        <div class="md:hidden">
          <button class="text-maroon focus:outline-none">
            <i class="fas fa-bars text-2xl"></i>
          </button>
        </div>
      </div>
    </div>
  </nav>

  <main class="pt-24 px-4 max-w-4xl mx-auto">

    <div class="text-center mb-12">
      <h1 class="text-4xl font-bold text-red-700 mb-4">Add News</h1>
      <p class="text-gray-600 text-lg">Add a new news item to PUP Clubs & Organizations</p>
      <a href="{{ route('news.list') }}" class="inline-block mt-4 text-red-700 hover:text-red-900 font-semibold underline">Back to News List</a>
    </div>

    <section class="bg-white p-6 rounded-xl shadow-md mb-10">
      <form id="newsForm" class="space-y-4">
        @csrf
        <div class="grid md:grid-cols-2 gap-4">
          <div>
            <label class="block font-semibold mb-1">Organization</label>
            <select name="organization_id" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-red-500">
              <option value="">Select Organization</option>
              @foreach($organizations as $org)
                <option value="{{ $org->id }}">{{ $org->name }}</option>
              @endforeach
            </select>
          </div>
          <div>
            <label class="block font-semibold mb-1">Type</label>
            <select name="type" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-red-500">
              <option value="announcement">Announcement</option>
              <option value="news">News</option>
              <option value="event">Event</option>
              <option value="general">General</option>
            </select>
          </div>
        </div>
        <div>
          <label class="block font-semibold mb-1">Title</label>
          <input type="text" name="title" required placeholder="News title" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-red-500" />
        </div>
        <div>
          <label class="block font-semibold mb-1">Content</label>
          <textarea name="content" required placeholder="News content..." rows="4" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-red-500"></textarea>
        </div>
        <div>
          <label class="block font-semibold mb-1">Excerpt (Optional)</label>
          <textarea name="excerpt" placeholder="Brief excerpt..." rows="2" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-red-500"></textarea>
        </div>
        <div>
          <label class="block font-semibold mb-1">Featured Image URL (Optional)</label>
          <input type="url" name="featured_image" placeholder="https://example.com/image.jpg" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-red-500" />
        </div>
        <div class="text-right">
          <button type="submit" class="bg-red-700 text-white px-6 py-3 rounded-lg hover:bg-red-800 transition-colors">
            <i class="fas fa-plus mr-2"></i>Add News
          </button>
        </div>
      </form>
    </section>

  </main>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const form = document.getElementById('newsForm');
      form.addEventListener('submit', async function (e) {
        e.preventDefault();

        const formData = new FormData(form);
        const submitBtn = form.querySelector('button[type="submit"]');

        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Adding...';

        try {
          const response = await fetch('/api/news', {
            method: 'POST',
            headers: {
              'Accept': 'application/json',
              'Content-Type': 'application/json',
            },
            body: JSON.stringify(formData ? Object.fromEntries(formData) : {})
          });

          const data = await response.json();

          if (data.success) {
            alert('News added successfully!');
            form.reset();
            window.location.href = '/news';
          } else {
            alert('Error: ' + Object.values(data.errors).join(', '));
          }
        } catch (error) {
          alert('An error occurred. Please try again.');
          console.error('Error:', error);
        } finally {
          submitBtn.disabled = false;
          submitBtn.innerHTML = '<i class="fas fa-plus mr-2"></i>Add News';
        }
      });
    });
  </script>

</body>
</html>
