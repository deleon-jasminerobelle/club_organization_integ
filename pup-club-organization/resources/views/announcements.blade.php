<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Announcements & Events - PUP Clubs & Organizations</title>
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
    .event-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .event-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    .category-badge {
      position: absolute;
      top: 12px;
      right: 12px;
    }
    .tab-button {
      transition: all 0.3s ease;
    }
    .tab-button.active {
      background-color: #8B0000;
      color: white;
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

  <main class="pt-24 px-4 max-w-7xl mx-auto">

    <!-- Page Header -->
    <div class="text-center mb-12">
      <h1 class="text-4xl font-bold text-red-700 mb-4">Announcements & Events</h1>
      <p class="text-gray-600 text-lg">Stay updated with the latest announcements and upcoming events from PUP Clubs & Organizations</p>
    </div>

    <!-- Tabs for switching between Announcements and Events -->
    <div class="bg-white p-6 rounded-xl shadow-md mb-10">
      <div class="flex space-x-4 mb-6">
        <button id="tab-announcements" class="tab-button active px-6 py-3 rounded-lg bg-gray-200 text-gray-700 font-semibold">
          Announcements
        </button>
        <button id="tab-events" class="tab-button px-6 py-3 rounded-lg bg-gray-200 text-gray-700 font-semibold">
          Upcoming Events
        </button>
      </div>

      <!-- Announcements Content -->
      <div id="content-announcements">
        <!-- Filters and Search -->
        <div class="grid md:grid-cols-3 gap-4 mb-6">
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
            <label class="block font-semibold mb-1">Search</label>
            <input type="text" id="searchInput" placeholder="Search announcements..." class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-red-500">
          </div>
          <div class="flex items-end">
            <button id="clearFilters" class="w-full bg-gray-500 text-white px-4 py-3 rounded-lg hover:bg-gray-600 transition-colors">
              Clear Filters
            </button>
          </div>
        </div>

        <!-- ANNOUNCEMENTS LIST -->
        <div class="mb-12">
          <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-red-700">Latest Announcements</h2>
            <span class="text-gray-600">{{ $announcements->total() }} announcements found</span>
          </div>

          @if($announcements->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
              @foreach($announcements as $item)
                <div class="news-card bg-white rounded-xl shadow-md overflow-hidden relative">
                  <span class="category-badge bg-red-600 text-white text-xs px-3 py-1 rounded-full">
                    {{ ucfirst($item->type) }}
                  </span>
                  
                  @if($item->featured_image)
                    <img src="{{ $item->featured_image }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
                  @else
                    <div class="w-full h-48 bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center">
                      <i class="fas fa-bullhorn text-white text-4xl"></i>
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
              {{ $announcements->links() }}
            </div>
          @else
            <div class="text-center py-12">
              <i class="fas fa-bullhorn text-gray-300 text-6xl mb-4"></i>
              <h3 class="text-xl font-semibold text-gray-600 mb-2">No announcements available</h3>
              <p class="text-gray-500">Check back later for new announcements!</p>
            </div>
          @endif
        </div>
      </div>

      <!-- Events Content -->
      <div id="content-events" class="hidden">
        <div class="mb-12">
          <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-red-700">Upcoming Events</h2>
            <button onclick="fetchEvents()" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors text-sm">
              Refresh Events
            </button>
          </div>
          
          <div id="events-list" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="text-center py-12">
              <i class="fas fa-spinner fa-spin text-maroon text-2xl mb-2"></i>
              <p class="text-gray-600">Loading events...</p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>

  <!-- JavaScript -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Tab functionality
      const tabButtons = {
        announcements: document.getElementById('tab-announcements'),
        events: document.getElementById('tab-events')
      };
      
      const contentSections = {
        announcements: document.getElementById('content-announcements'),
        events: document.getElementById('content-events')
      };

      function switchTab(tabName) {
        // Update buttons
        Object.values(tabButtons).forEach(btn => btn.classList.remove('active'));
        tabButtons[tabName].classList.add('active');
        
        // Update content
        Object.values(contentSections).forEach(section => section.classList.add('hidden'));
        contentSections[tabName].classList.remove('hidden');
        
        // Load events if switching to events tab
        if (tabName === 'events') {
          fetchEvents();
        }
      }

      tabButtons.announcements.addEventListener('click', () => switchTab('announcements'));
      tabButtons.events.addEventListener('click', () => switchTab('events'));

      // Filter functionality for announcements
      const filters = {
        organization: document.getElementById('organizationFilter'),
        search: document.getElementById('searchInput')
      };
      const clearBtn = document.getElementById('clearFilters');

      function applyFilters() {
        const params = new URLSearchParams();
        
        if (filters.organization.value) params.set('organization', filters.organization.value);
        if (filters.search.value) params.set('search', filters.search.value);
        params.set('type', 'announcement');

        window.location.href = '/announcements?' + params.toString();
      }

      filters.organization.addEventListener('change', applyFilters);
      filters.search.addEventListener('input', debounce(applyFilters, 300));

      clearBtn.addEventListener('click', function() {
        filters.organization.value = '';
        filters.search.value = '';
        window.location.href = '/announcements?type=announcement';
      });

      // Apply current filter values from URL
      const urlParams = new URLSearchParams(window.location.search);
      filters.organization.value = urlParams.get('organization') || '';
      filters.search.value = urlParams.get('search') || '';

      // Load events initially if on events tab
      if (window.location.hash === '#events') {
        switchTab('events');
      }
    });

    // Events fetching functionality
    async function fetchEvents() {
      const container = document.getElementById('events-list');
      container.innerHTML = `
        <div class="text-center py-8 col-span-full">
          <i class="fas fa-spinner fa-spin text-maroon text-2xl mb-2"></i>
          <p class="text-gray-600">Loading events...</p>
        </div>
      `;
      
      try {
        const response = await fetch('{{ route('events.upcoming') }}');
        if (!response.ok) {
          throw new Error(`HTTP ${response.status}: ${response.statusText}`);
        }
        
        const data = await response.json();
        
        if (!data.success) {
          throw new Error(data.message || 'API returned success: false');
        }

        const events = data.events || [];
        if (events.length === 0) {
          container.innerHTML = `
            <div class="text-center py-8 col-span-full">
              <i class="fas fa-calendar-times text-maroon text-2xl mb-2"></i>
              <p class="text-gray-600">No upcoming events available.</p>
              <p class="text-gray-500 text-sm mt-2">Check back later for new events!</p>
            </div>
          `;
          return;
        }

        container.innerHTML = '';
        events.forEach(event => {
          const eventDate = new Date(event.start_datetime);
          const dateFormatted = eventDate.toLocaleDateString(undefined, { 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
          });
          const timeFormatted = eventDate.toLocaleTimeString([], { 
            hour: '2-digit', 
            minute: '2-digit' 
          });
          
          const imageSrc = event.featured_image_url || event.featured_image || null;
          
          const card = document.createElement('div');
          card.className = 'event-card bg-white rounded-xl shadow-md overflow-hidden';
          card.innerHTML = `
            ${imageSrc ? `
              <img src="${imageSrc}" alt="${event.title}" class="w-full h-48 object-cover">
            ` : `
              <div class="w-full h-48 bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center">
                <i class="fas fa-calendar-alt text-white text-4xl"></i>
              </div>
            `}
            <div class="p-6">
              <h3 class="font-bold text-xl mb-3 text-gray-800">${event.title}</h3>
              <p class="text-gray-600 mb-2">
                <i class="fas fa-clock mr-2"></i>${dateFormatted} • ${timeFormatted}
              </p>
              <p class="text-gray-700 mb-4 line-clamp-3">${event.description || 'No description available'}</p>
              <button onclick="showEventDetails('${event.title}', '${event.start_datetime}', '${(event.description || '').replace(/'/g, "\\'")}', '${imageSrc || ''}')" 
                class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors">
                View Details
              </button>
            </div>
          `;
          container.appendChild(card);
        });
      } catch (error) {
        console.error('Error fetching events:', error);
        container.innerHTML = `
          <div class="text-center py-8 col-span-full">
            <i class="fas fa-triangle-exclamation text-red-600 text-2xl mb-2"></i>
            <p class="text-gray-600">Unable to load events.</p>
            <p class="text-gray-500 text-sm mt-2">Error: ${error.message}</p>
            <button onclick="fetchEvents()" class="mt-4 bg-maroon text-white px-4 py-2 rounded-lg hover:bg-red-800 transition-colors">
              Try Again
            </button>
          </div>
        `;
      }
    }

    // Event Details Modal Functions
    function showEventDetails(title, startDatetime, description, imageSrc) {
      const modal = document.createElement('div');
      modal.className = 'fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4';
      modal.innerHTML = `
        <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
          <div class="p-6">
            <div class="flex justify-between items-start mb-4">
              <h2 class="text-2xl font-bold text-maroon">${title}</h2>
              <button onclick="this.closest('.fixed').remove()" class="text-gray-500 hover:text-gray-700 text-2xl font-bold">
                &times;
              </button>
            </div>
            
            ${imageSrc ? `
              <img src="${imageSrc}" alt="${title}" class="w-full h-64 object-cover rounded-lg mb-4">
            ` : `
              <div class="w-full h-64 bg-maroon flex items-center justify-center rounded-lg mb-4">
                <i class="fas fa-calendar-alt text-6xl text-white"></i>
              </div>
            `}
            
            <div class="space-y-4">
              <div>
                <h3 class="font-semibold text-gray-700 mb-1">Date & Time:</h3>
                <p class="text-gray-900">${formatEventDateTime(startDatetime)}</p>
              </div>
              
              <div>
                <h3 class="font-semibold text-gray-700 mb-1">Description:</h3>
                <p class="text-gray-900">${description}</p>
              </div>
            </div>
            
            <div class="mt-6 text-center">
              <button onclick="this.closest('.fixed').remove()" class="bg-maroon text-white px-6 py-2 rounded-lg hover:bg-red-800 transition-colors">
                Close
              </button>
            </div>
          </div>
        </div>
      `;
      document.body.appendChild(modal);
      document.body.style.overflow = 'hidden';
    }

    function formatEventDateTime(datetime) {
      try {
        const date = new Date(datetime);
        const formattedDate = date.toLocaleDateString(undefined, {
          weekday: 'long',
          year: 'numeric',
          month: 'long',
          day: 'numeric'
        });
        const formattedTime = date.toLocaleTimeString([], {
          hour: '2-digit',
          minute: '2-digit'
        });
        return `${formattedDate} at ${formattedTime}`;
      } catch (error) {
        return datetime;
      }
    }

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
  </script>

</body>
</html>
