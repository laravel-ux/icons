# Laravel UX UI

Laravel UX UI components understand icons as part of their composition. Keep the icon inside the semantic component
and let the parent provide spacing and default sizing.

```blade preview
<div class="flex flex-wrap items-center gap-3">
    <x-ux::button>
        <x-ux::icon name="plus" data-icon="inline-start" />
        New project
    </x-ux::button>

    <x-ux::button variant="outline">
        Continue
        <x-ux::icon name="arrow-right" data-icon="inline-end" />
    </x-ux::button>
</div>
```

## Inline position

Use `data-icon="inline-start"` or `data-icon="inline-end"` when a Laravel UX UI component supports those hooks.
This allows the parent to adjust its padding without physical margin utilities.

```blade
<x-ux::badge>
    <x-ux::icon name="badge-check" data-icon="inline-start" />
    Verified
</x-ux::badge>
```

## Icon-only buttons

Match the button size to nearby controls and label the button itself.

```blade
<x-ux::button variant="ghost" size="icon-sm" aria-label="Open settings">
    <x-ux::icon name="settings-2" />
</x-ux::button>
```

## Loading indicators

Use the dedicated `x-ux::spinner` component for loading states rather than manually animating a loader icon.

```blade
<x-ux::button disabled>
    <x-ux::spinner />
    Saving
</x-ux::button>
```
