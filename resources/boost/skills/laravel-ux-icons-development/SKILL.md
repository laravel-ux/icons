---
name: laravel-ux-icons-development
description: "Use when working with Laravel UX Icons, including <x-ux::icon>, Lucide icon names, Blade UI Kit icon rendering, missing icon errors, package SVG maintenance, icon sizing, accessibility, and icon usage in Laravel Blade, Livewire, or Tailwind UI components."
---

# Laravel UX Icons Development

## Use This Skill For

- Rendering icons with `<x-ux::icon>`.
- Choosing, validating, or replacing Lucide icon names.
- Fixing `Svg by name "..." from set "lucide" not found` errors.
- Adjusting icon sizing, color, alignment, or accessibility.
- Maintaining package SVG files when the task explicitly targets `laravel-ux/icons` package internals.

## Package Facts

- Composer package: `laravel-ux/icons`.
- Service provider: `LaravelUx\Icons\IconsServiceProvider`.
- Icon set name: `lucide`.
- SVG directory: `resources/icons`.
- Component view: `resources/views/components/icon.blade.php`.
- Component namespace: `ux`.
- Rendering dependency: `blade-ui-kit/blade-icons`.

The provider registers SVG files as Blade UI Kit icons with the `lucide` prefix and registers package Blade components under `ux`.

## Preferred API

Use the package component in application Blade and Livewire markup:

```blade
<x-ux::icon name="github" />
<x-ux::icon name="arrow-right" class="size-4" />
<x-ux::icon name="settings-2" class="size-5 shrink-0" />
<x-ux::icon name="search" :size="20" />
```

Rules:

- Pass `name` without `lucide-`.
- `name` must match `resources/icons/{name}.svg`.
- The component calls `svg("lucide-{$name}")` internally.
- Size icons with Tailwind classes or with the `size` prop. Both are supported.
- Use Tailwind classes for layout-driven styling: `size-4`, `size-5`, `shrink-0`, `text-muted-foreground`, `transition-transform`.
- Use `:size` when explicit SVG `width` and `height` attributes are clearer or when a component API wants a numeric size.
- Direct `svg('lucide-name')` is allowed for low-level package internals, but should not be the default style in app views.

## Icon Selection

Prefer common, recognizable symbols:

| Intent                  | Icon names                                    |
|-------------------------|-----------------------------------------------|
| Continue / link forward | `arrow-right`, `arrow-up-right`               |
| Expand / collapse       | `chevron-down`, `chevron-up`, `chevron-right` |
| Add / remove / close    | `plus`, `minus`, `x`, `trash-2`               |
| Success / selected      | `check`, `check-check`, `circle-check`        |
| Search                  | `search`                                      |
| Settings / controls     | `settings-2`, `sliders-horizontal`            |
| User/account            | `user`, `circle-user`, `users`                |
| Navigation/menu         | `menu`, `panel-left`                          |
| GitHub                  | `github`                                      |

When uncertain, search the package SVG directory before using the icon:

```shell
rg --files resources/icons | rg '/icon-name\.svg$'
```

## Accessibility

- Treat icons as decorative by default.
- Decorative icons inside labelled buttons or links do not need their own label.
- Icon-only controls must put the accessible label on the parent interactive element:

```blade
<x-ux::button aria-label="Open menu" size="icon" variant="ghost">
    <x-ux::icon name="menu" class="size-4" />
</x-ux::button>
```

- Do not make the SVG itself the labelled element unless there is a specific low-level reason.
- For destructive or high-risk actions, prefer visible text, a tooltip, or an explicit `aria-label` on the button/link.

## Missing Icon Errors

For errors like `Svg by name "code-2" from set "lucide" not found`:

1. Confirm the caller did not pass the `lucide-` prefix to `<x-ux::icon>`.
2. Confirm `resources/icons/{name}.svg` exists.
3. Pick a nearby available Lucide icon if the desired filename is absent.
4. Do not add a new SVG during normal app work. New SVGs are package maintenance only.
5. Re-render the smallest Blade view that exercises the icon.

## SVG Maintenance

Only do this when explicitly maintaining `laravel-ux/icons` itself:

- Keep filenames lowercase kebab-case with `.svg` extension.
- Keep SVGs compatible with Blade UI Kit Icons.
- Prefer Lucide-style SVGs using currentColor, usually `stroke="currentColor"` and `fill="none"`.
- Avoid hardcoded colors.
- Do not change the component API unless the task is explicitly about package API design.

## Validation

Use the smallest reliable check. Inside the Laravel UX website, run commands through Sail:

```shell
vendor/bin/sail artisan tinker --execute 'view("your.view")->render();'
```

If PHP files are changed, run Pint for the changed PHP files. If Blade classes are changed, run the relevant frontend build.
