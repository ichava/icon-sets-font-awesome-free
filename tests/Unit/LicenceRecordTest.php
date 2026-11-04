<?php

declare(strict_types=1);

/**
 * The licence-change guard, pack side.
 *
 * `config.json` records the upstream licence it was vendored under: SPDX id, the
 * shipped file, its SHA-256 and the day it was read. The upstream sync compares
 * the same hash against the upstream's licence before it writes; this test fails
 * when the shipped text and the record disagree, so neither can change alone.
 */
function licence_record(): array
{
    $config = json_decode(
        (string) file_get_contents(dirname(__DIR__, 2) . '/resources/assets/svg/config.json'),
        true,
        flags: JSON_THROW_ON_ERROR,
    );

    return $config['license'] ?? [];
}

it(description: 'records the upstream licence it was vendored under', closure: function () {
    $record = licence_record();

    expect($record['spdx'] ?? null)->toBe('CC-BY-4.0')
        ->and($record['file'] ?? null)->toBe('resources/assets/svg/licenses/Font-Awesome/LICENSE.txt')
        ->and($record['sha256'] ?? '')->toMatch('/^[0-9a-f]{64}$/')
        ->and($record['checked_at'] ?? '')->toMatch('/^\d{4}-\d{2}-\d{2}$/');
});

it(description: 'ships the licence file whose hash it records', closure: function () {
    $record = licence_record();
    $file = dirname(__DIR__, 2) . '/' . ($record['file'] ?? 'missing');

    expect(is_file($file))->toBeTrue("{$file} is missing")
        ->and(hash_file('sha256', $file))->toBe($record['sha256'] ?? null, 'the shipped licence text changed without its recorded hash, or the reverse');
});

it(description: 'agrees with the upstream block on the licence', closure: function () {
    $config = json_decode(
        (string) file_get_contents(dirname(__DIR__, 2) . '/resources/assets/svg/config.json'),
        true,
        flags: JSON_THROW_ON_ERROR,
    );

    expect($config['upstream']['license'])->toBe(licence_record()['spdx'] ?? null);
});
