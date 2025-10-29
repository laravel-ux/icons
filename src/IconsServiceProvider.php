<?php

namespace LaravelUx\Icons;

use BladeUI\Icons\Exceptions\CannotRegisterIconSet;
use BladeUI\Icons\Factory;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class IconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->callAfterResolving(
            Factory::class,
            /**
             * @throws CannotRegisterIconSet
             */
            function (Factory $factory) {
                $factory->add(
                    'lucide',
                    ['path' => __DIR__ . '/../resources/icons', 'prefix' => 'lucide'],
                );
            },
        );
    }

    public function boot(): void
    {
        Blade::anonymousComponentPath(__DIR__ . '/../resources/views/components', 'ux');
    }
}
