## Laravel UX Icons

Laravel UX Icons provides Lucide SVG icons through Blade UI Kit Icons and the `x-ux::icon` Blade component.

### Core Usage

Use the package component in application Blade and Livewire markup:

```blade
&lt;x-ux::icon name="search" /&gt;
&lt;x-ux::icon name="arrow-right" class="size-4" /&gt;
```

### Rules

- Prefer the `x-ux::icon` component in application Blade and Livewire markup.
- Pass icon names without the `lucide-` prefix. The component adds that prefix internally.
- Icon names are kebab-case filenames from `resources/icons` without `.svg`.
- Size icons with either Tailwind classes, for example `class="size-4 shrink-0"`, or the `size` prop, for example `:size="20"`.
- Use classes when sizing should follow surrounding Tailwind UI patterns; use `size` when explicit SVG `width` and `height` attributes are clearer.
- Before using an uncommon icon, verify `resources/icons/{name}.svg` exists.
- Never pass unrestricted user input as the icon name. Map application state to known bundled names.
- Adding new SVG files is outside normal application implementation. Prefer existing Lucide icons unless explicitly maintaining this package.
- Direct `svg('lucide-name')` calls are acceptable for low-level package work, but should not be the default application style.
- Treat icons as decorative by default. For icon-only buttons or links, put the accessible label on the parent control, such as `aria-label="Open menu"`.
- Mirror only directional icons in RTL, for example `class="rtl:rotate-180"`; do not mirror non-directional symbols.
- If rendering fails with `Svg by name "..." from set "lucide" not found`, check the exact kebab-case filename first.
- In Laravel UX UI components, use `data-icon="inline-start"` or `data-icon="inline-end"` when the component supports those hooks; do not add physical margin utilities for icon spacing.
- Let a UI component apply its default SVG size unless a deliberate override is required.
- Match icon-only Button sizes with `icon-xs`, `icon-sm`, `icon`, or `icon-lg`, and put the accessible name on the Button.
- Do not add a replacement indicator or close icon when the UI component already renders one.
- Use `x-ux::spinner` for loading states instead of manually animating a loader icon.
- Do not add attributes to an icon unless they control required styling, state, or semantics.
