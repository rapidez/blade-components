# Rapidez blade components

`rapidez/blade-components` provides Tailwind-styled Blade components with the `x-rapidez::` prefix. The core idea is one starting point and one place for the styling: use these components instead of writing your own markup for the same thing, so a change in the look happens in one place.

## How to use a component

- List the components in `vendor/rapidez/blade-components/resources/views/components/` and use an existing one before writing your own markup. If none fits, ask before creating a new one.
- Read the comment at the top of every component you use. It describes the purpose, props, slots, requirements and examples, and is the source of truth. A part without a comment (like a header or footer) is documented in its parent component.
- Check for an override in `resources/views/vendor/rapidez/components/` first; it replaces the package version.
- Check the package `README.md` for the project setup (CSS, Blade stacks, classes on `<html>`) when the components are used for the first time.

## Conventions

- Most components are index components: `button/button.blade.php` is `<x-rapidez::button>`, `button/primary.blade.php` is `<x-rapidez::button.primary>`.
- A `base` component holds the shared styling; use a variant, not `base` directly. A new style from a design becomes a new variant built on `base`.
- Classes on a call are merged with Tailwind Merge. Use them for layout (width, margin, order), not to restyle a component.
- Use the color token utilities from the package CSS (like `bg-primary text-primary-text`, `text-muted`), never hardcoded colors or the underlying CSS variables.
- Icon-only buttons get an `aria-label`.

## Changing components

- Publish the views with `php artisan vendor:publish --tag=rapidez-blade-components-views` and only keep the files you changed, so updates to the others still come through.
- Never change files in `vendor/`.
- Change the look in the override, not with classes on every use.
- Keep the props, slots and structure of the original, and update the comment at the top when you change the behavior.
