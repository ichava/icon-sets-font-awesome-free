<?php

declare(strict_types=1);

/**
 * The icons are not Simtabi LLC's, and the package has to say so wherever it goes.
 *
 * `LICENSE` covers the package code only and stays the plain MIT text, so GitHub
 * and Packagist keep detecting it as MIT. The upstream notice lives in
 * `ATTRIBUTION.md` at the root, because `docs/` is export-ignored and never reaches
 * a consumer's vendor directory.
 */
function attribution_root(): string
{
    return dirname(__DIR__, 2);
}

/** Strings ATTRIBUTION.md must carry verbatim. */
function attribution_required(): array
{
    return [
        'Font Awesome Free by @fontawesome - https://fontawesome.com',
        'https://fontawesome.com/license/free',
        '# Icons: CC BY 4.0 License (https://creativecommons.org/licenses/by/4.0/)',
        'All brand icons are trademarks of their respective owners.',
    ];
}

it(description: 'ships ATTRIBUTION.md at the package root', closure: function () {
    expect(is_file(attribution_root() . '/ATTRIBUTION.md'))->toBeTrue();
});

it(description: 'never export-ignores ATTRIBUTION.md or the licence texts, so the notice reaches every install', closure: function () {
    $lines = file(attribution_root() . '/.gitattributes', FILE_IGNORE_NEW_LINES) ?: [];
    expect(count($lines))->toBeGreaterThan(0);
    foreach ($lines as $line) {
        if (str_contains($line, 'export-ignore')) {
            $pattern = ltrim(trim(strtok($line, " \t")), '/');
            foreach (['ATTRIBUTION.md', 'resources', 'resources/assets/svg/licenses'] as $path) {
                $this->assertFalse(fnmatch($pattern, $path), "'{$line}' would drop {$path} from the dist archive");
            }
        }
    }
});

it(description: 'carries the upstream notice verbatim', closure: function () {
    $text = (string) file_get_contents(attribution_root() . '/ATTRIBUTION.md');
    $required = attribution_required();
    expect($required)->not->toBeEmpty();
    foreach ($required as $needle) {
        $this->assertStringContainsString($needle, $text, "ATTRIBUTION.md does not carry: {$needle}");
    }
    $this->assertStringContainsString('claims no authorship', $text, 'ATTRIBUTION.md must say Simtabi LLC did not author the icons');
});

it(description: 'reproduces the shipped upstream licence file in full', closure: function () {
    $licence = attribution_root() . '/resources/assets/svg/licenses/Font-Awesome/LICENSE.txt';
    expect(is_file($licence))->toBeTrue('the upstream licence file is missing');

    // Upstream ships some licence files with CRLF endings; the file keeps its bytes
    // (its hash is recorded), and ATTRIBUTION.md quotes it with LF.
    $body = trim(str_replace("\r\n", "\n", (string) file_get_contents($licence)));
    expect(strlen($body))->toBeGreaterThan(200);
    $this->assertStringContainsString($body, (string) file_get_contents(attribution_root() . '/ATTRIBUTION.md'), 'ATTRIBUTION.md no longer quotes the shipped licence text verbatim');
});

it(description: 'keeps LICENSE to the package code, held by Simtabi LLC', closure: function () {
    $license = (string) file_get_contents(attribution_root() . '/LICENSE');
    expect(preg_match_all('/^Copyright /m', $license))->toBe(1);
    $this->assertStringContainsString('Copyright (c) Simtabi LLC', $license);
    $this->assertStringNotContainsString('NOTICE', $license, 'third-party notices belong in ATTRIBUTION.md; appended to LICENSE they break licence detection');
});

it(description: 'points the README licence section at ATTRIBUTION.md', closure: function () {
    $readme = (string) file_get_contents(attribution_root() . '/README.md');
    expect(preg_match('/^## License\n(.*?)(?=^## |\z)/ms', $readme, $m))->toBe(1);
    $this->assertStringContainsString('(ATTRIBUTION.md)', $m[1]);
    $this->assertStringContainsString('claims no authorship', $m[1]);
});

it(description: 'gives the credit Font Awesome Free requires in the README, the attribution page and ATTRIBUTION.md', closure: function () {
    // CC BY 4.0 makes attribution a condition. The credit line is the one Font
    // Awesome's own licence asks for, with the licence link beside it.
    $credit = 'Font Awesome Free by @fontawesome - https://fontawesome.com';

    foreach (['README.md', 'ATTRIBUTION.md', 'docs/attribution.md'] as $file) {
        $text = (string) file_get_contents(attribution_root() . '/' . $file);
        $this->assertStringContainsString($credit, $text, "{$file} does not carry the required credit");
        $this->assertStringContainsString('https://fontawesome.com/license/free', $text, "{$file} does not link the licence");
    }

    $readme = (string) file_get_contents(attribution_root() . '/README.md');
    expect(preg_match('/^## License\n(.*?)(?=^## |\z)/ms', $readme, $m))->toBe(1);
    $this->assertStringContainsString($credit, $m[1], 'the README License section lost the credit');
    $this->assertStringContainsString('trademarks', $m[1], 'the README License section lost the brand trademark notice');
});
