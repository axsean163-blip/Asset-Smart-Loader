<?php
include_once "asset-map.php";
include_once "asset-presets.php";


/**
 * Keywords that automatically trigger the loading of assets
 */
function automatic_asset_keywords()
{
    return [

        "videojs" => [
            "video", "watch", "movie", "play", "stream", "media"
        ],

        "cropper" => [
            "crop", "avatar", "edit-photo", "image-editor", "resize"
        ],

        "chart" => [
            "chart", "stats", "admin", "dashboard", "analytics", "reports"
        ],

        "jquery-ui" => [
            "sortable", "draggable", "ui", "widget", "dialog"
        ],

        "bootstrap" => [
            "layout", "grid", "responsive", "form"
        ],

        "fontawesome" => [
            "icon", "icons", "fa"
        ]
    ];
}


/**
 * Get complete URL text for scanning
 */
function get_full_request_string()
{
    return strtolower(
        ($_SERVER["REQUEST_URI"] ?? "") . " " .
        ($_SERVER["QUERY_STRING"] ?? "") . " " .
        ($_SERVER["PHP_SELF"] ?? "")
    );
}


/**
 * Parse GET parameters from parent URL
 */
function get_url_params()
{
    $query = parse_url($_SERVER["REQUEST_URI"], PHP_URL_QUERY);
    parse_str($query ?? "", $params);
    return $params;
}


/**
 * Main asset loader
 */
function load_assets()
{
    $assets = asset_map();
    $keywords = automatic_asset_keywords();
    $params = get_url_params();
    $toLoad = [];

    $urlText = get_full_request_string();


    // -------------------------------------
    // 1️⃣ KEYWORD TRIGGERS FROM URL
    // -------------------------------------
    foreach ($keywords as $assetKey => $words) {
        foreach ($words as $word) {
            if (strpos($urlText, strtolower($word)) !== false) {
                $toLoad[] = $assetKey;
                break;
            }
        }
    }


    // -------------------------------------
    // 2️⃣ PRESET TRIGGERS (e.g. &preset=MEDIA)
    // -------------------------------------
    if (!empty($params["preset"])) {
        $presetList = explode(",", strtoupper($params["preset"]));

        foreach ($presetList as $p) {
            $const = "ASSET_PRESET_" . $p;
            if (defined($const)) {
                $presetAssets = explode(",", constant($const));
                $toLoad = array_merge($toLoad, $presetAssets);
            }
        }
    }


    // -------------------------------------
    // 3️⃣ MANUAL TRIGGERS (e.g. &assets=jquery,chart)
    // -------------------------------------
    if (!empty($params["assets"])) {
        $manual = explode(",", strtolower($params["assets"]));
        $toLoad = array_merge($toLoad, $manual);
    }


    // Remove duplicates
    $toLoad = array_unique($toLoad);


    // -------------------------------------
    // 4️⃣ OUTPUT CSS + JS
    // -------------------------------------
    foreach ($toLoad as $key) {

        if (!isset($assets[$key])) continue;

        if (!empty($assets[$key]["css"])) {
            foreach ($assets[$key]["css"] as $css) {
                echo '<link rel="stylesheet" href="' . $css . '">' . PHP_EOL;
            }
        }

        if (!empty($assets[$key]["js"])) {
            foreach ($assets[$key]["js"] as $js) {
                echo '<script src="' . $js . '"></script>' . PHP_EOL;
            }
        }
    }
}
