<?php

declare(strict_types=1);

/**
 * Only Font Awesome Free ships here: the Free solid, regular and brands SVGs,
 * each still carrying Font Awesome's own attribution comment.
 *
 * Font Awesome's licence asks that nobody remove that comment, and CC BY 4.0
 * makes attribution a condition, so a refresh that stripped it (the sync's
 * sanitiser does, outside report-only mode) or brought in anything but the
 * three Free styles has to fail here.
 */
function fa_files_root(): string
{
    return dirname(__DIR__, 2) . '/resources/assets/svg/files';
}

it(description: 'ships exactly the three Free styles and nothing beside them', closure: function () {
    $entries = array_values(array_diff(scandir(fa_files_root()) ?: [], ['.', '..']));
    sort($entries);

    expect($entries)->toBe(['brands', 'regular', 'solid']);
});

it(description: 'keeps the counts of Font Awesome Free 7.3.1 in each style', closure: function () {
    expect(count(glob(fa_files_root() . '/solid/*.svg') ?: []))->toBe(2001)
        ->and(count(glob(fa_files_root() . '/regular/*.svg') ?: []))->toBe(273)
        ->and(count(glob(fa_files_root() . '/brands/*.svg') ?: []))->toBe(609);
});

it(description: 'keeps Font Awesome Free attribution in every SVG, and nothing names Pro', closure: function () {
    $files = glob(fa_files_root() . '/*/*.svg') ?: [];
    expect(count($files))->toBeGreaterThanOrEqual(2883);

    $missing = [];
    foreach ($files as $file) {
        $svg = (string) file_get_contents($file);
        if (! str_contains($svg, '<!--! Font Awesome Free ') || ! str_contains($svg, 'by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free')) {
            $missing[] = substr($file, strlen(fa_files_root()) + 1);
        }
        expect(str_contains($svg, 'Font Awesome Pro'))->toBeFalse("{$file} names Font Awesome Pro");
    }

    expect($missing)->toBe([]);
});
