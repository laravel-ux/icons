## Laravel UX Icons

Laravel UX Icons provides Lucide SVG icons through Blade UI Kit Icons and the `x-ux::icon` Blade component.

### Core Usage

Use the package component in application Blade and Livewire markup:

```blade
&lt;x-ux::icon name="github" /&gt;
&lt;x-ux::icon name="arrow-right" class="size-4" /&gt;
```

### Rules

- Prefer the `x-ux::icon` component in application Blade and Livewire markup.
- Pass icon names without the `lucide-` prefix. The component adds that prefix internally.
- Icon names are kebab-case filenames from `resources/icons` without `.svg`.
- Prefer Tailwind classes for sizing and alignment, for example `class="size-4 shrink-0"`.
- Use the `size` prop only when explicit SVG `width` and `height` attributes are required.
- Before using an uncommon icon, verify `resources/icons/{name}.svg` exists.
- Adding new SVG files is outside normal application implementation. Prefer existing Lucide icons unless explicitly maintaining this package.
- Direct `svg('lucide-name')` calls are acceptable for low-level package work, but should not be the default application style.
- Treat icons as decorative by default. For icon-only buttons or links, put the accessible label on the parent control, such as `aria-label="Open menu"`.
- If rendering fails with `Svg by name "..." from set "lucide" not found`, check the exact kebab-case filename first.
