<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Position
    |--------------------------------------------------------------------------
    |
    | This option controls the default position where notifications will appear.
    | Available positions: top-left, top-center, top-right, bottom-left,
    | bottom-center, bottom-right
    |
    */
    'position' => 'top-center',

    /*
    |--------------------------------------------------------------------------
    | Auto Close
    |--------------------------------------------------------------------------
    |
    | This option controls whether notifications should automatically close
    | after a certain time. Set to false to disable auto-close, or specify
    | the time in milliseconds.
    |
    */
    'auto_close' => 3000,

    /*
    |--------------------------------------------------------------------------
    | Progress Bar
    |--------------------------------------------------------------------------
    |
    | This option controls whether to show a progress bar for auto-closing
    | notifications.
    |
    */
    'progress' => true,

    /*
    |--------------------------------------------------------------------------
    | Include Assets
    |--------------------------------------------------------------------------
    |
    | This option controls whether to automatically include the CSS and JS
    | assets. Set to false if you want to include them manually.
    |
    */
    'include_assets' => true,

    /*
    |--------------------------------------------------------------------------
    | CDN Mode
    |--------------------------------------------------------------------------
    |
    | When enabled, assets will be loaded from CDN instead of local files.
    | This is useful if you don't want to publish the assets.
    |
    */
    'cdn_mode' => false,
];
