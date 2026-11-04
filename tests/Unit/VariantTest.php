<?php

declare(strict_types=1);

use Simtabi\Laranail\Ichava\IconSetsFontAwesomeFree\Enums\Variant;

/**
 * Pure-enum behaviour tests. Anything that touches config.json (default(),
 * isDefault(), getClass(), getPath()) lives in the Feature suite where the
 * Laravel container is bootstrapped.
 */
it(description: 'exposes the solid case value', closure: function () {
    expect(Variant::SOLID->getValue())->toBe('solid');
});

it(description: 'exposes the regular case value', closure: function () {
    expect(Variant::REGULAR->getValue())->toBe('regular');
});

it(description: 'exposes the brands case value', closure: function () {
    expect(Variant::BRANDS->getValue())->toBe('brands');
});

it(description: 'returns every case from values', closure: function () {
    expect(Variant::values())->toBe(['solid', 'regular', 'brands']);
});

it(description: 'resolves known values and rejects unknown ones', closure: function () {
    expect(Variant::tryFromValue('solid'))->toBe(Variant::SOLID)
        ->and(Variant::tryFromValue('regular'))->toBe(Variant::REGULAR)
        ->and(Variant::tryFromValue('brands'))->toBe(Variant::BRANDS)
        ->and(Variant::tryFromValue('not-a-real-variant'))->toBeNull();
});
