<?php
 /* paki change nalang dito */
$organizations = [
    "Organization A" => [
        ["type" => "Photo", "title" => "Tree Planting", "date" => "Oct 2025", "img" => "tree.jpg", "details" => "Captured moments of volunteers."],
        ["type" => "Event", "title" => "Community Clean-Up", "date" => "Sep 2025", "img" => "cleanup.jpg", "details" => "An organized barangay clean-up drive."],
        ["type" => "Achievement", "title" => "Best Outreach Award", "date" => "2025", "img" => "award.jpg", "details" => "Recognized for outreach programs."]
    ],
    "Organization B" => [
        ["type" => "Photo", "title" => "Sports Fest", "date" => "Aug 2025", "img" => "sports.jpg", "details" => "Basketball team action shots."],
        ["type" => "Event", "title" => "Inter-University Sports Fest", "date" => "Aug 2025", "img" => "interuni.jpg", "details" => "Annual sports festival event."],
        ["type" => "Achievement", "title" => "Champion - Debate", "date" => "2025", "img" => "debate.jpg", "details" => "Won 1st place in debate competition."]
    ],
    "Organization C" => [
        ["type" => "Photo", "title" => "Cultural Night", "date" => "Jul 2025", "img" => "culture.jpg", "details" => "Students showcasing talents."],
        ["type" => "Event", "title" => "Dance Competition", "date" => "Jun 2025", "img" => "dance.jpg", "details" => "Inter-org dance competition."],
        ["type" => "Achievement", "title" => "Best Cultural Event", "date" => "2025", "img" => "culture_award.jpg", "details" => "Awarded for cultural contributions."]
    ],
    "Organization D" => [
        ["type" => "Photo", "title" => "Workshop Day", "date" => "May 2025", "img" => "workshop.jpg", "details" => "Hands-on skill-building."],
        ["type" => "Event", "title" => "Tech Seminar", "date" => "May 2025", "img" => "seminar.jpg", "details" => "Guest speakers on technology."],
        ["type" => "Achievement", "title" => "Innovation Award", "date" => "2025", "img" => "innovation.jpg", "details" => "Recognized for innovation."]
    ],
    "Organization E" => [
        ["type" => "Photo", "title" => "Outreach Photos", "date" => "Apr 2025", "img" => "outreach_photos.jpg", "details" => "Snapshots from outreach."],
        ["type" => "Event", "title" => "Community Outreach", "date" => "Apr 2025", "img" => "outreach.jpg", "details" => "Helping local communities."],
        ["type" => "Achievement", "title" => "Service Excellence", "date" => "2025", "img" => "service.jpg", "details" => "Excellence in community service."]
    ]
];


$filter = $_GET['filter'] ?? 'All';
$search = strtolower($_GET['search'] ?? '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery - Our Moments, Our Stories</title>
  <style>
    body { margin:0; font-family: Arial, sans-serif; }

    
    .header {
      position: relative;
      height: 300px;
      color: white;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      overflow: hidden;
    }
    .header::before {
      content: "";
      position: absolute;
      top:0; left:0; right:0; bottom:0;
      background: url("images/header-bg.jpg") no-repeat center center/cover;  /* paki change nalang ng image */
      z-index: 1;
    }
    .header::after {
      content: "";
      position: absolute;
      top:0; left:0; right:0; bottom:0;
      background: rgba(75, 0, 0, 0.7);
      z-index: 2;
    }
    .header-content {
      position: relative;
      z-index: 3;
    }
    .header-content h1 { margin:0; font-size:36px; }
    .header-content p { margin:5px 0 0; font-size:18px; }

   
    .filter-bar {
      display:flex; justify-content:space-between; align-items:center;
      gap:15px; padding:20px;
      background:#f8f8f8; box-shadow:0 2px 4px rgba(0,0,0,0.1);
    }
    .filters a {
      text-decoration:none; padding:10px 20px; border-radius:20px;
      background:#ccc; font-weight:bold; color:black;
    }
    .filters a.active, .filters a:hover {
      background:#800000; color:white;
    }
    .search-box input {
      padding:10px 15px; border-radius:20px; border:1px solid #ccc;
      width:200px;
    }

    
    .organization { margin:30px; }
    .organization h2 { color:#4b0000; border-bottom:2px solid #ccc; padding-bottom:5px; }
    .gallery {
      display:grid;
      grid-template-columns:repeat(auto-fill, minmax(250px, 1fr));
      gap:20px;
      padding:20px 0;
    }
    .card {
      background:#f0f0f0;
      border-radius:5px;
      box-shadow:2px 2px 5px #aaa;
      overflow:hidden;
    }
    .card img { width:100%; height:180px; object-fit:cover; }
    .card-footer { background:#4b0000; color:white; padding:15px; }
    .card-footer h3 { margin:0; font-size:18px; }
    .card-footer p { margin:5px 0 0; font-size:14px; }
  </style>
</head>
<body>

  
  <div class="header">
    <div class="header-content">
      <h1>Our Moments, Our Stories</h1>
      <p>Capturing our journey through photos, events and achievements</p>
    </div>
  </div>

  <div class="filter-bar">
    <div class="filters">
      <a href="?filter=All&search=<?= urlencode($search) ?>" class="<?= $filter=='All'?'active':'' ?>">All</a>
      <a href="?filter=Photo&search=<?= urlencode($search) ?>" class="<?= $filter=='Photo'?'active':'' ?>">Photos</a>
      <a href="?filter=Event&search=<?= urlencode($search) ?>" class="<?= $filter=='Event'?'active':'' ?>">Events</a>
      <a href="?filter=Achievement&search=<?= urlencode($search) ?>" class="<?= $filter=='Achievement'?'active':'' ?>">Achievements</a>
    </div>
    <div class="search-box">
      <form method="get" action="">
        <input type="hidden" name="filter" value="<?= htmlspecialchars($filter) ?>">
        <input type="text" name="search" placeholder="search..." value="<?= htmlspecialchars($search) ?>">
      </form>
    </div>
  </div>

 
  <?php foreach ($organizations as $orgName => $items): ?>
    <div class="organization">
      <h2><?= $orgName ?></h2>
      <div class="gallery">
        <?php 
        $hasContent = false;
        foreach ($items as $item): 
            
            if ($filter != 'All' && strtolower($item['type']) != strtolower($filter)) continue;

           
            if ($search && strpos(strtolower($item['title']." ".$item['details']." ".$item['date']), $search) === false) continue;

            $hasContent = true;
        ?>
          <div class="card">
            <img src="images/<?= $item['img'] ?>" alt="<?= $item['title'] ?>">
            <div class="card-footer">
              <h3><?= $item['title'] ?></h3>
              <p><?= $item['date'] ?></p>
              <p><?= $item['details'] ?></p>
            </div>
          </div>
        <?php endforeach; ?>

        <?php if (!$hasContent): ?>
          <p style="color:gray;">No results found.</p>
        <?php endif; ?>
      </div>
    </div>
  <?php endforeach; ?>

</body>
</html>
