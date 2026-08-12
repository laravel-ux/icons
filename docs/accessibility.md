# Accessibility

An icon should support a visible label, not replace one when the action could be ambiguous.

## Decorative icons

When nearby text already communicates the meaning, keep the icon decorative.

```blade
<a href="/settings" class="inline-flex items-center gap-2">
    <x-ux::icon name="settings-2" aria-hidden="true" />
    Settings
</a>
```

## Icon-only controls

Put the accessible name on the interactive parent rather than the SVG.

```blade preview
<x-ux::button variant="outline" size="icon" aria-label="Open navigation">
    <x-ux::icon name="menu" />
</x-ux::button>
```

Use visible text for unfamiliar, destructive, or high-risk actions whenever possible.

## Do not make the SVG interactive

Keep click handlers, keyboard behavior, focus styles, and accessible names on a semantic `button` or `a` element.
The icon itself should only provide the visual symbol.

## Right-to-left interfaces

Mirror arrows and horizontal chevrons when their meaning follows reading or navigation direction.

```blade
<x-ux::icon name="arrow-right" class="rtl:rotate-180" />
```

Do not mirror non-directional icons such as `search`, `check`, or `settings-2`.
