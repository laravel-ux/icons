<?php

namespace LaravelUi\Icons;

use BladeUI\Icons\Exceptions\CannotRegisterIconSet;
use BladeUI\Icons\Factory;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class IconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerSvg();
    }

    public function boot(): void
    {
        $this->bootComponents();
    }

    protected function registerSvg(): static
    {
        $this->callAfterResolving(
            Factory::class,
            /**
             * @throws CannotRegisterIconSet
             */
            function (Factory $factory) {
                $factory->add(
                    'lucide',
                    ['path' => __DIR__ . '/../stubs/resources/svg', 'prefix' => 'lucide'],
                );
            },
        );

        return $this;
    }

    protected function bootComponents(): static
    {
        Blade::anonymousComponentPath(__DIR__ . '/../stubs/resources/views/components', 'ui');

        return $this;
    }
}
