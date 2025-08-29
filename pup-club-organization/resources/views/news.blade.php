<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PUP Clubs & Organizations - News & Announcements</title>
  <link href="https://fonts.bunny.net/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Nunito', sans-serif;
      scroll-behavior: smooth;
    }
    .news-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .news-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    .category-badge {
      position: absolute;
      top: 12px;
      right: 12px;
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
              <a href="{{ route('gallery') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Gallery</a>
              <a href="{{ route('about') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">About</a>
<<<<<<< HEAD
      
=======
>>>>>>> 7d41b3ce2b683db4e70d977e6d7025ed2e15188b
         
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

  <main class="pt-24 px-4 max-w-7xl mx-auto">

    <!-- Page Header -->
    <div class="text-center mb-12">
      <h1 class="text-4xl font-bold text-red-700 mb-4">News & Announcements</h1>
      <p class="text-gray-600 text-lg">Stay updated with the latest news and announcements from PUP Clubs & Organizations</p>
    </div>

    <!-- Filters and Search -->
    <div class="bg-white p-6 rounded-xl shadow-md mb-10">
      <div class="grid md:grid-cols-4 gap-4">
        <div>
          <label class="block font-semibold mb-1">Filter by Organization</label>
          <select id="organizationFilter" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-red-500">
            <option value="">All Organizations</option>
            @foreach($organizations as $org)
              <option value="{{ $org->id }}">{{ $org->name }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="block font-semibold mb-1">Filter by Type</label>
          <select id="typeFilter" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-red-500">
            <option value="">All Types</option>
            <option value="announcement">Announcement</option>
            <option value="news">News</option>
            <option value="event">Event</option>
            <option value="general">General</option>
          </select>
        </div>
        <div>
          <label class="block font-semibold mb-1">Search</label>
          <input type="text" id="searchInput" placeholder="Search news..." class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-red-500">
        </div>
        <div class="flex items-end">
          <button id="clearFilters" class="w-full bg-gray-500 text-white px-4 py-3 rounded-lg hover:bg-gray-600 transition-colors">
            Clear Filters
          </button>
        </div>
      </div>
    </div>

    <!-- ADD NEWS FORM -->
    <section class="bg-white p-6 rounded-xl shadow-md mb-10">
      <h2 class="text-2xl font-bold text-red-700 mb-4">Add New Announcement</h2>
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
          <input type="text" name="title" required placeholder="News title" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-red-500">
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
          <input type="url" name="featured_image" placeholder="https://example.com/image.jpg" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-red-500">
        </div>
        <div class="text-right">
          <button type="submit" class="bg-red-700 text-white px-6 py-3 rounded-lg hover:bg-red-800 transition-colors">
            <i class="fas fa-plus mr-2"></i>Add News
          </button>
        </div>
      </form>
    </section>

    <!-- NEWS LIST -->
    <section class="mb-12">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-red-700">Latest News</h2>
        <span class="text-gray-600">{{ $news->total() }} news items found</span>
      </div>

      @if($news->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
          @foreach($news as $item)
            <div class="news-card bg-white rounded-xl shadow-md overflow-hidden relative">
              <span class="category-badge bg-red-600 text-white text-xs px-3 py-1 rounded-full">
                {{ ucfirst($item->type) }}
              </span>
              
              @if($item->featured_image)
                <img src="{{ $item->featured_image }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
              @else
                <div class="w-full h-48 bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center">
                  <i class="fas fa-newspaper text-white text-4xl"></i>
                </div>
              @endif
              
              <div class="p-6">
                <div class="flex items-center justify-between mb-2">
                  <span class="text-sm text-gray-500">{{ $item->organization->name }}</span>
                  <span class="text-sm text-gray-500">{{ $item->published_at->diffForHumans() }}</span>
                </div>
                
                <h3 class="font-bold text-xl mb-3 text-gray-800 hover:text-red-700 transition-colors">
                  <a href="{{ route('news.show', $item->slug) }}">{{ $item->title }}</a>
                </h3>
                
                <p class="text-gray-600 mb-4 line-clamp-3">
                  {{ $item->excerpt ?? Str::limit($item->content, 120) }}
                </p>
                
                <div class="flex items-center justify-between">
                  <span class="text-sm text-gray-500">
                    <i class="fas fa-eye mr-1"></i>{{ $item->view_count }} views
                  </span>
                  <a href="{{ route('news.show', $item->slug) }}" class="text-red-600 hover:text-red-800 font-semibold text-sm">
                    Read More <i class="fas fa-arrow-right ml-1"></i>
                  </a>
                </div>
              </div>
            </div>
          @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
          {{ $news->links() }}
        </div>
      @else
        <div class="text-center py-12">
          <i class="fas fa-newspaper text-gray-300 text-6xl mb-4"></i>
          <h3 class="text-xl font-semibold text-gray-600 mb-2">No news available</h3>
          <p class="text-gray-500">Be the first to add some news!</p>
        </div>
      @endif
    </section>

  </main>

  <!-- JavaScript -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.getElementById('newsForm');
      const filters = {
        organization: document.getElementById('organizationFilter'),
        type: document.getElementById('typeFilter'),
        search: document.getElementById('searchInput')
      };
      const clearBtn = document.getElementById('clearFilters');

      // Form submission
      form.addEventListener('submit', async function(e) {
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
            location.reload();
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

      // Filter functionality
      function applyFilters() {
        const params = new URLSearchParams();
        
        if (filters.organization.value) params.set('organization', filters.organization.value);
        if (filters.type.value) params.set('type', filters.type.value);
        if (filters.search.value) params.set('search', filters.search.value);

        window.location.href = '/news?' + params.toString();
      }

      filters.organization.addEventListener('change', applyFilters);
      filters.type.addEventListener('change', applyFilters);
      filters.search.addEventListener('input', debounce(applyFilters, 300));

      clearBtn.addEventListener('click', function() {
        filters.organization.value = '';
        filters.type.value = '';
        filters.search.value = '';
        window.location.href = '/news';
      });

      // Debounce function
      function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
          const later = () => {
            clearTimeout(timeout);
            func(...args);
          };
          clearTimeout(timeout);
          timeout = setTimeout(later, wait);
        };
      }

      // Apply current filter values from URL
      const urlParams = new URLSearchParams(window.location.search);
      filters.organization.value = urlParams.get('organization') || '';
      filters.type.value = urlParams.get('type') || '';
      filters.search.value = urlParams.get('search') || '';
    });
  </script>

</body>
</html>

      <div class="flex justify-between items-center mb-6">

        <h2 class="text-3xl font-bold text-red-700">Latest News</h2>

        <span class="text-gray-600">{{ $news->total() }} news items found</span>

      </div>



      @if($news->count() > 0)

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

          @foreach($news as $item)

            <div class="news-card bg-white rounded-xl shadow-md overflow-hidden relative">

              <span class="category-badge bg-red-600 text-white text-xs px-3 py-1 rounded-full">

                {{ ucfirst($item->type) }}

              </span>

              

              @if($item->featured_image)

                <img src="{{ $item->featured_image }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">

              @else

                <div class="w-full h-48 bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center">

                  <i class="fas fa-newspaper text-white text-4xl"></i>

                </div>

              @endif

              

              <div class="p-6">

                <div class="flex items-center justify-between mb-2">

                  <span class="text-sm text-gray-500">{{ $item->organization->name }}</span>

                  <span class="text-sm text-gray-500">{{ $item->published_at->diffForHumans() }}</span>

                </div>

                

                <h3 class="font-bold text-xl mb-3 text-gray-800 hover:text-red-700 transition-colors">

                  <a href="{{ route('news.show', $item->slug) }}">{{ $item->title }}</a>

                </h3>

                

                <p class="text-gray-600 mb-4 line-clamp-3">

                  {{ $item->excerpt ?? Str::limit($item->content, 120) }}

                </p>

                

                <div class="flex items-center justify-between">

                  <span class="text-sm text-gray-500">

                    <i class="fas fa-eye mr-1"></i>{{ $item->view_count }} views

                  </span>

                  <a href="{{ route('news.show', $item->slug) }}" class="text-red-600 hover:text-red-800 font-semibold text-sm">

                    Read More <i class="fas fa-arrow-right ml-1"></i>

                  </a>

                </div>

              </div>

            </div>

          @endforeach

        </div>



        <!-- Pagination -->

        <div class="mt-8">

          {{ $news->links() }}

        </div>

      @else

        <div class="text-center py-12">

          <i class="fas fa-newspaper text-gray-300 text-6xl mb-4"></i>

          <h3 class="text-xl font-semibold text-gray-600 mb-2">No news available</h3>

          <p class="text-gray-500">Be the first to add some news!</p>

        </div>

      @endif

    </section>



  </main>



  <!-- JavaScript -->

  <script>

    document.addEventListener('DOMContentLoaded', function() {

      const form = document.getElementById('newsForm');

      const filters = {

        organization: document.getElementById('organizationFilter'),

        type: document.getElementById('typeFilter'),

        search: document.getElementById('searchInput')

      };

      const clearBtn = document.getElementById('clearFilters');



      // Form submission

      form.addEventListener('submit', async function(e) {

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

            location.reload();

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



      // Filter functionality

      function applyFilters() {

        const params = new URLSearchParams();

        

        if (filters.organization.value) params.set('organization', filters.organization.value);

        if (filters.type.value) params.set('type', filters.type.value);

        if (filters.search.value) params.set('search', filters.search.value);



        window.location.href = '/news?' + params.toString();

      }



      filters.organization.addEventListener('change', applyFilters);

      filters.type.addEventListener('change', applyFilters);

      filters.search.addEventListener('input', debounce(applyFilters, 300));



      clearBtn.addEventListener('click', function() {

        filters.organization.value = '';

        filters.type.value = '';

        filters.search.value = '';

        window.location.href = '/news';

      });



      // Debounce function

      function debounce(func, wait) {

        let timeout;

        return function executedFunction(...args) {

          const later = () => {

            clearTimeout(timeout);

            func(...args);

          };

          clearTimeout(timeout);

          timeout = setTimeout(later, wait);

        };

      }



      // Apply current filter values from URL

      const urlParams = new URLSearchParams(window.location.search);

      filters.organization.value = urlParams.get('organization') || '';

      filters.type.value = urlParams.get('type') || '';

      filters.search.value = urlParams.get('search') || '';

    });

  </script>



</body>

</html>


