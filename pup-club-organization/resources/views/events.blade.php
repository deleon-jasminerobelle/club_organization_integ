<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Events - PUP Clubs & Organizations</title>
  <link href="https://fonts.bunny.net/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    body { font-family: 'Nunito', sans-serif; }
  </style>
    <script>
    async function addEventItem(e) {
      e.preventDefault();

      const title = document.getElementById('event-title').value.trim();
      const date = document.getElementById('event-date').value;
      const time = document.getElementById('event-time').value;
      const description = document.getElementById('event-description').value.trim();
      const featuredImage = document.getElementById('event-featured-image').files[0];

      if (!title || !date || !time || !description) {
        alert('Please fill out all required fields.');
        return;
      }

      // Client-side file size guard (4MB)
      if (featuredImage && featuredImage.size > 4 * 1024 * 1024) {
        alert('Image is too large. Please upload a file under 4MB.');
        return;
      }

      // Create FormData for file upload
      const formData = new FormData();
      formData.append('title', title);
      formData.append('date', date);
      formData.append('time', time);
      formData.append('description', description);
      if (featuredImage) {
        formData.append('featured_image', featuredImage);
      }

      // Send to backend
      try {
        const resp = await fetch('{{ route('events.store') }}', {
          method: 'POST',
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: formData
        });
        const data = await resp.json();
        if (!resp.ok || !data.success) {
          throw new Error('Failed to save event');
        }
        // Use the server-saved image URL if available
        var savedEvent = data.event || {};
      } catch (err) {
        alert('Saving to database failed. Please ensure XAMPP MySQL is running and .env DB settings are correct.');
        console.error(err);
        return;
      }

      const container = document.getElementById('events-list');

      const card = document.createElement('div');
      card.className = 'bg-white rounded-2xl shadow-xl overflow-hidden card-hover';
      
      // Prefer the server-saved image URL so index will see the same URL
      const serverImage = (savedEvent && (savedEvent.featured_image_url || savedEvent.featured_image)) || null;
      const imageHtml = serverImage
        ? `<img src="${serverImage}" alt="${title}" class="w-full h-40 object-cover">`
        : (featuredImage
            ? `<img src="${URL.createObjectURL(featuredImage)}" alt="${title}" class="w-full h-40 object-cover">`
            : `<div class="h-40 bg-maroon flex items-center justify-center">
                 <i class="fas fa-calendar-alt text-5xl text-white"></i>
               </div>`
          );
      
      card.innerHTML = `
        ${imageHtml}
        <div class="p-6">
          <h3 class="text-xl font-bold text-maroon mb-2"></h3>
          <p class="text-gray-600 mb-2"></p>
          <p class="text-gray-700 mb-4"></p>
          <button class="w-full bg-maroon text-white py-2 rounded-lg hover:bg-red-800 transition-colors remove-btn">Remove</button>
        </div>
      `;

      card.querySelector('h3').textContent = title;
      card.querySelectorAll('p')[0].textContent = formatDateTime(date, time);
      card.querySelectorAll('p')[1].textContent = description;

      card.querySelector('.remove-btn').addEventListener('click', () => card.remove());

      container.prepend(card);

      document.getElementById('event-form').reset();
    }

    function formatDateTime(dateStr, timeStr) {
      try {
        const [year, month, day] = dateStr.split('-').map(Number);
        const [hour, minute] = timeStr.split(':').map(Number);
        const date = new Date(year, month - 1, day, hour, minute);
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        const dateFormatted = date.toLocaleDateString(undefined, options);
        const timeFormatted = date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        return `${dateFormatted} • ${timeFormatted}`;
      } catch (_) {
        return `${dateStr} • ${timeStr}`;
      }
    }

    // ===== Load existing upcoming events on page load =====
    async function fetchExistingEvents() {
      const container = document.getElementById('events-list');
      container.innerHTML = `
        <div class="text-center py-8 col-span-full">
          <i class="fas fa-spinner fa-spin text-maroon text-2xl mb-2"></i>
          <p class="text-gray-600">Loading events...</p>
        </div>
      `;
      try {
        // Use general list so recently created items show even if date is past or same-day
        const resp = await fetch('{{ route('events.list') }}');
        const data = await resp.json();
        if (!resp.ok || !data.success) throw new Error('Failed to fetch events');

        const events = data.events || [];
        if (events.length === 0) {
          container.innerHTML = `
            <div class="text-center py-8 col-span-full">
              <i class="fas fa-calendar-times text-maroon text-2xl mb-2"></i>
              <p class="text-gray-600">No upcoming events yet.</p>
            </div>
          `;
          return;
        }

        container.innerHTML = '';
        for (const ev of events) {
          const card = document.createElement('div');
          card.className = 'bg-white rounded-2xl shadow-xl overflow-hidden card-hover';

          const imageSrc = ev.featured_image_url || ev.featured_image || null;
          const evDate = new Date(ev.start_datetime);
          const dateFormatted = evDate.toLocaleDateString(undefined, { year: 'numeric', month: 'long', day: 'numeric' });
          const timeFormatted = evDate.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

          card.innerHTML = `
            ${imageSrc ? `<img src="${imageSrc}" alt="${ev.title}" class="w-full h-40 object-cover">` : `
              <div class="h-40 bg-maroon flex items-center justify-center">
                <i class="fas fa-calendar-alt text-5xl text-white"></i>
              </div>
            `}
            <div class="p-6">
              <h3 class="text-xl font-bold text-maroon mb-2">${ev.title}</h3>
              <p class="text-gray-600 mb-2">${dateFormatted} • ${timeFormatted}</p>
              <p class="text-gray-700 mb-4">${(ev.description || '').toString()}</p>
            </div>
          `;
          container.appendChild(card);
        }
      } catch (err) {
        console.error(err);
        container.innerHTML = `
          <div class="text-center py-8 col-span-full">
            <i class="fas fa-triangle-exclamation text-red-600 text-2xl mb-2"></i>
            <p class="text-gray-600">Unable to load events.</p>
          </div>
        `;
      }
    }

    window.addEventListener('DOMContentLoaded', fetchExistingEvents);
  </script>
