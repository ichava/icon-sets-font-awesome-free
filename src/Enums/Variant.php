<?php

declare(strict_types=1);

namespace Simtabi\Laranail\Ichava\IconSetsFontAwesomeFree\Enums;

use Simtabi\Laranail\Ichava\Traits\HasIconSetVariants;
use Simtabi\Laranail\Ichava\Contracts\IconSetVariantInterface;
use Simtabi\Laranail\Ichava\IconSetsFontAwesomeFree\Constants\IconsConstants;

/**
 * Type-safe variant selection for Font Awesome Free (solid / regular / brands).
 */
enum Variant: string implements IconSetVariantInterface
{
    use HasIconSetVariants;

    case SOLID = 'solid';
    case REGULAR = 'regular';
    case BRANDS = 'brands';

    public function getPath(): string
    {
        return IconsConstants::getSvgPath($this->value);
    }

    private static function getDefaultValue(): string
    {
        return IconsConstants::getDefaultVariant() ?? self::SOLID->value;
    }

    private static function getClassPrefix(): string
    {
        return IconsConstants::getPrefix();
    }
}
