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
    body {
      font-family: 'Nunito', sans-serif;
      scroll-behavior: smooth;
    }
  </style>
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
          <a href="#home" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Home</a>
          <a href="#clubs" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Clubs</a> 
          <a href="#events" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Events</a> 
          <a href="#news" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">News & Media</a>
          <a href="#officers" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Officers</a>
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

  <main class="pt-24 px-4 max-w-7xl mx-auto">

    <!-- ADD ANNOUNCEMENT FORM -->
    <section class="bg-white p-6 rounded-xl shadow-md mb-10">
        <h2 class="text-2xl font-bold text-red-700 mb-4">Add New Announcement</h2>
        <div class="grid md:grid-cols-3 gap-4">
            <div>
                <label class="block font-semibold mb-1">Category</label>
                <select id="category" class="w-full p-2 border rounded-lg">
                    <option value="club">Club</option>
                    <option value="members">Members</option>
                    <option value="sports">Sports</option>
                </select>
            </div>
            <div>
                <label class="block font-semibold mb-1">Title</label>
                <input type="text" id="title" placeholder="Announcement title" class="w-full p-2 border rounded-lg">
            </div>
            <div>
                <label class="block font-semibold mb-1">Details</label>
                <input type="text" id="details" placeholder="Announcement details" class="w-full p-2 border rounded-lg">
            </div>
        </div>
        <div class="text-right mt-4">
            <button onclick="addAnnouncement()" class="bg-red-700 text-white px-6 py-2 rounded-lg hover:bg-red-800">Add Announcement</button>
        </div>
    </section>

    <!-- CLUB ANNOUNCEMENTS -->
    <section id="club" class="mb-12">
        <h2 class="text-3xl font-bold text-red-700 mb-4">Club Announcements</h2>
        <div id="club-list" class="grid md:grid-cols-3 gap-6">
            <div class="bg-white p-4 shadow rounded-xl">
                <h3 class="font-bold text-xl mb-2">New Club Meeting</h3>
                <p class="text-gray-600">Join us for the monthly meeting this Friday at 2 PM in Room 101.</p>
            </div>
        </div>
    </section>

    <!-- MEMBER ANNOUNCEMENTS -->
    <section id="members" class="mb-12">
        <h2 class="text-3xl font-bold text-red-700 mb-4">Member Announcements</h2>
        <div id="members-list" class="grid md:grid-cols-3 gap-6">
            <div class="bg-white p-4 shadow rounded-xl">
                <h3 class="font-bold text-xl mb-2">Membership Renewal</h3>
                <p class="text-gray-600">Don't forget to renew your membership by the end of the semester.</p>
            </div>
        </div>
    </section>

    <!-- SPORTS ANNOUNCEMENTS -->
    <section id="sports" class="mb-12">
        <h2 class="text-3xl font-bold text-red-700 mb-4">Sports Announcements</h2>
        <div id="sports-list" class="grid md:grid-cols-3 gap-6">
            <div class="bg-white p-4 shadow rounded-xl">
                <h3 class="font-bold text-xl mb-2">Sports Fest 2025</h3>
                <p class="text-gray-600">Join us for the annual Sports Fest on March 15, 2025 at the PUP Main Grounds.</p>
            </div>
        </div>
    </section>

  </main>

  <!-- SIMPLE JS TO ADD ANNOUNCEMENTS -->
  <script>
      function addAnnouncement() {
          const category = document.getElementById('category').value;
          const title = document.getElementById('title').value;
          const details = document.getElementById('details').value;

          if (title === '' || details === '') {
              alert('Please fill in all fields!');
              return;
          }

          const container = document.getElementById(category + '-list');

          const newCard = document.createElement('div');
          newCard.className = 'bg-white p-4 shadow rounded-xl';
          newCard.innerHTML = `
              <h3 class="font-bold text-xl mb-2">${title}</h3>
              <p class="text-gray-600">${details}</p>
          `;

          container.appendChild(newCard);

          // Clear form
          document.getElementById('title').value = '';
          document.getElementById('details').value = '';
      }
  </script>

</body>
</html>
