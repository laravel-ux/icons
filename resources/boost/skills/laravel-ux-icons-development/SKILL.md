---
name: laravel-ux-icons-development
description: "Build, review, or debug Laravel Blade and Livewire interfaces that use laravel-ux/icons or the x-ux::icon component. Use when choosing or verifying Lucide icon names, styling and sizing icons, making icon-only controls accessible, resolving missing Blade UI Kit icons, or maintaining the package's bundled Lucide SVG files."
---

# Laravel UX Icons Development

Use the package component for Lucide icons in application markup. Verify names against the bundled files instead of guessing.

## Public API

```blade
<x-ux::icon name="search" />
<x-ux::icon name="arrow-right" class="size-4 shrink-0" />
<x-ux::icon name="settings-2" :size="20" />
```

`x-ux::icon` accepts these component props:

| Prop    | Type             | Default | Purpose                                      |
|---------|------------------|---------|----------------------------------------------|
| `name*` | `string`         | -       | Select a bundled kebab-case Lucide filename. |
| `size`  | `int\|string`   | `24`    | Set SVG `width` and `height`.                 |

All other attributes are forwarded to the SVG through Blade UI Kit Icons.

## Core Rules

- Pass the filename without `.svg` and without the internal `lucide-` prefix.
- Prefer `x-ux::icon` in Blade and Livewire views. Reserve `svg('lucide-name')` for low-level package internals.
- Use Tailwind classes when size or color belongs to the surrounding layout: `size-4`, `shrink-0`, `text-muted-foreground`.
- Use `:size="20"` when explicit SVG dimensions are part of the consuming component's API.
- Let icons inherit color through `currentColor`; do not add hardcoded SVG colors.
- Never accept an unrestricted user-provided icon name. Map application state to a known allowlist of names.

## Find and Verify Names

Search before using an uncommon icon:

```shell
rg --files packages/icons/resources/icons | rg '/search-name\.svg$'
```

Search by related terms when the first name is absent:

```shell
rg --files packages/icons/resources/icons | rg '/(circle-)?check|badge-check'
```

Use the exact lowercase kebab-case filename returned by the search. Do not translate React export names such as `ArrowRightIcon` mechanically when an alias may have changed.

Common choices:

| Intent                  | Names                                         |
|-------------------------|-----------------------------------------------|
| Continue / external link | `arrow-right`, `arrow-up-right`              |
| Expand / collapse       | `chevron-down`, `chevron-up`, `chevron-right` |
| Add / remove / close    | `plus`, `minus`, `x`, `trash-2`               |
| Success / selected      | `check`, `check-check`, `circle-check`        |
| Search                  | `search`                                      |
| Settings / controls     | `settings-2`, `sliders-horizontal`            |
| User / account          | `user`, `circle-user`, `users`                |
| Navigation              | `menu`, `panel-left`                          |

## Accessibility

Treat an icon as decorative when nearby text or the parent control already provides its meaning:

```blade
<x-ux::button>
    Continue
    <x-ux::icon name="arrow-right" data-icon="inline-end" />
</x-ux::button>
```

Put the accessible name on an icon-only interactive element, not on its SVG:

```blade
<x-ux::button aria-label="Open navigation" size="icon" variant="ghost">
    <x-ux::icon name="menu" />
</x-ux::button>
```

- Use visible text where an action is ambiguous or high risk.
- Do not rely on icon shape or color alone to communicate important state.
- Add `aria-hidden="true"` to a decorative icon only when the surrounding component does not already handle decorative SVG semantics.
- Do not make the SVG itself clickable; use a semantic button or link.

## RTL

Icons representing physical direction may need to reverse in RTL:

```blade
<x-ux::icon name="chevron-right" class="rtl:rotate-180" />
```

Do not reverse non-directional icons such as `search`, `check`, `settings-2`, or brand marks. Prefer logical `data-icon="inline-start"` and `data-icon="inline-end"` hooks when a parent component supports them.

## Dynamic and Livewire Markup

Map state to a small known set of icons:

```blade
@php
    $statusIcon = match ($order->status) {
        'paid' => 'circle-check',
        'failed' => 'circle-x',
        default => 'clock-3',
    };
@endphp

<x-ux::icon :name="$statusIcon" wire:key="order-icon-{{ $order->id }}" />
```

The icon component has no client-side state and needs no custom Alpine or JavaScript plugin.

## Missing Icon Errors

For `Svg by name "..." from set "lucide" not found`:

1. Remove `.svg` or `lucide-` from the component's `name` value.
2. Confirm `packages/icons/resources/icons/{name}.svg` exists.
3. Check whether Lucide renamed the icon and select the current bundled name.
4. Clear compiled views or the Blade Icons cache if the file exists but is not discovered.
5. Render the smallest Blade view that exercises the icon.

Do not add an arbitrary third-party SVG to fix an application typo.

## Package Maintenance

The bundled upstream version is recorded in `packages/icons/LUCIDE_VERSION`. The package contains the complete official Lucide SVG set for that version and no deprecated or package-specific aliases.

When explicitly updating the package:

1. Read the latest stable release from the official `lucide-icons/lucide` repository.
2. Download its `lucide-icons-{version}.zip` release asset.
3. Copy only `icons/*.svg`; never copy JSON metadata or generated fonts.
4. Remove the upstream fixed `width="24"` and `height="24"` attributes. The Blade component supplies dimensions, and retaining both creates duplicate SVG attributes.
5. Replace the icon set exactly: update changed SVGs, add new names, and delete names removed upstream.
6. Update `LUCIDE_VERSION`.
7. Verify filename uniqueness, SVG parsing, `currentColor` usage, and a representative Blade render.

Do not hand-edit upstream SVG geometry. Package-specific SVGs should live in a separate icon set instead of masquerading as Lucide icons.

## Validation

- Confirm every used name exists as an SVG file.
- Check that all SVGs parse and have a `viewBox`.
- Render at least one common icon and one icon added by the current Lucide update.
- Run the package or consuming application's relevant tests after provider or component changes.
