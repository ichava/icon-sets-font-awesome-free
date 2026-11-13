<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Font Awesome Free -- localisable strings
|--------------------------------------------------------------------------
|
| An overlay, not a second source of truth. `name` and `description` are
| deliberately absent: IconRegistry::fromDirectory() reads those from
| resources/assets/svg/config.json, which is canonical. A non-English locale
| may add them to override; `en` must not.
|
| Variant keys match Simtabi\Laranail\Ichava\IconSetsFontAwesomeFree\Enums\Variant.
|
*/

return [
    'variants' => [
        'solid'   => 'Solid',
        'regular' => 'Regular',
        'brands'  => 'Brands',
    ],

    'variant_descriptions' => [
        'solid'   => 'Filled glyphs. The largest Free style.',
        'regular' => 'Outlined glyphs. Free covers only part of the Regular style.',
        'brands'  => 'Logos of companies, products and services. Trademarks of their owners.',
    ],
];
