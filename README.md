# ichava/icon-sets-font-awesome-free

[![Packagist](https://img.shields.io/packagist/v/ichava/icon-sets-font-awesome-free)](https://packagist.org/packages/ichava/icon-sets-font-awesome-free)
[![Tests](https://github.com/ichava/icon-sets-font-awesome-free/actions/workflows/tests.yml/badge.svg)](https://github.com/ichava/icon-sets-font-awesome-free/actions/workflows/tests.yml)
[![Static analysis](https://github.com/ichava/icon-sets-font-awesome-free/actions/workflows/code-quality.yml/badge.svg)](https://github.com/ichava/icon-sets-font-awesome-free/actions/workflows/code-quality.yml)
[![License MIT](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

> Font Awesome Free for the Ichava Laravel icon ecosystem: 2,883 SVGs across `solid` (2,001), `regular` (273), `brands` (609), vendored from `FortAwesome/Font-Awesome` 7.3.1.

Requires [`ichava/core`](https://github.com/ichava/core) `^0.1` on PHP `^8.4.1 || ^8.5` and Laravel `^13`.

**Attribution required:** Font Awesome Free by @fontawesome - https://fontawesome.com. The icons are [CC BY 4.0](https://creativecommons.org/licenses/by/4.0/); see [License](#license).

## Install

`ichava/core` and this pack come from Packagist. The `laranail/*` packages core depends on are not on Packagist yet, so the **application's** `composer.json` names them:

```json
{
    "repositories": [
        { "type": "vcs", "url": "https://github.com/laranail/package-tools" },
        { "type": "vcs", "url": "https://github.com/laranail/console" },
        { "type": "vcs", "url": "https://github.com/laranail/enumerator" },
        { "type": "vcs", "url": "https://github.com/laranail/db-tools" }
    ]
}
```

Then require the pack:

```bash
composer require ichava/icon-sets-font-awesome-free
```

The service provider is discovered automatically. Core's [installation guide](https://github.com/ichava/core/blob/main/docs/installation.md) covers core's own setup.

## Quick start guide and usage

### Getting started

Seed the pack once after installing it, and again after upgrading it:

```bash
php artisan ichava::ichava-core.database seed --package=ichava/icon-sets-font-awesome-free
```

The seed is not optional: until it runs the registry holds no rows for this pack and every lookup returns nothing. No configuration is needed; the defaults are merged without publishing anything.

### Usage

Icons are addressed as `ichava/icon-sets-font-awesome-free::<variant>/<name>`. In Blade, through core's component:

```blade
<x-ichava::icon name="ichava/icon-sets-font-awesome-free::solid/house" class="w-6 h-6" />
```

Or from PHP, through core's helper:

```blade
{{ ichava('ichava/icon-sets-font-awesome-free::brands/github')->class('w-5 h-5') }}
```

See [Getting started](docs/getting-started.md) for the full walkthrough, and the [Documentation](#documentation) index below for everything else.

## <a name="documentation"></a>Documentation

The full documentation lives in this repository, under `docs/`, and is indexed below.

### This pack

- [Installation](docs/installation.md) — requirements, the repositories block, seeding
- [Getting started](docs/getting-started.md) — your first icon from this pack
- [Configuration](docs/configuration.md) — why there is no config file, and the kind keys in `config.json`
- [Architecture](docs/architecture.md) — what it ships, what it delegates, and why
- [Release](docs/release.md) — how a version is cut, and how the icons are refreshed
- [Variants](docs/variants.md) — the three styles, the `Variant` enum, and the brand icons
- [Customisation](docs/customization.md) — sizing, colour and accessibility
- [Attribution](docs/attribution.md) — upstream project, licence terms, and where the vendored version is recorded

### Shared across every pack

- [Use an icon pack](https://github.com/ichava/core/blob/main/docs/recipes/use-an-icon-pack.md) — addressing icons, in Blade and in PHP
- [Seed pack icons](https://github.com/ichava/core/blob/main/docs/recipes/seed-pack-icons.md) — the seeding pipeline and its options
- [Check pack updates](https://github.com/ichava/core/blob/main/docs/recipes/check-pack-updates.md) — the update checker and what its statuses mean
- [Serve icons from a CDN](https://github.com/ichava/core/blob/main/docs/recipes/serve-icons-from-a-cdn.md) — reading this pack's CDN templates out of `config.json`

Its upstream is `FortAwesome/Font-Awesome`; run core's [check pack updates](https://github.com/ichava/core/blob/main/docs/recipes/check-pack-updates.md) recipe to see whether a newer release exists.

## Contributing & security

See [CONTRIBUTING.md](CONTRIBUTING.md). Report vulnerabilities privately through [security policy](https://github.com/ichava/icon-sets-font-awesome-free/security/policy) — never in a public issue.

## License

The package code is MIT, © Simtabi LLC. See [LICENSE](LICENSE).

The icons are **Font Awesome Free by @fontawesome - https://fontawesome.com**, © Fonticons, Inc., licensed under [CC BY 4.0](https://creativecommons.org/licenses/by/4.0/) ([Font Awesome Free License](https://fontawesome.com/license/free)). Attribution is required: credit Font Awesome wherever the icons appear. Simtabi LLC claims no authorship of them. The brand icons are trademarks of their owners. The full notice is in [ATTRIBUTION.md](ATTRIBUTION.md), which ships with the package and must accompany any copy of the icons.
