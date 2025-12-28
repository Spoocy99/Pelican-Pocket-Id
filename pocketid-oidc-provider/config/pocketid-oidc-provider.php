<?php

return [
    'display_name' => env('OAUTH_POCKETID_DISPLAY_NAME', 'Pocket ID'),
    'display_color' => env('OAUTH_POCKETID_DISPLAY_COLOR', '#4458bd'),

    'client_id' => env('OAUTH_POCKETID_CLIENT_ID'),
    'client_secret' => env('OAUTH_POCKETID_CLIENT_SECRET'),
    'redirect' => env('OAUTH_POCKETID_REDIRECT_URI'),
];