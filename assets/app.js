(() => {
  'use strict';
  const paths = {
    spark: '<path d="m12 3 2.7 6.3L21 12l-6.3 2.7L12 21l-2.7-6.3L3 12l6.3-2.7Z"/>',
    fish: '<path d="M3 12s4-6 9-6c4 0 6 3 6 3l3-3v12l-3-3s-2 3-6 3c-5 0-9-6-9-6Z"/><circle cx="9" cy="11" r=".8" fill="currentColor"/><path d="m11 6 3-3 2 4m-5 11 3 3 2-4"/>',
    layers: '<path d="m12 3 10 6-10 6L2 9Zm-9 11 9 5 9-5M3 18l9 5 9-5"/>',
    truck: '<path d="M2 4h12v13H2Zm12 5h4l4 4v4h-8M18 9v4h4"/><circle cx="6" cy="18" r="2"/><circle cx="18" cy="18" r="2"/>',
    shield: '<path d="m12 3 8 3v6c0 5-8 9-8 9s-8-4-8-9V6Z"/><path d="m8 12 3 3 5-6"/>',
    check: '<rect x="5" y="4" width="14" height="18" rx="2"/><path d="M9 4V2h6v2M8 13l3 3 5-6"/>',
    plan: '<path d="M3 3h18v18H3Zm0 7h8V3m0 7v11m0-6h10"/>',
    calendar: '<rect x="3" y="5" width="18" height="16" rx="2"/><path d="M7 2v6m10-6v6M3 11h18m-13 5h3m3 0h3"/>',
    file: '<path d="M14 2H5v20h14V7Zm0 0v5h5M8 12h8m-8 4h6"/>',
    edit: '<path d="m15 3 6 6L9 21H3v-6Zm-2 2 6 6M3 15l6 6"/>',
    bookmark: '<path d="M6 3h12v19l-6-4-6 4Z"/>',
    activity: '<path d="M2 12h5l3-9 4 18 3-9h5"/>',
    grid: '<rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>',
    play: '<rect x="2" y="4" width="20" height="15" rx="3"/><path d="m10 8 6 4-6 4Z"/>',
    bolt: '<path d="m13 2-9 12h7l-1 8 10-13h-7Z"/>',
    globe: '<circle cx="12" cy="12" r="9"/><ellipse cx="12" cy="12" rx="4" ry="9"/><path d="M3 12h18"/>'
  };
  const svg = (name, className = '') => `<svg class="${className}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">${paths[name] || paths.grid}</svg>`;
  function art(project, index) {
    if (project.name === 'Peaches Hair') return '<div class="peaches-art"><div class="peach-flower">✧</div><strong>Peaches</strong><em>HAIR</em><small>A LITTLE SALON LUXURY</small></div>';
    if (project.name === 'Temple Springs') return `<div class="water-art">${svg('fish', 'fish-icon')}<strong>Temple Springs</strong><small>YOUR NEXT DAY BY THE WATER</small><svg viewBox="0 0 400 90" fill="none" aria-hidden="true"><path d="M-10 28Q50 0 110 28T230 28T350 28T470 28M-10 47Q50 19 110 47T230 47T350 47T470 47M-10 66Q50 38 110 66T230 66T350 66T470 66M-10 85Q50 57 110 85T230 85T350 85T470 85" stroke="currentColor" stroke-width="1"/></svg></div>`;
    if (project.name === 'Defect Tracker') return '<div class="dashboard-art"><div class="dash-top">Defect Tracker <span>PROJECT OVERVIEW</span></div><div class="dash-stats"><div>24<small>TO REVIEW</small></div><div>08<small>IN PROGRESS</small></div><div>92<small>CLOSED OUT</small></div></div><div class="dash-bars"><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div></div>';
    return `<div class="large-icon">${svg(project.icon)}</div><span class="art-index">${String(index + 1).padStart(2, '0')}</span>`;
  }
  const grid = document.getElementById('project-grid');
  const categories = new Set(['Business', 'Construction', 'Lifestyle', 'Tools', 'Media']);
  const themes = new Set(['peach', 'water', 'blue', 'orange', 'mint', 'purple', 'yellow']);
  const projects = (window.PROJECTS || []).filter(p => {
    try { return new URL(p.url).protocol === 'https:' && typeof p.name === 'string' && categories.has(p.category); } catch { return false; }
  });
  projects.forEach((p, index) => {
    const card = document.createElement('a');
    card.className = `project-card ${themes.has(p.theme) ? p.theme : 'blue'}${p.featured ? ' featured' : ''}`;
    card.href = p.url;
    card.target = '_blank';
    card.rel = 'noopener noreferrer';
    card.setAttribute('aria-label', `Visit ${p.name} (opens in a new tab)`);
    card.dataset.category = p.category;
    card.dataset.search = `${p.name} ${p.description} ${p.category} ${(p.tags || []).join(' ')} ${new URL(p.url).hostname}`.toLowerCase();
    const artwork = document.createElement('div');
    artwork.className = 'card-art';
    artwork.setAttribute('aria-hidden', 'true');
    artwork.innerHTML = art(p, index);
    const label = document.createElement('span'); label.className = 'art-label'; label.textContent = 'CHRIS IRLAM / COLLECTION'; artwork.append(label);
    if (p.featured) { const badge = document.createElement('span'); badge.className = 'featured-badge'; badge.textContent = '✧ FEATURED'; artwork.append(badge); }
    const content = document.createElement('div'); content.className = 'card-content';
    const kicker = document.createElement('div'); kicker.className = 'card-kicker';
    const category = document.createElement('span'); category.className = 'category'; category.textContent = p.category;
    const arrow = document.createElement('span'); arrow.className = 'card-arrow'; arrow.textContent = '↗'; arrow.setAttribute('aria-hidden', 'true'); kicker.append(category, arrow);
    const name = document.createElement('h3'); name.textContent = p.name;
    const description = document.createElement('p'); description.textContent = p.description;
    const tags = document.createElement('div'); tags.className = 'tags';
    (p.tags || []).forEach(value => { const tag = document.createElement('span'); tag.className = 'tag'; tag.textContent = value; tags.append(tag); });
    const url = document.createElement('div'); url.className = 'card-url'; url.innerHTML = svg('globe');
    const address = document.createElement('span'); address.textContent = new URL(p.url).hostname; url.append(address);
    content.append(kicker, name, description, tags, url); card.append(artwork, content); grid.append(card);
  });
  document.getElementById('project-count').textContent = projects.length;
  document.getElementById('collection-controls').hidden = false;
  document.getElementById('year').textContent = new Date().getFullYear();
  let activeCategory = 'All';
  const search = document.getElementById('search');
  const filters = [...document.querySelectorAll('.filter')];
  const cards = [...grid.children];
  function applyFilters() {
    const query = search.value.trim().toLowerCase();
    let visible = 0;
    cards.forEach(card => {
      const matches = (activeCategory === 'All' || card.dataset.category === activeCategory) && card.dataset.search.includes(query);
      card.hidden = !matches;
      if (matches) visible++;
    });
    filters.forEach(button => { const selected = button.dataset.category === activeCategory; button.classList.toggle('active', selected); button.setAttribute('aria-pressed', String(selected)); });
    document.getElementById('empty-state').hidden = visible > 0;
    document.getElementById('results-info').textContent = query || activeCategory !== 'All' ? `${visible} ${visible === 1 ? 'project' : 'projects'} found` : '';
  }
  filters.forEach(button => button.addEventListener('click', () => { activeCategory = button.dataset.category; applyFilters(); }));
  search.addEventListener('input', applyFilters);
  document.getElementById('reset-filters').addEventListener('click', () => { search.value = ''; activeCategory = 'All'; applyFilters(); search.focus(); });
})();
