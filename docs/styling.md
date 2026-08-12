# Styling

Icons inherit their color from the surrounding text and accept standard Tailwind utilities through `class`.

```blade preview
<div class="flex items-center gap-5">
    <x-ux::icon name="heart" class="size-4 text-muted-foreground" />
    <x-ux::icon name="heart" class="size-6 text-foreground" />
    <x-ux::icon name="heart" class="size-8 text-destructive" />
</div>
```

## Size with classes

Use a `size-*` class when dimensions belong to the surrounding interface.

```blade
<x-ux::icon name="search" class="size-4" />
<x-ux::icon name="search" class="size-5" />
<x-ux::icon name="search" class="size-6" />
```

## Size with the prop

Use `size` when explicit SVG dimensions are part of the component contract.

```blade
<x-ux::icon name="settings-2" :size="20" />
```

## Color

Bundled icons use `currentColor`, so text color utilities apply without modifying the SVG.

```blade
<x-ux::icon name="circle-alert" class="text-destructive" />
```

Avoid hardcoded SVG fill or stroke attributes unless the design deliberately requires them.

## Motion

Utilities can animate state changes while the icon remains a stateless Blade component.

```blade
<x-ux::icon
    name="chevron-down"
    class="size-4 transition-transform group-aria-expanded:rotate-180"
/>
```
