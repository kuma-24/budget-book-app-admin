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
    // mobile
    'mobile-base' => [
        'path' => './assets/mobile/_base-layout/js/base.js',
        'entrypoint' => true,
    ],
    'mobile-security-signin' => [
        'path' => './assets/mobile/security/js/security-signin.js',
        'entrypoint' => true,
    ],
    'mobile-security-signup' => [
        'path' => './assets/mobile/security/js/security-signup.js',
        'entrypoint' => true,
    ],
    'mobile-dashboard-home' => [
        'path' => './assets/mobile/dashboard/js/dashboard-home.js',
        'entrypoint' => true,
    ],

    // desktop
    'desktop-base' => [
        'path' => './assets/desktop/_base-layout/js/base.js',
        'entrypoint' => true,
    ],
    'desktop-security-signin' => [
        'path' => './assets/desktop/security/js/security-signin.js',
        'entrypoint' => true,
    ],
    'desktop-security-signup' => [
        'path' => './assets/desktop/security/js/security-signup.js',
        'entrypoint' => true,
    ],
    'desktop-dashboard-home' => [
        'path' => './assets/desktop/dashboard/js/dashboard-home.js',
        'entrypoint' => true,
    ],
];
