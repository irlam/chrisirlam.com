<?php
declare(strict_types=1);
require __DIR__ . '/auth.php';
require_login();
?>
<!doctype html>
<html lang="en-GB">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#10131c">
  <title>Chris Irlam — Projects & Digital Experiences</title>
  <meta name="description" content="Explore Chris Irlam’s collection of websites and digital projects. Practical construction tools, independent businesses and everyday ideas, all in one place.">
  <meta property="og:title" content="Chris Irlam — Projects & Digital Experiences">
  <meta property="og:description" content="Real projects. Useful ideas. Explore the collection.">
  <meta property="og:type" content="website">
  <link rel="icon" type="image/svg+xml" href="assets/favicon.svg">
  <link rel="stylesheet" href="assets/style.css">
  <script src="projects.php" defer></script>
  <script src="assets/app.js" defer></script>
</head>
<body>
  <a class="skip-link" href="#projects">Skip to projects</a>
  <div class="ambient" aria-hidden="true"></div>
  <header class="header wrap">
    <a class="brand" href="#" aria-label="Chris Irlam home"><span class="brand-mark">ci<span>.</span></span><span>CHRIS IRLAM<span class="brand-sub">PROJECTS & IDEAS</span></span></a>
    <nav aria-label="Main navigation"><a class="nav-link" href="#projects">The collection</a><a class="nav-link" href="#about">Behind the projects</a><a class="nav-cta" href="#projects">Explore projects <span aria-hidden="true">↗</span></a></nav>
  </header>
  <main>
    <section class="hero wrap" aria-labelledby="hero-heading">
      <div class="hero-copy">
        <p class="eyebrow"><span class="small-star" aria-hidden="true">✳</span> AN INDEPENDENT COLLECTION BY CHRIS IRLAM</p>
        <h1 id="hero-heading">Ideas made<br>into <span class="gradient-text">real things.</span></h1>
        <p class="hero-description">Useful tools. Independent businesses. A few passion projects.<br class="desktop-break"> A whole world of websites, brought together in one place.</p>
        <a class="button" href="#projects">Find your next click <span aria-hidden="true">↗</span></a>
        <div class="hero-note"><span class="tiny-line"></span> BUILT WITH PURPOSE. MADE TO BE USED.</div>
      </div>
      <div class="hero-art" aria-hidden="true">
        <div class="orbit orbit-one"></div><div class="orbit orbit-two"></div><div class="orbit orbit-three"></div>
        <div class="planet"><span>ci<span class="planet-dot">.</span></span><small>IDEAS IN ORBIT</small></div>
        <div class="float-card float-one"><span class="float-icon">✦</span><span>Peaches Hair<small>A little salon luxury</small></span><b>↗</b></div>
        <div class="float-card float-two"><span class="float-icon">≋</span><span>Temple Springs<small>A day by the water</small></span><b>↗</b></div>
        <div class="float-card float-three"><span class="float-icon">▱</span><span>Defect Tracker<small>Built for the site</small></span><b>↗</b></div>
        <span class="orbit-spark spark-one">✧</span><span class="orbit-spark spark-two">+</span><span class="orbit-point point-one"></span><span class="orbit-point point-two"></span>
      </div>
    </section>
    <div class="strip"><div class="wrap strip-inner"><span>A LITTLE BIT OF EVERYTHING</span><span>CONSTRUCTION <b>✳</b> BUSINESS <b>✳</b> EVERYDAY TOOLS <b>✳</b> LIFE & LEISURE</span><a href="#projects" aria-label="Browse the project collection">↓</a></div></div>
    <section class="collection wrap" id="projects" aria-labelledby="collection-heading">
      <div class="section-heading"><div><p class="eyebrow">THE COLLECTION</p><h2 id="collection-heading">Pick a project.<br class="mobile-break"> See where it takes you<span class="accent">.</span></h2></div><span class="collection-count"><b id="project-count">18</b> PROJECTS TO EXPLORE</span></div>
      <div class="collection-controls" id="collection-controls" hidden>
        <div class="filters" role="group" aria-label="Filter projects by category"><button class="filter active" data-category="All" aria-pressed="true">All projects</button><button class="filter" data-category="Construction" aria-pressed="false">Construction</button><button class="filter" data-category="Business" aria-pressed="false">Business</button><button class="filter" data-category="Tools" aria-pressed="false">Tools</button><button class="filter" data-category="Lifestyle" aria-pressed="false">Lifestyle</button><button class="filter" data-category="Media" aria-pressed="false">Media</button></div>
        <label class="search"><span aria-hidden="true">⌕</span><input id="search" type="search" placeholder="Find a project…" aria-label="Search projects" autocomplete="off"></label>
      </div>
      <p class="results-info" id="results-info" aria-live="polite"></p>
      <div class="project-grid" id="project-grid"></div>
      <div class="empty-state" id="empty-state" hidden><span aria-hidden="true">⌕</span><h3>No projects found</h3><p>Try another word or explore the whole collection.</p><button class="button" id="reset-filters">Show all projects <span aria-hidden="true">↗</span></button></div>
      <noscript><p>Explore the project websites:</p><ul class="fallback-list"><li><a href="https://peaches.hair">Peaches Hair — peaches.hair</a></li><li><a href="https://fishing.defecttracker.uk">Temple Springs — fishing.defecttracker.uk</a></li><li><a href="https://mcgoff.defecttracker.uk">Defect Tracker — mcgoff.defecttracker.uk</a></li><li><a href="https://deliveries.defecttracker.uk">Site Deliveries — deliveries.defecttracker.uk</a></li><li><a href="https://safety.defecttracker.uk">Safety Tours — safety.defecttracker.uk</a></li><li><a href="https://permits.defecttracker.uk">Permits — permits.defecttracker.uk</a></li><li><a href="https://survey.defecttracker.uk">Plan Survey — survey.defecttracker.uk</a></li><li><a href="https://programme.defecttracker.uk">Programme — programme.defecttracker.uk</a></li><li><a href="https://dabs.defecttracker.uk">DABS — dabs.defecttracker.uk</a></li><li><a href="https://docs.defecttracker.uk">Site Notices — docs.defecttracker.uk</a></li><li><a href="https://handover.defecttracker.uk">Handover — handover.defecttracker.uk</a></li><li><a href="https://notes.defecttracker.uk">Notes — notes.defecttracker.uk</a></li><li><a href="https://bookmarks.chrisirlam.com">Bookmarks — bookmarks.chrisirlam.com</a></li><li><a href="https://status.defecttracker.uk">Service Status — status.defecttracker.uk</a></li><li><a href="https://kitchen.chrisirlam.com">KitchenLab — kitchen.chrisirlam.com</a></li><li><a href="https://newyear.chrisirlam.com">New Year — newyear.chrisirlam.com</a></li><li><a href="https://telegram.defecttracker.uk">Telelistings — telegram.defecttracker.uk</a></li><li><a href="https://eclectyc.energy">Eclectyc Energy — eclectyc.energy</a></li></ul></noscript>
      <p class="collection-footnote">Each project opens in a new tab. Some tools require their own sign-in.</p>
    </section>
    <section class="about wrap" id="about" aria-labelledby="about-heading"><div class="about-symbol" aria-hidden="true">✳</div><div><p class="eyebrow">BEHIND THE PROJECTS</p><h2 id="about-heading">Different ideas.<br>Same hands-on approach.</h2></div><div class="about-copy"><p>I’m Chris, based in Bolton. These projects bring together my work in construction, ideas for independent businesses and things that make everyday life a little easier.</p><p>Explore something useful. Discover something different.<br>There’s always another idea taking shape.</p><a href="#projects">Back to the collection <span aria-hidden="true">↗</span></a></div></section>
  </main>
  <footer class="footer wrap"><a class="brand" href="#"><span class="brand-mark">ci<span>.</span></span><span>CHRIS IRLAM<span class="brand-sub">A COLLECTION OF REAL IDEAS.</span></span></a><p>© <span id="year">2026</span> Chris Irlam</p><form action="logout.php" method="post"><input type="hidden" name="csrf" value="<?= htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8') ?>"><button class="logout-button" type="submit">Sign out ↗</button></form><a href="#">Back to top ↑</a></footer>
</body>
</html>
