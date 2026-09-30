# Chris Irlam — Project Collection

A responsive website directory for chrisirlam.com. Visitors browse project websites, search the collection and filter by category. Cards link directly to the destination websites; the public site contains no repository links or GitHub integration.

## Shared cPanel hosting

1. In cPanel, open **Domains** and find the document root for `chrisirlam.com` (usually `public_html`, or a separate folder for an addon domain).
2. Back up any existing website files before replacing them.
3. Upload **index.html**, **projects.js** and the complete **assets** folder into that document root. If uploading a ZIP, extract it and move those items out of the enclosing folder into the document root.
4. If an old `index.php` exists, rename it after backing it up, so it does not take priority over `index.html`.
5. Enable SSL for the domain using cPanel's SSL/TLS Status / AutoSSL and enable **Force HTTPS Redirect** in Domains when the certificate is ready.
6. Visit `https://chrisirlam.com` and refresh. No terminal, Node.js, npm, PHP application or database is required.

Only the three items in step 3 are needed on the web server. README.md is documentation.

## Editing the collection

Edit `projects.js` using cPanel File Manager or a text editor. Each object is one project card, with `name`, `url`, `category`, `icon`, `theme`, `description`, and `tags`. Use HTTPS URLs. Existing categories are Construction, Business, Tools, Lifestyle and Media. `featured: true` gives a card a taller artwork panel; the first three projects have custom artwork. The artwork is decorative illustration, not a screenshot or a live status indicator.

To add a new card, copy an existing object, change its fields and retain the comma between objects. The total automatically updates. If you edit the collection, also update the fallback links in the `noscript` section of index.html for visitors with JavaScript disabled.

This is a curated directory rather than an automatic import of every repository. Native apps and projects without an identifiable deployed website URL are omitted. Bookmarks, KitchenLab and New Year currently show hosting holding pages; Handover shows a server placeholder. Eclectyc Energy returned a gateway error during the initial check. Their configured project addresses are included without promising availability. Destination websites retain their own sign-in controls. Site Notices points to the clean-up notice system at docs.defecttracker.uk.

## Features

- Dark editorial design with a floating orbital hero and individual project artwork
- Responsive layouts, touch-friendly controls and fully clickable website cards
- Search by name, category, description, tags or domain
- Category filtering, result counts and a clear empty-state reset
- Semantic HTML, keyboard focus, skip link, reduced-motion support and no-JavaScript fallback links
- Custom SVG favicon and descriptive page metadata
- No external fonts, image services, analytics, APIs or dependencies

## Local preview

Serve the directory with any static server, for example `python -m http.server 8080`. It also works by opening index.html directly. The shared host serves the same files without any build step.
