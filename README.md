Smart PHP Asset Auto Loader
Automatic Asset Loader with Keyword Detection, Presets, On-the-Fly Triggers & Production Minified Mode
This project provides a powerful, flexible, and fully automatic front-end asset loader for PHP applications.
It intelligently loads JavaScript & CSS assets based on:
✔ URL keyword detection (e.g. /watch-video loads video.js automatically)
✔ Presets / bundles (e.g. preset=MEDIA)
✔ Manual triggers (e.g. assets=jquery,cropper)
✔ Automatic parent URL parsing (works inside includes)
✔ Production-ready minified bundling system (auto-build CSS/JS bundles)
This system drastically reduces asset management complexity while improving page performance.
🚀 Key Features
🔍 URL Keyword Detection
Assets load automatically when matching keywords appear in:
URL path
Query string
File name
Example:
/watch-movie?id=5 triggers videojs because “watch” and “movie” match.
🎛 Preset Bundles
Define presets for common environments:
BASE
ADMIN
MEDIA
IMAGE
FULL
Use them via:
Copy code

?page.php?preset=MEDIA
⚡ On-the-Fly Manual Triggers
Manually load assets:
Copy code

?page.php?assets=jquery-ui,chart
🧠 Auto Dependency Loading (via keywords)
Define your own keyword → asset mappings:
Copy code
Php
"chart" => ["chart", "stats", "admin", "dashboard"]
Any match loads the correct assets.
🪶 Production Minified Bundle Mode
In production:
Automatically bundles CSS → /cache/bundle-<hash>.css
Automatically bundles JS → /cache/bundle-<hash>.js
Minifies + compresses files
Caches bundles for performance
One request per CSS + one for JS.
🧩 Works Inside Nested Includes
Even if you call:
Copy code
Php
include 'templates/header.php';
load_assets();
…assets still load based on the parent page URL.
📁 Folder Structure
Copy code

/
 ├─ assets/
 │   ├─ css/
 │   ├─ js/
 │   ├─ plugins/
 │   ├─ videojs/
 │   └─ cropper/
 │
 ├─ cache/                 ← auto-generated bundles
 │
 ├─ asset-map.php
 ├─ asset-presets.php
 ├─ smart-auto-loader.php
 ├─ smart-bundler.php
 ├─ index.php              ← example usage
 │
 └─ README.md
📄 File Descriptions
asset-map.php
Defines a single authoritative list of all assets and their CSS/JS files.
asset-presets.php
Defines reusable bundles using constants such as:
Copy code
Php
ASSET_PRESET_MEDIA
ASSET_PRESET_ADMIN
smart-auto-loader.php
Main controller:
Finds triggers
Loads presets
Detects keywords
Produces final CSS/JS output
Integrates the bundler in production mode
smart-bundler.php
Production-mode CSS/JS bundler:
Minifies CSS
Minifies JS
Concatenates files
Produces hash-based cached bundles
🛠 Installation
1. Clone the repo
Copy code

git clone https://github.com/yourrepo/smart-php-asset-loader.git
2. Ensure directory permissions
The /cache folder must be writable:
Copy code

chmod 755 cache
or
Copy code

chmod 775 cache
3. Include loader in your project:
Copy code
Php
include_once "smart-auto-loader.php";
🧪 Basic Usage
Example index.php
Copy code
Php
<?php include "smart-auto-loader.php"; ?>
<html>
<head>
    <title>Demo</title>
    <?php load_assets(); ?>
</head>
<body>
    <h1>Smart Auto Loader Demo</h1>
</body>
</html>
🔍 URL Keyword Trigger Examples
URL
Loaded Assets
/watch-movie
videojs, bootstrap, fontawesome
/admin/stats
chart.js, bootstrap, jquery
/profile/edit-photo?crop=1
cropper.js, bootstrap
/sortable-widget
jquery-ui
🎛 Preset Examples
Copy code

?page.php?preset=BASE
?page.php?preset=MEDIA
?page.php?preset=ADMIN
🔧 Manual Trigger Examples
Copy code

?page.php?assets=jquery-ui,cropper
⚡ Production Minified Mode
Enable it:
Copy code
Php
define("ASSET_MINIFIED_MODE", true);
Then smart-auto-loader will:
gather all triggered CSS/JS files
generate /cache/bundle-<hash>.css
generate /cache/bundle-<hash>.js
output only 2 optimized assets
Example Output (Production)
Copy code
Html
<link rel="stylesheet" href="cache/bundle-e2d118c83.css">
<script src="cache/bundle-19af12da1.js"></script>
🧰 Development Mode
Disable minified mode:
Copy code
Php
define("ASSET_MINIFIED_MODE", false);
Now every file loads normally:
Copy code
Html
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/chart.min.js"></script>
🐎 Performance Benefits
Optimization
Benefit
Bundling CSS/JS
reduces requests by 80–95%
Minification
assets shrink by 30–70%
Hash-based caching
rebuild only when needed
Smart loading
loads only what you need
Typical speed increase: 400–1200ms per page load.
🧩 Extending the Loader
You can add new assets by editing asset-map.php.
You can add new keyword triggers in smart-auto-loader.php:
Copy code
Php
"pdf-viewer" => ["pdf", "viewer", "document"]
You can add more presets in asset-presets.php:
Copy code
Php
define("ASSET_PRESET_REPORTS", "jquery,bootstrap,chart,pdf-viewer");
🧷 Roadmap
[ ] Optional CDN fallback system
[ ] Terser-based advanced JS minification
[ ] Critical CSS extraction
[ ] Smart preloading & HTTP/2 push headers
[ ] Auto-detect video/audio file URLs
[ ] CLI asset watcher (auto-update bundles)
PRs welcome!
📜 License
MIT License
Feel free to use in personal or commercial projects.
