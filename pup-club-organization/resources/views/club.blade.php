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
      margin: 0;
      height: 100vh;
      overflow-x: hidden; 
      overflow-y: auto; 
    }
    .layout {
      display: grid;
      grid: "sidebar body" 1fr / auto 0.90fr;
      gap: 8px;
      min-height: 100vh;
    }
    .sidebar {
      grid-area: sidebar;
      background: #800000;
      color: white;
      min-height: 100vh;
      padding: 20px;
      position: sticky;
      top: 0; 
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
      
      <!-- Desktop Navigation -->
      <div class="hidden md:flex space-x-8">
        <a href="{{ route('index') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Home</a>
        <a href="{{ route('club') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Clubs</a>
        <a href="{{ route('events') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">Events</a> 
        <a href="{{ route('news.list') }}" class="text-maroon hover:text-red-800 transition-all duration-300 font-medium hover:scale-110">News & Media</a>
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

      <!-- Mobile Menu Button -->
      <div class="md:hidden">
        <button id="mobile-menu-button" class="text-maroon focus:outline-none">
          <i class="fas fa-bars text-2xl"></i>
        </button>
      </div>
    </div>
  </div>
</nav>

<section class="layout relative top-16 px-0 min-h-screen overflow-y-auto">
  <!-- Sidebar -->
  <div class="sidebar"></div>

  <!-- Body -->
  <div class="body overflow-y-auto px-6">

    <!-- Search + Filters -->
    <div class="flex justify-end items-center space-x-6 mb-6 mt-6 mr-8">
      <!-- Search bar -->
      <div class="flex items-center bg-white rounded-full px-4 py-2 shadow-md w-80">
        <svg width="25" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-labelledby="search">
          <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9" stroke="maroon" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
        <input type="text" id="searchInput" placeholder="Search..." class="w-full bg-transparent outline-none text-red-800 placeholder-red-800 font-medium ml-2">
      </div>

      <!-- Academic Dropdown -->
      <div class="relative inline-block text-left ml-4">
        <button type="button" class="inline-flex justify-between w-40 rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-red-800 hover:bg-gray-50 focus:outline-none" id="btn-academic">
          Academic
          <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
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

      <!-- Non-Academic Dropdown -->
      <div class="relative inline-block text-left ml-4">
        <button type="button" class="inline-flex justify-between w-44 rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-red-800 hover:bg-gray-50 focus:outline-none" id="btn-nonacademic">
          Non-Academic
          <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
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
    </div>

  <div class="flex justify-end mt-3">
  <button id="clearFilters" 
    class="px-5 py-2 text-white font-medium rounded-xl shadow-md hover:bg-black/90 transition"
    style="background-color: maroon;">
    Clear Filters
  </button>
</div>

     <!-- Clubs Section -->
      <div id="clubs" class="px-8">
      <h2 class="text-2xl font-bold text-maroon mb-6">Featured Clubs</h2>

      <!-- Clubs Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

      <!-- PSME -->
          <div class="bg-white rounded-2xl shadow-xl p-6 card-hover fade-in club-card flex flex-col justify-between""
          data-tags="psmeuptsu academic mechanical engineering">
          <h3 class="text-lg font-bold text-maroon mb-1 text-center">PSMEUPTSU</h3>
          <h4 class="text-sm font-semibold text-gray-600 mb-3 text-center">(Philippine Society of Mechanical Engineers)</h4>
          <div class="w-40 h-40 bg-maroon rounded-full flex items-center justify-center mb-4 mx-auto overflow-hidden">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRe75bDDhN7UeN412pZKGywO993b8dgspG2dbCE20APuUPz7xAo" alt="PSME Logo" class="w-full h-full object-cover">
          </div>
          <p class="text-sm text-gray-700 text-center">Promotes excellence in mechanical engineering through activities and technical programs.</p>
  
      <!-- View More Button -->
  <div class="mt-4 text-center">
    <button 
      class="px-4 py-2 bg-red-800 text-white rounded-xl shadow hover:bg-black/90 transition view-more-btn"
      data-club="psme">
      View More
    </button>
  </div>
</div>

        <!-- PASOA -->
        <div class="bg-white rounded-2xl shadow-xl p-6 card-hover fade-in club-card flex flex-col justify-between"
             data-tags="pasoa academic office administration">
          <h3 class="text-lg font-bold text-maroon mb-1 text-center">PASOA</h3>
          <h4 class="text-sm font-semibold text-gray-600 mb-3 text-center">(Philippine Association of Students in Office Administration)</h4>
          <div class="w-40 h-40 bg-maroon rounded-full flex items-center justify-center mb-4 mx-auto overflow-hidden">
            <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQzXiMr9r6xWdBXJOwV6cgvlwM7eSmQWPPj7kheR-nf4iUXFzPC" alt="PASOA Logo" class="w-full h-full object-cover">
          </div>
          <p class="text-sm text-gray-700 text-center">Supports students pursuing office administration with training and seminars.</p>

      <!-- View More Button -->
  <div class="mt-4 text-center">
    <button 
      class="px-4 py-2 bg-red-800 text-white rounded-xl shadow hover:bg-black/90 transition view-more-btn"
      data-club="pasoa">
      View More
    </button>
    </div>
  </div>

        <!-- MS -->
        <div class="bg-white rounded-2xl shadow-xl p-6 card-hover fade-in club-card flex flex-col justify-between "
             data-tags="ms academic mentor society">
          <h3 class="text-lg font-bold text-maroon mb-1 text-center">MS</h3>
          <h4 class="text-sm font-semibold text-gray-600 mb-3 text-center">(Mentor Society)</h4>
          <div class="w-40 h-40 bg-maroon rounded-full flex items-center justify-center mb-4 mx-auto overflow-hidden">
            <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcT0k4B1CwrreOvEnrJ2Zirf9xkQCvcrtmWoy-r6Q-LanBk_FRK_" alt="MS Logo" class="w-full h-full object-cover">
          </div>
          <p class="text-sm text-gray-700 text-center">Provides peer mentoring, guidance, and academic support for students.</p>

      <!-- View More Button -->
  <div class="mt-4 text-center">
    <button 
      class="px-4 py-2 bg-red-800 text-white rounded-xl shadow hover:bg-black/90 transition view-more-btn"
      data-club="ms">
      View More
    </button>
    </div>
  </div>

        <!-- CS -->
        <div class="bg-white rounded-2xl shadow-xl p-6 card-hover fade-in club-card flex flex-col justify-between"
             data-tags="cs academic computer society it programming">
          <h3 class="text-lg font-bold text-maroon mb-1 text-center">CS</h3>
          <h4 class="text-sm font-semibold text-gray-600 mb-3 text-center">(Computer Society)</h4>
          <div class="w-40 h-40 bg-maroon rounded-full flex items-center justify-center mb-4 mx-auto overflow-hidden">
            <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSsEGoMwBxiG5QK4J0FBsA6cClQVTwh-0ov9nyMchy0wkwuy4PZ" alt="CS Logo" class="w-full h-full object-cover">
          </div>
          <p class="text-sm text-gray-700 text-center">Focused on programming, software development, and IT-related events.</p>

        <!-- View More Button -->
  <div class="mt-4 text-center">
    <button 
      class="px-4 py-2 bg-red-800 text-white rounded-xl shadow hover:bg-black/90 transition view-more-btn"
      data-club="cs">
      View More
    </button>
    </div>
  </div>

        <!-- AECES -->
        <div class="bg-white rounded-2xl shadow-xl p-6 card-hover fade-in club-card flex flex-col justify-between"
             data-tags="aeces academic electronics engineering">
          <h3 class="text-lg font-bold text-maroon mb-1 text-center">AECES</h3>
          <h4 class="text-sm font-semibold text-gray-600 mb-3 text-center">(Association of Electronics Engineering Students)</h4>
          <div class="w-40 h-40 bg-maroon rounded-full flex items-center justify-center mb-4 mx-auto overflow-hidden">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_5L1LGWGxrchb_KbC81-J0ZqZAsGuM7ezt0MUXIhDogRg7MjY" alt="AECES Logo" class="w-full h-full object-cover">
          </div>
          <p class="text-sm text-gray-700 text-center">Empowers future electronics engineers through hands-on projects and training.</p>
       
          <!-- View More Button -->
  <div class="mt-4 text-center">
    <button 
      class="px-4 py-2 bg-red-800 text-white rounded-xl shadow hover:bg-black/90 transition view-more-btn"
      data-club="aeces">
      View More
    </button>
    </div>
  </div>

        <!-- JPMAP -->
        <div class="bg-white rounded-2xl shadow-xl p-6 card-hover fade-in club-card flex flex-col justify-between"
             data-tags="jpmap academic human resource management">
          <h3 class="text-lg font-bold text-maroon mb-1 text-center">JPMAP</h3>
          <h4 class="text-sm font-semibold text-gray-600 mb-3 text-center">(Junior People Management Association of the Philippines)</h4>
          <div class="w-40 h-40 bg-maroon rounded-full flex items-center justify-center mb-4 mx-auto overflow-hidden">
            <img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSWO_4h-2R3n7HMotjpje_ZXI36jVxfSodBCJDTuzY96jeYj_U6" alt="JPMAP Logo" class="w-full h-full object-cover">
          </div>
          <p class="text-sm text-gray-700 text-center">Focuses on human resource management, leadership, and people development.</p>

     <!-- View More Button -->
  <div class="mt-4 text-center">
    <button 
      class="px-4 py-2 bg-red-800 text-white rounded-xl shadow hover:bg-black/90 transition view-more-btn"
      data-club="jpmap">
      View More
    </button>
    </div>
  </div>

        <!-- JMA -->
        <div class="bg-white rounded-2xl shadow-xl p-6 card-hover fade-in club-card flex flex-col justify-between"
             data-tags="jma academic marketing">
          <h3 class="text-lg font-bold text-maroon mb-1 text-center">JMA</h3>
          <h4 class="text-sm font-semibold text-gray-600 mb-3 text-center">(Junior Marketing Association)</h4>
          <div class="w-40 h-40 bg-maroon rounded-full flex items-center justify-center mb-4 mx-auto overflow-hidden">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2-UGiYoct5voCVvFnGZvr1-uVvEyk7Hnvhc72Yj44Nq-njvz0" alt="JMA Logo" class="w-full h-full object-cover">
          </div>
          <p class="text-sm text-gray-700 text-center">Provides opportunities for marketing students to practice campaigns and strategies.</p>
        
          <!-- View More Button -->
  <div class="mt-4 text-center">
    <button 
      class="px-4 py-2 bg-red-800 text-white rounded-xl shadow hover:bg-black/90 transition view-more-btn"
      data-club="jma">
      View More
    </button>
    </div>
  </div>

        <!-- PAPSU -->
        <div class="bg-white rounded-2xl shadow-xl p-6 card-hover fade-in club-card flex flex-col justify-between"
             data-tags="papsu academic psychology mental health">
          <h3 class="text-lg font-bold text-maroon mb-1 text-center">PAPSU</h3>
          <h4 class="text-sm font-semibold text-gray-600 mb-3 text-center">(Psychological Association of the Philippines Student Unit)</h4>
          <div class="w-40 h-40 bg-maroon rounded-full flex items-center justify-center mb-4 mx-auto overflow-hidden">
            <img src="https://scontent.fmnl17-2.fna.fbcdn.net/v/t39.30808-6/512479571_122109329756907215_1313742198663750200_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeEgI2Ymn5sOIXgF4R42s54wzzj49eHQSV3POPj14dBJXb-H9QHqc3XsG8AMGdWjYw4tqNSKDeEx4GUDHm914ujl&_nc_ohc=E6nDTMlXRpsQ7kNvwHWMDWB&_nc_oc=AdlzCKV6kIGyLiF12dSASF-7CvQx37BfE2lgfX0oJM62kaKsN5kfj5PG20ITl97XvZU&_nc_zt=23&_nc_ht=scontent.fmnl17-2.fna&_nc_gid=y7ugo4Op-_iCS5MCOuKXfA&oh=00_AfXZ9O24HZjg8TxPhDyOM2dzOwQe9j2OxBacmTHIEvCxZA&oe=68B36879" 
            alt="PAPSU Logo" class="w-full h-full object-cover">
          </div>
          <p class="text-sm text-gray-700 text-center">Dedicated to psychology students, PAPSU promotes mental health awareness, research, and professional development through seminars, workshops, and outreach programs.</p>
     
          <!-- View More Button -->
  <div class="mt-4 text-center">
    <button 
      class="px-4 py-2 bg-red-800 text-white rounded-xl shadow hover:bg-black/90 transition view-more-btn"
      data-club="papsu">
      View More
    </button>
    </div>
  </div>


      </div>
    </div>
  </div>
</section>

<!-- Modal -->
<div id="clubModal" 
     class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-50 z-50">
  <div class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-3xl relative">
    
    <!-- Close button -->
    <button id="closeModal" 
      class="absolute top-3 right-3 text-gray-600 hover:text-black text-lg">✖</button>
    
    <!-- Modal Content -->
    <div class="flex flex-col md:flex-row gap-6">
      
      <!-- Club Logo -->
      <div class="flex-shrink-0">
        <div class="w-40 h-40 bg-maroon rounded-full flex items-center justify-center mb-4 mx-auto overflow-hidden">
          <img id="modalLogo" src="" alt="Club Logo" class="w-full h-full object-cover">
        </div>
      </div>

      <!-- Club Details -->
      <div class="flex-1">
        <h3 id="modalTitle" class="text-2xl font-bold text-maroon mb-2">Club Name</h3>
        <p id="modalDesc" class="text-base text-gray-700 mb-4">Club description goes here...</p>
        
        <div class="grid grid-cols-2 gap-x-6 gap-y-2 text-sm">
          <p><strong>Members:</strong> <span id="modalMembers">N/A</span></p>
          <p><strong>Founded:</strong> <span id="modalFounded">N/A</span></p>
          <p><strong>President:</strong> <span id="modalPresident">N/A</span></p>
          <p><strong>Achievements:</strong> <span id="modalAchievements">N/A</span></p>
          <p class="col-span-2"><strong>Activities:</strong> <span id="modalActivities">N/A</span></p>
          <p class="col-span-2"><strong>Contact:</strong> <span id="modalContact">N/A</span></p>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
(function () {
  // --- Dropdown toggle ---
  document.querySelectorAll("button[id^='btn-']").forEach(btn => {
    btn.addEventListener("click", () => {
      const menu = btn.nextElementSibling;
      menu.classList.toggle("hidden");
    });
  });

  // Close dropdowns when clicking outside
  window.addEventListener("click", (e) => {
    document.querySelectorAll("div[id^='menu-']").forEach(menu => {
      if (!menu.previousElementSibling.contains(e.target) && !menu.contains(e.target)) {
        menu.classList.add("hidden");
      }
    });
  });

  // --- Search + Filter logic ---
  const searchInput = document.getElementById("searchInput");
  const checkboxes = document.querySelectorAll("input[type='checkbox']");
  const cards = document.querySelectorAll(".club-card");
  const clearBtn = document.getElementById("clearFilters");

  // Helper: lowercase + trim
  function normalize(s) {
    return (s || "").toLowerCase().trim();
  }

  function applyFilters() {
    const searchText = normalize(searchInput.value);
    const activeFilters = Array.from(checkboxes)
      .filter(cb => cb.checked)
      .map(cb => normalize(cb.parentElement.textContent));

    let anyShown = false;

    cards.forEach(card => {
      const tags = normalize(card.dataset.tags);

      const matchesSearch = !searchText || tags.includes(searchText);
      // OR logic: show if matches ANY selected filter
      const matchesFilter = activeFilters.length === 0 ||
                            activeFilters.some(f => tags.includes(f));

      const show = matchesSearch && matchesFilter;
      card.style.display = show ? "" : "none";
      if (show) anyShown = true;
    });

    // Show or hide "no results" message
    let empty = document.getElementById("noResults");
    if (!empty) {
      empty = document.createElement("div");
      empty.id = "noResults";
      empty.className = "col-span-full text-center text-gray-500 py-8";
      empty.textContent = "No clubs match your search or filters.";
      const cardGrid = document.querySelector("#clubs .grid");
      cardGrid.appendChild(empty);
    }
    empty.style.display = anyShown ? "none" : "";
  }

  // --- Event listeners ---
  searchInput.addEventListener("input", applyFilters);
  checkboxes.forEach(cb => cb.addEventListener("change", applyFilters));
  if (clearBtn) {
    clearBtn.addEventListener("click", () => {
      searchInput.value = "";
      checkboxes.forEach(cb => cb.checked = false);
      applyFilters();
    });
  }

  // ---------- Clear Filters ----------
  if (clearBtn) {
    clearBtn.addEventListener("click", () => {
      searchInput.value = "";
      checkboxes.forEach(cb => cb.checked = false);
      applyFilters();
    });
  }

const modal = document.getElementById("clubModal");
  const closeModal = document.getElementById("closeModal");

  // Club data
const clubData = {
  psme: {
    title: "PSMEUPTSU",
    desc: "Promotes excellence in mechanical engineering through activities and technical programs.",
    members: "150+",
    founded: "2010",
    president: "Engr. Juan Dela Cruz",
    achievements: "Champion - National Mech Engg Quiz Bee 2023",
    activities: "Conferences, Technical Trainings, Competitions",
    contact: "psmeup@univ.edu",
    logo: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRe75bDDhN7UeN412pZKGywO993b8dgspG2dbCE20APuUPz7xAo"
  },
  pasoa: {
    title: "PASOA",
    desc: "Supports students pursuing office administration with training and seminars.",
    members: "120+",
    founded: "2012",
    president: "Maria Santos",
    achievements: "Best Student Organization 2022",
    activities: "Workshops, Seminars, Industry Visits",
    contact: "pasoa@univ.edu",
    logo: "https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQzXiMr9r6xWdBXJOwV6cgvlwM7eSmQWPPj7kheR-nf4iUXFzPC"
  },
  ms: {
    title: "Mentor Society",
    desc: "Provides peer mentoring, guidance, and academic support for students.",
    members: "200+",
    founded: "2015",
    president: "John Reyes",
    achievements: "Outstanding Student Support Award 2023",
    activities: "Peer Tutoring, Study Sessions, Leadership Workshops, Counseling, Outreach",
    contact: "mentorsoc@univ.edu",
    logo: "https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcT0k4B1CwrreOvEnrJ2Zirf9xkQCvcrtmWoy-r6Q-LanBk_FRK_"
  },
  cs: {
    title: "Computer Society",
    desc: "Focused on programming, software development, and IT-related events.",
    members: "180+",
    founded: "2013",
    president: "Ana Villanueva",
    achievements: "Champion - National Hackathon 2022",
    activities: "Coding Bootcamps, IT Seminars, Hackathons",
    contact: "csoc@univ.edu",
    logo: "https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSsEGoMwBxiG5QK4J0FBsA6cClQVTwh-0ov9nyMchy0wkwuy4PZ"
  },
  aeces: {
    title: "AECES",
    desc: "Empowers future electronics engineers through hands-on projects and training.",
    members: "140+",
    founded: "2011",
    president: "Engr. Carlo Mendoza",
    achievements: "Winners - National ECE Design Project 2023",
    activities: "Electronics Projects, Training, Competitions, Outreach",
    contact: "aeces@univ.edu",
    logo: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_5L1LGWGxrchb_KbC81-J0ZqZAsGuM7ezt0MUXIhDogRg7MjY"
  },
  jpmap: {
    title: "JPMAP",
    desc: "Focuses on human resource management, leadership, and people development.",
    members: "160+",
    founded: "2014",
    president: "Liza Gomez",
    achievements: "Best Student HR Organization 2022",
    activities: "Leadership Training, HR Seminars, Outreach, Competitions",
    contact: "jpmap@univ.edu",
    logo: "https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSWO_4h-2R3n7HMotjpje_ZXI36jVxfSodBCJDTuzY96jeYj_U6"
  },
  jma: {
    title: "JMA",
    desc: "Provides opportunities for marketing students to practice campaigns and strategies.",
    members: "170+",
    founded: "2011",
    president: "Mark Antonio",
    achievements: "Champion - National Marketing Plan Competition 2022",
    activities: "Marketing Campaigns, Seminars, Case Study Competitions",
    contact: "jma@univ.edu",
    logo: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2-UGiYoct5voCVvFnGZvr1-uVvEyk7Hnvhc72Yj44Nq-njvz0"
  },
  papsu: {
    title: "PAPSU",
    desc: "Dedicated to psychology students, promoting mental health awareness, research, and professional development.",
    members: "130+",
    founded: "2016",
    president: "Dr. Paula Enriquez",
    achievements: "Recognized for Mental Health Awareness Campaign 2023",
    activities: "Seminars, Workshops, Research, Outreach",
    contact: "papsu@univ.edu",
    logo: "https://scontent.fmnl17-2.fna.fbcdn.net/v/t39.30808-6/512479571_122109329756907215_1313742198663750200_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeEgI2Ymn5sOIXgF4R42s54wzzj49eHQSV3POPj14dBJXb-H9QHqc3XsG8AMGdWjYw4tqNSKDeEx4GUDHm914ujl&_nc_ohc=E6nDTMlXRpsQ7kNvwHWMDWB&_nc_oc=AdlzCKV6kIGyLiF12dSASF-7CvQx37BfE2lgfX0oJM62kaKsN5kfj5PG20ITl97XvZU&_nc_zt=23&_nc_ht=scontent.fmnl17-2.fna&_nc_gid=y7ugo4Op-_iCS5MCOuKXfA&oh=00_AfXZ9O24HZjg8TxPhDyOM2dzOwQe9j2OxBacmTHIEvCxZA&oe=68B36879"
  }

    // Add more clubs here...
  };

  // Open modal
 document.querySelectorAll(".view-more-btn").forEach(btn => {
  btn.addEventListener("click", () => {

    const clubKey = btn.getAttribute("data-club");
    const data = clubData[clubKey];

    if (data) {
      document.getElementById("modalTitle").textContent = data.title;
      document.getElementById("modalDesc").textContent = data.desc;
      document.getElementById("modalMembers").textContent = data.members;
      document.getElementById("modalFounded").textContent = data.founded;
      document.getElementById("modalPresident").textContent = data.president;
      document.getElementById("modalAchievements").textContent = data.achievements;
      document.getElementById("modalActivities").textContent = data.activities;
      document.getElementById("modalContact").textContent = data.contact;
      document.getElementById("modalLogo").src = data.logo;
    }

    modal.classList.remove("hidden");
    modal.classList.add("flex");
  });
});

closeModal.addEventListener("click", () => {
  modal.classList.add("hidden");
  modal.classList.remove("flex");
});

modal.addEventListener("click", (e) => {
  if (e.target === modal) {
    modal.classList.add("hidden");
    modal.classList.remove("flex");
  }
});

  applyFilters();
})();
</script>

</body>
</html>

