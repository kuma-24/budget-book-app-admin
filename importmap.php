<?php

/**
 * Returns the importmap for this application.
 *
 * - "path" is a path inside the asset mapper system. Use the
 *     "debug:asset-map" command to see the full list of paths.
 *
 * - "entrypoint" (JavaScript only) set to true for any module that will
 *     be used as an "entrypoint" (and passed to the importmap() Twig function).
 *
 * The "importmap:require" command can be used to add new entries to this file.
 */
return [
    'mobile-base-layout' => [
        'path' => './assets/mobile/_base_layout/js/base.js',
        'entrypoint' => true,
    ],
    'mobile-dashboard-top' => [
        'path' => './assets/mobile/dashboard/js/dashboard_top.js',
        'entrypoint' => true
    ],
    'mobile-dashboard-home' => [
        'path' => './assets/mobile/dashboard/js/dashboard_home.js',
        'entrypoint' => true
    ],
    'mobile-administrator-signin' => [
        'path' => './assets/mobile/administrator/js/administrator_signin.js',
        'entrypoint' => true,
    ],
    'mobile-administrator-signup' => [
        'path' => './assets/mobile/administrator/js/administrator_signup.js',
        'entrypoint' => true,
    ],
];
