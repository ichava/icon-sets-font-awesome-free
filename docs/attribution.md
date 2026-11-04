# Attribution and licence

*Reference.*

## Upstream

[Font Awesome Free](https://fontawesome.com/) is by Fonticons, Inc. (Font Awesome, @fontawesome). Source: [github.com/FortAwesome/Font-Awesome](https://github.com/FortAwesome/Font-Awesome).

## Licence

The icons and this package are owned separately:

- **The icons** are © Fonticons, Inc., [CC BY 4.0](https://creativecommons.org/licenses/by/4.0/) under the [Font Awesome Free License](https://fontawesome.com/license/free). Simtabi LLC redistributes them and claims no authorship of them.
- **This package's code** (provider, enum, component, configuration) is © Simtabi LLC, [MIT](../LICENSE).

CC BY 4.0 allows commercial and non-commercial use, sharing and adaptation, provided you **credit Font Awesome**, link the licence and say whether you changed the icons. Attribution is a condition, not a courtesy. The upstream notice is reproduced in [`ATTRIBUTION.md`](../ATTRIBUTION.md) at the package root, and the licence text ships in `resources/assets/svg/licenses/`; both are in the dist archive (`docs/` is not). Keep them with the icons if you copy them out of the package.

The licence was read at the vendored version before anything was vendored. `config.json` records it under `license`: SPDX id `CC-BY-4.0`, file `resources/assets/svg/licenses/Font-Awesome/LICENSE.txt`, SHA-256 `20c6f40715a567c97b80f6944beb8bb325835cab47ea7dcab89ee3b8e077eced`, checked 2026-11-04.

## Credit

Attribution is **required**. Use this credit, with a link to the licence, on your credits or about page:

> Font Awesome Free by @fontawesome - https://fontawesome.com

Licence: <https://fontawesome.com/license/free>.

## Updating from upstream

Asset refreshes run **maintainer-side** via
[`ichava/icon-sets-sync`](https://github.com/ichava/icon-sets-sync).
The weekly sync polls `FortAwesome/Font-Awesome`, refreshes the bundled SVGs when upstream moves, and opens a pull
request. A human reviews it and tags a release.

End users **don't** refresh locally -- `vendor/` is regenerated on every
`composer install`, so any local change is discarded. Run
`php artisan ichava::ichava-core.check-updates --package=ichava/icon-sets-font-awesome-free`
to see whether a new upstream version is available.

## See also

- [Font Awesome Free website](https://fontawesome.com/)
- [Font Awesome Free source](https://github.com/FortAwesome/Font-Awesome)

---

[← Docs index](../README.md#documentation)
