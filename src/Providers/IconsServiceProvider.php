<?php

declare(strict_types=1);

namespace Simtabi\Laranail\Ichava\IconSetsFontAwesomeFree\Providers;

use Simtabi\Laranail\Ichava\Providers\IconPackServiceProvider;
use Simtabi\Laranail\Ichava\IconSetsFontAwesomeFree\Constants\IconsConstants;
use Simtabi\Laranail\Ichava\IconSetsFontAwesomeFree\View\Components\IconComponent;

/**
 * Registers the Font Awesome Free set with the Ichava registry on boot.
 */
class IconsServiceProvider extends IconPackServiceProvider
{
    protected function constantsClass(): string
    {
        return IconsConstants::class;
    }

    protected function componentClass(): string
    {
        return IconComponent::class;
    }
}
