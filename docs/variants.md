# Variants

*Reference.*

`ichava/icon-sets-font-awesome-free` ships **2,883 Font Awesome Free icons in three styles**. Each SVG has a height of 512 and a width that varies by icon, and paints with `currentColor`. Only the Free styles are included: no Pro icons, no kit code.

| Variant | Path prefix | Icons | Style |
|---|---|---|---|
| `solid` | `solid/<name>` | 2,001 | Filled glyphs. The largest Free style. |
| `regular` | `regular/<name>` | 273 | Outlined glyphs. Free covers only part of the Regular style. |
| `brands` | `brands/<name>` | 609 | Logos of companies, products and services. Trademarks of their owners. |

The default variant is `solid`. Always include the variant prefix in the icon path:

```blade
<x-ichava::icon name="ichava/icon-sets-font-awesome-free::solid/house" class="w-6 h-6" />
<x-ichava::icon name="ichava/icon-sets-font-awesome-free::regular/house" class="w-6 h-6" />
<x-ichava::icon name="ichava/icon-sets-font-awesome-free::brands/github" class="w-6 h-6" />
```

## Variant enum (PHP)

```php
use Simtabi\Laranail\Ichava\IconSetsFontAwesomeFree\Enums\Variant;

Variant::SOLID->value;       // 'solid'
Variant::REGULAR->value;     // 'regular'
Variant::BRANDS->value;      // 'brands'
Variant::default();        // Variant::SOLID
```

The enum implements `IconSetVariantInterface` from core, so it works wherever core's registry expects a variant.

## When to use which

- **solid** is the full Free set; reach for it first.
- **regular** covers only part of the designs (273), outlined.
- **brands** are logos. They are trademarks of their owners: use one only to refer to the company, product or service it represents.

Attribution is required for every style: Font Awesome Free by @fontawesome - https://fontawesome.com. See [Attribution](attribution.md).

## See also

- [Customisation](customization.md)
- [Icon path format](https://github.com/ichava/core/blob/main/docs/tools/icon-path-format.md)

---

[← Docs index](../README.md#documentation)
