<?php

namespace LaravelUi\Icons;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class IconsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->bootComponents();
    }

    protected function bootComponents(): static
    {
        Blade::anonymousComponentPath(__DIR__ . '/../stubs/resources/views/components', 'ui');

        return $this;
    }
}
