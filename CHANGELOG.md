# Changelog

All notable changes to `ichava/icon-sets-font-awesome-free` follow [Keep a Changelog](https://keepachangelog.com/en/1.0.0/) and [Semantic Versioning](https://semver.org/).

## [Unreleased]

## [0.1.0] - 2026-11-13

First release of `ichava/icon-sets-font-awesome-free`.

### Added

- **Font Awesome Free 7.3.1 from `FortAwesome/Font-Awesome`**: 2,883 SVGs across `solid` (2,001), `regular` (273), `brands` (609). The licence was read at that exact version before anything was vendored: CC BY 4.0, attribution required; only the Free `solid`, `regular` and `brands` SVGs, no Pro files. Its text ships at `resources/assets/svg/licenses/Font-Awesome/LICENSE.txt`, and `config.json` records its SPDX id, SHA-256 and check date under `license`.
- **`ATTRIBUTION.md`** carries the upstream owner, the vendored version, the licence verbatim and what was changed, and the README's License section points at it.
- **The pack declares its SVG kind**: `package.kind` is `icon`, with no category, item or rule override.
- **Weekly upstream sync** through icon-sets-sync's reusable `sync-pack.yml`, pinned to commit `5fa93a687c120644f75d072a9cdd83833b9f3d80`. It has nothing to run until icon-sets-sync gains `config/icon-sets-font-awesome-free.json`.
- **Tests:** the provider boots and the icons resolve; the licence record matches the shipped licence file byte for byte; no SVG carries stray text; and the attribution, docs-shape, kind, personal-contact, PHPStan-level, release-version, sibling-constraint, sync-caller and workflow-permission guards the other packs carry.

### Changed

- **This pack requires `ichava/core` and nothing else.** `composer.json` `require` is now `php` and `ichava/core`; `illuminate/support` and `laranail/package-tools` were dropped from it and still arrive through core. The provider extends core's `IconPackServiceProvider` and declares its constants class and component class, so `src/` imports no `laranail/*` namespace; it registers the same name, path, Blade component and icon directory as before. The composer `type` is `ichava-icon-set`, which core's pack discovery reads. The README and `docs/installation.md` no longer restate the `laranail/*` repositories: they link to core's installation guide, the one place that lists them, and no longer say the pack is on Packagist, which no Ichava package is yet. `tests/Unit/CoreOnlyDependencyTest.php` fails if any of it comes back.
- **The upstream sync runs icon-sets-sync `06b17d7`** (icon-sets-sync#88), up from `5fa93a6`, which adds this pack's recipe, the `split-variants` and `exclude` transforms, and the `licence_sha256` pin on the upstream licence text. The `uses:` pin and `toolkit-ref` move together; the reusable workflow's inputs did not change between the two commits, so the caller's `with:` block is untouched.

