<?php

/**
 * Convertit les PNG/JPG de public/images en WebP (qualité 82).
 * Usage : php scripts/convert-webp.php
 */
$dir = __DIR__.'/../public/images';
$quality = 82;
$exts = ['png', 'jpg', 'jpeg'];

$files = glob($dir.'/*.*');
$totalBefore = 0;
$totalAfter = 0;

foreach ($files as $file) {
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    if (! in_array($ext, $exts, true)) {
        continue;
    }

    $webp = preg_replace('/\.(png|jpe?g)$/i', '.webp', $file);

    $img = match ($ext) {
        'png' => imagecreatefrompng($file),
        default => imagecreatefromjpeg($file),
    };

    if (! $img) {
        echo '✗ Échec lecture : '.basename($file).PHP_EOL;

        continue;
    }

    // Préserve la transparence des PNG
    if ($ext === 'png') {
        imagepalettetotruecolor($img);
        imagealphablending($img, true);
        imagesavealpha($img, true);
    }

    imagewebp($img, $webp, $quality);
    imagedestroy($img);

    $before = filesize($file);
    $after = filesize($webp);
    $totalBefore += $before;
    $totalAfter += $after;

    printf(
        "✓ %-28s %6s → %6s  (-%d%%)\n",
        basename($webp),
        round($before / 1024).'K',
        round($after / 1024).'K',
        round((1 - $after / $before) * 100)
    );
}

printf(
    "\nTotal : %s → %s  (-%d%%)\n",
    round($totalBefore / 1024 / 1024, 1).' Mo',
    round($totalAfter / 1024 / 1024, 1).' Mo',
    $totalBefore ? round((1 - $totalAfter / $totalBefore) * 100) : 0
);
