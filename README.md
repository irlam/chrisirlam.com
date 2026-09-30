# Chris Irlam — Project Collection

A responsive website directory for chrisirlam.com. Visitors browse project websites, search the collection and filter by category. Cards link directly to the destination websites; the public site contains no repository links or GitHub integration.

## Shared cPanel hosting

1. In cPanel, open **Domains** and find the document root for `chrisirlam.com` (usually `public_html`, or a separate folder for an addon domain).
2. Back up any existing website files before replacing them.
3. Upload all website files and folders, including **.htaccess**, **private/** and **assets/** into that document root. If uploading a ZIP, extract it and move those items out of the enclosing folder into the document root.
4. Remove old **index.html** and **projects.js** files after backing them up. The new homepage is **index.php**. Show hidden files in cPanel File Manager to upload both .htaccess files.
5. Enable SSL for the domain using cPanel's SSL/TLS Status / AutoSSL and enable **Force HTTPS Redirect** in Domains when the certificate is ready.
6. Visit `https://chrisirlam.com` and refresh. Select PHP 8.1 or newer in cPanel. No terminal, Node.js, npm or database is required.

Upload the complete website directory contents into the domain root. README.md is documentation and may be omitted.

## Editing the collection

Edit `private/project-data.php` using cPanel File Manager or a text editor. Each object is one project card, with `name`, `url`, `category`, `icon`, `theme`, `description`, and `tags`. Use HTTPS URLs. Existing categories are Construction, Business, Tools, Lifestyle and Media. `featured: true` gives a card a taller artwork panel; the first three projects have custom artwork. The artwork is decorative illustration, not a screenshot or a live status indicator.

To add a new card, copy an existing object, change its fields and retain the comma between objects. The total automatically updates. If you edit the collection, also update the fallback links in the `noscript` section of index.php for visitors with JavaScript disabled.

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

Use a PHP server, for example `php -S localhost:8080`. A static server cannot run the login. The shared host serves these files through PHP without any build step.

## Password-protected access

The collection requires a server-side username/password login. The configured username is `irlam`; the password supplied for setup is stored only as a bcrypt hash in `auth-config.php`. Do not add the plaintext password to this repository. PHP sessions use HttpOnly and SameSite cookies, with Secure cookies on HTTPS. Login and logout require CSRF tokens; the session ID rotates after login. Sessions expire after eight hours of inactivity. Five failed logins cause a one-minute delay in that browser session (this is not an IP-wide rate limit).

`index.php` and `projects.php` both enforce authentication. The project data is in a PHP return value under `private/`; direct requests do not output it, and Apache access is also denied. Static CSS, icons and generic rendering JavaScript are public. The .htaccess rules route any leftover index.html through authentication and block leftover projects.js. Remove those old static files when updating, so there is no stale public version on hosts that ignore these rules.

Enable HTTPS before signing in. To change the password, replace `password_hash` in auth-config.php with a new PHP `password_hash($newPassword, PASSWORD_DEFAULT)` result. Signing into this directory does not sign you into the linked project websites, which retain their own controls.
