<?php

declare(strict_types=1);

use Simtabi\Laranail\Ichava\Services\IconRegistry;
use Simtabi\Laranail\Ichava\IconSetsFontAwesomeFree\Enums\Variant;
use Simtabi\Laranail\Ichava\IconSetsFontAwesomeFree\Constants\IconsConstants;
use Simtabi\Laranail\Ichava\IconSetsFontAwesomeFree\Providers\IconsServiceProvider;

it(description: 'boots the provider without error', closure: function () {
    $providers = array_keys($this->app->getLoadedProviders());

    expect($providers)->toContain(IconsServiceProvider::class);
});

it(description: 'resolves constants from config json', closure: function () {
    expect(IconsConstants::getVendorPackage())->toBe('ichava/icon-sets-font-awesome-free')
        ->and(IconsConstants::getTitle())->toBe('Font Awesome Free')
        ->and(IconsConstants::getPrefix())->toBe('fa')
        ->and(IconsConstants::getDefaultVariant())->toBe('solid');
});

it(description: 'uses the config prefix in enum class helpers', closure: function () {
    expect(Variant::SOLID->getClass())->toBe('fa-solid')
        ->and(Variant::REGULAR->getClass())->toBe('fa-regular')
        ->and(Variant::BRANDS->getClass())->toBe('fa-brands');
});

it(description: 'matches the default variant to config json', closure: function () {
    expect(Variant::default())->toBe(Variant::SOLID)
        ->and(Variant::SOLID->isDefault())->toBeTrue()
        ->and(Variant::REGULAR->isDefault())->toBeFalse()
        ->and(Variant::BRANDS->isDefault())->toBeFalse();
});

it(description: 'points every variant at a directory that holds its icons', closure: function () {
    foreach (Variant::cases() as $variant) {
        $path = $variant->getPath();
        expect(is_dir($path))->toBeTrue("{$variant->value} points at {$path}, which is not a directory")
            ->and(glob($path . '/*.svg') ?: glob($path . '/*/*.svg') ?: [])->not->toBeEmpty("{$variant->value} holds no icons");
    }
});

it(description: 'picks up the package in the icon registry', closure: function () {
    $registry = $this->app->make(IconRegistry::class);

    expect($registry->isRegistered('ichava/icon-sets-font-awesome-free'))->toBeTrue(
        'IconRegistry should have ichava/icon-sets-font-awesome-free registered after boot.',
    );
});

it(description: 'resolves and renders the documented example icons', closure: function () {
    $registry = $this->app->make(IconRegistry::class);
    $samples = ['solid/house', 'regular/house', 'brands/github'];

    expect($samples)->not->toBeEmpty();

    foreach ($samples as $item) {
        $id = "ichava/icon-sets-font-awesome-free::{$item}";

        expect(is_file(dirname(__DIR__, 2) . "/resources/assets/svg/files/{$item}.svg"))->toBeTrue("{$item}.svg is missing")
            ->and($registry->has($id))->toBeTrue("{$id} does not resolve")
            ->and($registry->render($id))->toContain('<svg');
    }
});
