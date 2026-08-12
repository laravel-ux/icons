# Installation

Install Laravel UX Icons with Composer.

```shell
composer require laravel-ux/icons
```

Laravel package discovery registers the service provider automatically. No application configuration is required.

## Verify the installation

Render an icon in any Blade or Livewire view.

```blade
<x-ux::icon name="circle-check" />
```

If the icon renders, the component namespace and bundled Lucide set are available.

## Laravel Boost

The package ships with the `laravel-ux-icons-development` skill for supported coding agents. When installing Boost
with agent skills enabled, package skills are discovered with the rest of the project context.

```shell
php artisan boost:install --skills
```

If Boost is already configured, discover newly installed package skills during an update.

```shell
php artisan boost:update --discover
```
