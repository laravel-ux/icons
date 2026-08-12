# Using Icons

Use `x-ux::icon` in Blade and Livewire markup.

```blade preview
<div class="flex items-center gap-4">
    <x-ux::icon name="house" />
    <x-ux::icon name="inbox" />
    <x-ux::icon name="calendar" />
    <x-ux::icon name="settings-2" />
</div>
```

## Names

Icon names match the bundled Lucide filenames. Pass the kebab-case name without `.svg`.

```blade
<x-ux::icon name="arrow-right" />
<x-ux::icon name="circle-alert" />
<x-ux::icon name="file-code" />
```

Do not add the internal `lucide-` prefix.

```blade
{{-- Incorrect --}}
<x-ux::icon name="lucide-search" />

{{-- Correct --}}
<x-ux::icon name="search" />
```

## Attributes

Additional attributes are forwarded to the rendered SVG.

```blade
<x-ux::icon
    name="circle-check"
    class="size-5 text-emerald-600"
    aria-hidden="true"
/>
```

## API reference

| Prop                                              | Type          | Default |
|---------------------------------------------------|---------------|---------|
| `name*` [?The bundled Lucide icon filename.]      | `string`      | -       |
| `size` [?The SVG width and height attributes.]    | `int\|string` | `24`    |
