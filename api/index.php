<?php

// Buat direktori temporary yang dibutuhkan Laravel di Vercel Serverless environment
$directories = [
    '/tmp/views',
    '/tmp/cache',
    '/tmp/sessions',
    '/tmp/logs',
];

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Forward request ke public/index.php bawaan Laravel
require __DIR__ . '/../public/index.php';

