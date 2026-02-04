<?php

/**
 * Map of all assets and their CSS/JS files.
 */
function asset_map()
{
    return [

        "jquery" => [
            "js" => [
                "assets/js/jquery.min.js"
            ]
        ],

        "jquery-ui" => [
            "css" => [
                "assets/plugins/jquery-ui/jquery-ui.min.css"
            ],
            "js" => [
                "assets/plugins/jquery-ui/jquery-ui.min.js"
            ]
        ],

        "bootstrap" => [
            "css" => [
                "assets/css/bootstrap.min.css"
            ],
            "js" => [
                "assets/js/bootstrap.bundle.min.js"
            ]
        ],

        "bootstrap-icons" => [
            "css" => [
                "assets/css/bootstrap-icons.css"
            ]
        ],

        "fontawesome" => [
            "css" => [
                "assets/css/all.min.css"
            ]
        ],

        "videojs" => [
            "css" => [
                "assets/videojs/video-js.min.css"
            ],
            "js" => [
                "assets/videojs/video.min.js"
            ]
        ],

        "cropper" => [
            "css" => [
                "assets/plugins/cropper/cropper.min.css"
            ],
            "js" => [
                "assets/plugins/cropper/cropper.min.js"
            ]
        ],

        "chart" => [
            "js" => [
                "assets/js/chart.min.js"
            ]
        ],

        "royal" => [
            "css" => [
                "assets/plugins/royalvideoplayer/rvp.min.css"
            ],
            "js" => [
                "assets/plugins/royalvideoplayer/rvp.min.js"
            ]
        ]
    ];
}
