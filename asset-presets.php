<?php

// Base JS/CSS used everywhere
define("ASSET_PRESET_BASE",
    "jquery,bootstrap,fontawesome"
);

// Admin UI related
define("ASSET_PRESET_ADMIN",
    "jquery,bootstrap,fontawesome,chart"
);

// Media/video-heavy pages
define("ASSET_PRESET_MEDIA",
    "jquery,bootstrap,videojs,royal,fontawesome"
);

// Image editing pages
define("ASSET_PRESET_IMAGE",
    "jquery,bootstrap,cropper,fontawesome"
);

// Full set (all assets)
define("ASSET_PRESET_FULL",
    ASSET_PRESET_BASE . "," .
    ASSET_PRESET_ADMIN . "," .
    ASSET_PRESET_MEDIA . "," .
    ASSET_PRESET_IMAGE
);