</head>
<body class="antialiased bg-gray-100">

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
        <a href="{{ route('about') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">About</a>
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

  <main class="pt-24 px-4 max-w-7xl mx-auto">
    <!-- ADD EVENT FORM -->
    <section class="bg-white p-6 rounded-xl shadow-md mb-10">
      <h2 class="text-2xl font-bold text-red-700 mb-4">Add New Event</h2>
      <form id="event-form" onsubmit="addEventItem(event)" class="grid md:grid-cols-4 gap-4">
        <div class="md:col-span-2">
          <label for="event-title" class="block font-semibold mb-1">Event Title</label>
          <input id="event-title" type="text" placeholder="Event title" class="w-full p-2 border rounded-lg" required>
        </div>
        <div>
          <label for="event-date" class="block font-semibold mb-1">Date</label>
          <input id="event-date" type="date" class="w-full p-2 border rounded-lg" required>
        </div>
        <div>
          <label for="event-time" class="block font-semibold mb-1">Time</label>
          <input id="event-time" type="time" class="w-full p-2 border rounded-lg" required>
        </div>
        <div class="md:col-span-3">
          <label for="event-description" class="block font-semibold mb-1">Event Description</label>
          <input id="event-description" type="text" placeholder="Brief description" class="w-full p-2 border rounded-lg" required>
        </div>
        <div class="md:col-span-4">
          <label for="event-featured-image" class="block font-semibold mb-1">Featured Image (Optional)</label>
          <input id="event-featured-image" type="file" accept="image/*" class="w-full p-2 border rounded-lg">
        </div>
        <div class="md:col-span-1 flex items-end justify-end">
          <button type="submit" class="bg-red-700 text-white px-6 py-2 rounded-lg hover:bg-red-800">Add Event</button>
        </div>
      </form>
    </section>

    <!-- EVENTS LIST -->
    <section class="mb-12">
      <h2 class="text-3xl font-bold text-red-700 mb-4">Events</h2>
      <div id="events-list" class="grid md:grid-cols-3 gap-6">
        <!-- Sample existing event to illustrate layout -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden card-hover">
          <div class="h-40 bg-gold flex items-center justify-center">
            <i class="fas fa-bullhorn text-5xl text-maroon"></i>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold text-maroon mb-2">Orientation Day</h3>
            <p class="text-gray-600 mb-2">January 20, 2025 • 10:00 AM</p>
            <p class="text-gray-700 mb-4">Welcome event for new and returning students with campus tour.</p>
            <button class="w-full bg-maroon text-white py-2 rounded-lg hover:bg-red-800 transition-colors remove-btn" onclick="this.closest('.bg-white').remove()">Remove</button>
          </div>
        </div>
      </div>
    </section>
  </main>

</body>
</html>


