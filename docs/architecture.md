# Architecture

*Explanation.* What this pack is, what it delegates, and why it is shaped that way.

## What it ships

2,883 SVGs across `solid` (2,001), `regular` (273), `brands` (609) -- see [Variants](variants.md). Counted from the tracked files rather than quoted
from prose:

```bash
git ls-tree -r --name-only origin/main -- resources/assets/svg/files | grep -c '\.svg$'
```

Besides the assets it ships a provider, a constants class, an enum for its addressing axis, and a
Blade component extending core's. That is the whole surface. The upstream licence text sits beside the
icons in `resources/assets/svg/licenses/`, which is not export-ignored, so it reaches every install.

## It depends on core, and core does not depend on it

The pack registers its icon directory with core's `IconRegistry` during `bootingPackage()`, after
core's singletons are bound. Registering earlier -- in `registeringPackage()` -- reaches for services
that do not exist yet, and logging there raises `Log [ichava] not defined`.

Core discovers installed packs at runtime. It has no list of them, so a pack is added by installing
it and removed by removing it.

## It requires `laranail/package-tools` directly

The provider writes `Package` into its own `configurePackage()` signature, so it depends on that
class whatever the dependency graph delivers transitively through core. **Require what you import**
is the rule; a transitive dependency is not a contract.

## Upstream and its licence

Its upstream is `FortAwesome/Font-Awesome`, and the version these SVGs came from is recorded in
`resources/assets/svg/config.json` under `upstream.current_version` rather than written out
here, so the two cannot drift. The licence is recorded beside it, under `license`: its SPDX id
(`CC-BY-4.0`), the shipped file, that file's SHA-256 and the date it was checked. `LicenceRecordTest`
fails when the shipped text and the recorded hash disagree, and the upstream sync compares the same
hash against the upstream's licence before it writes anything.

Core's [check pack updates](https://github.com/ichava/core/blob/main/docs/recipes/check-pack-updates.md)
recipe reports whether a newer release exists.

## See also

- [Core architecture](https://github.com/ichava/core/blob/main/docs/architecture.md) -- topology, boot order, the registry
- [Attribution](attribution.md) -- the upstream project and its licence
- [Release](release.md)

---

[← Docs index](../README.md#documentation)
