# Getting started

*How-to guide.* Your first icon from this pack, once [Installation](installation.md) is done.

## Render one

```blade
<x-ichava::icon name="ichava/icon-sets-font-awesome-free::<variant>/<name>" class="w-6 h-6" />
```

The component is core's and is generic: the pack is named in the path, not in the tag. What goes in the
path is the subject of [Variants](variants.md). A real one:

```blade
<x-ichava::icon name="ichava/icon-sets-font-awesome-free::solid/house" class="w-6 h-6" />
```

## Or from PHP

```blade
{{ ichava('ichava/icon-sets-font-awesome-free::solid/house')->class('w-5 h-5') }}
```

Both spellings of the path resolve to the same icon -- slash and dot are normalised by one
resolver, documented in core's [icon path format](https://github.com/ichava/core/blob/main/docs/tools/icon-path-format.md).

## If nothing renders

Almost always the seed has not run. Check with:

```bash
php artisan ichava::ichava-core.info icons --package=ichava/icon-sets-font-awesome-free
```

Zero rows means the seed step in [Installation](installation.md) is outstanding. Core's
[troubleshooting](https://github.com/ichava/core/blob/main/docs/troubleshooting.md) covers the rest.

## See also

- [Variants](variants.md) -- what this pack ships and how to address it
- [Customisation](customization.md) -- colour, size and accessibility
- [Use an icon pack](https://github.com/ichava/core/blob/main/docs/recipes/use-an-icon-pack.md) -- the generic guide, for any pack

---

[← Docs index](../README.md#documentation)
