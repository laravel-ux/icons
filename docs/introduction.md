# Introduction

Laravel UX Icons brings the Lucide icon set to Blade and Livewire through one small, consistent component.

```blade preview
<div class="flex flex-wrap items-center justify-center gap-6">
    <x-ux::icon name="search" />
    <x-ux::icon name="bell" />
    <x-ux::icon name="settings-2" />
    <x-ux::icon name="circle-check" />
    <x-ux::icon name="arrow-up-right" />
</div>
```

## Why use the package?

The package registers a versioned Lucide icon set with Blade UI Kit Icons and exposes it through `x-ux::icon`.
You get predictable names, attribute forwarding, and the same icon API across Laravel UX packages.

- Use icons directly in Blade and Livewire views.
- Keep icon names and SVG geometry in sync with a bundled Lucide release.
- Style icons with Tailwind utilities or explicit dimensions.
- Compose icons with Laravel UX UI components.
- Give supported coding agents package-specific guidance through Laravel Boost.

## Basic usage

Pass the Lucide filename to `name` without the `.svg` extension or `lucide-` prefix.

```blade
<x-ux::icon name="search" />
```

The component resolves this to the bundled `search.svg` icon and renders the SVG inline.

## Bundled version

The exact upstream Lucide release is stored in the package's `LUCIDE_VERSION` file. Keeping the version with the
package makes icon availability predictable across environments.
