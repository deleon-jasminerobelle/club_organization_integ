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

    .layout {
      display: grid;
      grid: "sidebar body" 1fr / auto 0.85fr;
      gap: 8px;
    }
    .sidebar { 
      grid-area: sidebar; 
      background: #800000; 
      color: white; 
      min-height: 100vh; 
      padding: 20px;              
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

<section class="layout fixed top-16 left-0 right-0 bottom-0 px-0">

  <!-- Sidebar -->
  <div class="sidebar"></div>

  <!-- Body -->
  <div class="body">
    
    <!-- Search + Filters -->
    <div class="flex justify-end items-center space-x-6 mb-6 mt-6 mr-8">
      
      <!-- Search bar -->
      <div class="flex items-center bg-white rounded-full px-4 py-2 shadow-md w-80">
        <svg width="25" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-labelledby="search">
          <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9" stroke="maroon" 
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
        <input type="text" id="searchInput" placeholder="Search..."
          class="w-full bg-transparent outline-none text-red-800 placeholder-red-800 font-medium ml-2">
      </div>

     <!-- All Roles Dropdown -->
<div class="relative inline-block text-left">
  <button type="button" 
    class="inline-flex justify-between w-40 rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-red-800 hover:bg-gray-50 focus:outline-none"
    id="btn-role">
    All Roles
    <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M19 9l-7 7-7-7" />
    </svg>
  </button>

  <div id="menu-role" class="origin-top-right absolute mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 max-h-40 overflow-y-auto hidden z-50">
    <div class="py-1">
      <label class="flex items-center px-4 py-2 text-sm text-red-800 hover:bg-gray-100">
        <input type="checkbox" value="student" class="mr-2"> Student
      </label>
      <label class="flex items-center px-4 py-2 text-sm text-red-800 hover:bg-gray-100">
        <input type="checkbox" value="faculty" class="mr-2"> Faculty
      </label>
      <label class="flex items-center px-4 py-2 text-sm text-red-800 hover:bg-gray-100">
        <input type="checkbox" value="admin" class="mr-2"> Admin
      </label>
    </div>
  </div>
</div>


<!--  Academic Dropdown -->
<div class="relative inline-block text-left ml-4">
  <button type="button" 
    class="inline-flex justify-between w-40 rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-red-800 hover:bg-gray-50 focus:outline-none"
    id="btn-academic">
    Academic
    <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M19 9l-7 7-7-7" />
    </svg>
  </button>

  <div id="menu-academic" class="origin-top-right absolute mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 max-h-40 overflow-y-auto hidden z-50">
    <div class="py-1">
      <label class="flex items-center px-4 py-2 text-sm text-red-800 hover:bg-gray-100"><input type="checkbox" class="mr-2"> PSMEUPTSU</label>
      <label class="flex items-center px-4 py-2 text-sm text-red-800 hover:bg-gray-100"><input type="checkbox" class="mr-2"> PASOA</label>
      <label class="flex items-center px-4 py-2 text-sm text-red-800 hover:bg-gray-100"><input type="checkbox" class="mr-2"> MS</label>
      <label class="flex items-center px-4 py-2 text-sm text-red-800 hover:bg-gray-100"><input type="checkbox" class="mr-2"> PAPSU</label>
      <label class="flex items-center px-4 py-2 text-sm text-red-800 hover:bg-gray-100"><input type="checkbox" class="mr-2"> CS</label>
      <label class="flex items-center px-4 py-2 text-sm text-red-800 hover:bg-gray-100"><input type="checkbox" class="mr-2"> JPMAP</label>
      <label class="flex items-center px-4 py-2 text-sm text-red-800 hover:bg-gray-100"><input type="checkbox" class="mr-2"> JMA</label>
      <label class="flex items-center px-4 py-2 text-sm text-red-800 hover:bg-gray-100"><input type="checkbox" class="mr-2"> AECES</label>
    </div>
  </div>
</div>


<!--  Non-Academic Dropdown -->
<div class="relative inline-block text-left ml-4">
  <button type="button" 
    class="inline-flex justify-between w-44 rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-red-800 hover:bg-gray-50 focus:outline-none"
    id="btn-nonacademic">
    Non-Academic
    <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M19 9l-7 7-7-7" />
    </svg>
  </button>

  <div id="menu-nonacademic" class="origin-top-right absolute mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 max-h-40 overflow-y-auto hidden z-50">
    <div class="py-1">
      <label class="flex items-center px-4 py-2 text-sm text-red-800 hover:bg-gray-100"><input type="checkbox" class="mr-2"> BYP</label>
      <label class="flex items-center px-4 py-2 text-sm text-red-800 hover:bg-gray-100"><input type="checkbox" class="mr-2"> PUP-REC-TS</label>
      <label class="flex items-center px-4 py-2 text-sm text-red-800 hover:bg-gray-100"><input type="checkbox" class="mr-2"> IROCK</label>
      <label class="flex items-center px-4 py-2 text-sm text-red-800 hover:bg-gray-100"><input type="checkbox" class="mr-2"> ERG</label>
      <label class="flex items-center px-4 py-2 text-sm text-red-800 hover:bg-gray-100"><input type="checkbox" class="mr-2"> PUPUKAW</label>
    </div>
  </div>
</div>


<!-- Toggle Script -->
<script>
  // Toggle dropdowns
  document.querySelectorAll("button[id^='btn-']").forEach(btn => {
    btn.addEventListener("click", () => {
      const menu = btn.nextElementSibling;
      menu.classList.toggle("hidden");
    });
  });

  // Close dropdowns
  window.addEventListener("click", (e) => {
    document.querySelectorAll("div[id^='menu-']").forEach(menu => {
      if (!menu.previousElementSibling.contains(e.target) && !menu.contains(e.target)) {
        menu.classList.add("hidden");
      }
    });
  });
</script>

  </div>
</section>
