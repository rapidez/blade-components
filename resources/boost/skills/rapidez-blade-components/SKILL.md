---
name: rapidez-blade-components
description: Use and adapt the Rapidez blade components (buttons, input, checkbox, radio, select, textarea, label, prose, accordion, slideover, read more, tag). ALWAYS use this skill when building buttons, forms, collapsible content, slideovers, read more toggles or other UI elements in Blade, or when these components must match a design, even if "Rapidez" is not mentioned.
---

# Rapidez blade components

`rapidez/blade-components` provides Tailwind-styled Blade components with centralized styling. They do not require Rapidez and can be used in any Laravel project. All components use the prefix `x-rapidez::`.

The idea is one starting point and one place for the styling. Use these components instead of writing your own buttons, inputs or accordions, so a change in the look happens in one place and applies everywhere.

## Before you start

1. The components are in `vendor/rapidez/blade-components/resources/views/components/`. Read the comment at the top of every component you use; it contains usage and examples.
2. Check which components the project has overridden in `resources/views/vendor/rapidez/components/`. An override replaces the package version.
3. To see all components at once, the package has a preview page. Register it temporarily with `Route::view('components', 'rapidez::components-preview');` and visit `/components`.
4. If no component fits, ask before creating a new one.

## Structure

Most components are anonymous index components: the default lives in a folder with the same name, and variants live next to it.

```
button/button.blade.php     → <x-rapidez::button>
button/primary.blade.php    → <x-rapidez::button.primary>
input/checkbox/base.blade.php → <x-rapidez::input.checkbox.base>
```

Classes passed on a call are merged with Tailwind Merge, so they override the defaults. Use that for layout (width, margin, order), not to restyle a component.

## Buttons

| Component | Purpose |
|---|---|
| `button.tag` | Chooses the element; no styling |
| `button.base` | Shared styling of all buttons (layout, padding, height, radius, transition, disabled state); do not use directly |
| `button` | Default, neutral button |
| `button.primary`, `button.secondary` | Brand buttons |
| `button.outline` | Border, no background |
| `button.conversion` | Conversion actions only (e.g. add to cart, checkout) |
| `button.link` | Looks like a link: no background, no padding |
| `button.slider` | Round icon button for slider navigation |

- The element follows the attributes: `href` renders an `<a>`, `for` renders a `<label>`, otherwise a `<button>`. Force an element with `tag`, e.g. `tag="span"` inside a label or link, where a nested button is not allowed.
- Variants only add colors. Change shared styling in `button.base`, colors in the variant.
- A new button style from the design becomes a new variant next to the others, built on `button.base`, so all buttons stay together.
- A button with only an icon needs an `aria-label`.

```blade
<x-rapidez::button.primary href="/contact">Contact</x-rapidez::button.primary>
<x-rapidez::button.conversion type="submit">@lang('Add to cart')</x-rapidez::button.conversion>
<x-rapidez::button.slider :aria-label="__('Next')">…</x-rapidez::button.slider>
```

## Forms

There is no combined input + label component, because attributes cannot be split reliably between the two. Wrap the label and the field in a `<label>`; then no `for` and `id` are needed.

- `x-rapidez::label` is a styled `<span>`. It adds an asterisk automatically when the field is `required`; hide it with `class="after:hidden"`.
- `x-rapidez::input`, `x-rapidez::input.textarea` and `x-rapidez::input.select` are the fields themselves. All attributes go to the field.
- Checkbox and radio do include their label: the slot is the label text, all attributes go to the input. Use `.base` for the input without a label.
- Invalid fields get a red border after the user has interacted with them (`:user-invalid`).
- In Vue, put a condition on a `<template>` around a checkbox or radio (`<template v-if="…">`), not on the component itself, because the component renders a `<label>` around the input.

```blade
<label>
    <x-rapidez::label>@lang('Email')</x-rapidez::label>
    <x-rapidez::input type="email" name="email" required />
</label>

<label>
    <x-rapidez::label>@lang('Country')</x-rapidez::label>
    <x-rapidez::input.select name="country">
        <option value="nl">@lang('Netherlands')</option>
    </x-rapidez::input.select>
</label>

<x-rapidez::input.checkbox name="newsletter">
    @lang('Subscribe to the newsletter')
</x-rapidez::input.checkbox>
```

## Accordion

Built on `<details>` and `<summary>`, so it works without JavaScript. Slots: `label` (the clickable title), `content` and `icon` (default: a chevron that rotates when open). Attributes on the component go to `<details>`; slot attributes go to the title and content elements.

- Add `open` to open it initially.
- The `name` attribute is the HTML `<details name>` attribute: all accordions with the same name on a page form one group in which only one can be open. Use a name that is unique for that group, otherwise unrelated accordions on the same page close each other.

```blade
<x-rapidez::accordion name="product-faq" open>
    <x-slot:label>@lang('Shipping')</x-slot:label>
    <x-slot:content>…</x-slot:content>
</x-rapidez::accordion>
```

`accordion.mobile` only collapses on mobile and is always open from `md`. It uses a hidden checkbox instead of `<details>`. Props: `id`, `type` (`checkbox`, or `radio` so only one per `name` is open), `name` and `opened`. Slots: `label` and `content`.

## Slideover

Works without JavaScript, using a `<dialog>`. Open it with a button using `commandfor` (the slideover's `id`) and `command="show-modal"`; close it with `command="close"`. A popover variant is available with `popovertarget`.

| Part | Purpose |
|---|---|
| `slideover` | The dialog. Prop `position`: `left` (default) or `right`. `closedby="any"` closes it on Escape and a click on the backdrop |
| `slideover.header` | Title bar |
| `slideover.content` | Scrollable content |
| `slideover.footer` | Actions at the bottom |
| `slideover.close`, `slideover.back` | Icon buttons; always add an `aria-label` |

```blade
<button commandfor="filters" command="show-modal">@lang('Filters')</button>

<x-rapidez::slideover id="filters" position="right" closedby="any">
    <x-rapidez::slideover.header>
        @lang('Filters')
        <x-rapidez::slideover.close commandfor="filters" command="close" :aria-label="__('Close')" />
    </x-rapidez::slideover.header>
    <x-rapidez::slideover.content>…</x-rapidez::slideover.content>
    <x-rapidez::slideover.footer>…</x-rapidez::slideover.footer>
</x-rapidez::slideover>
```

- **Nested**: place the second slideover inside the content of the first, add `class="backdrop:hidden"`, and use `slideover.back` to return.
- **`slideover.mobile`**: a slideover on mobile, inline content from `lg`. Use `slideover.mobile.header`, `.content` and `.footer`, and hide the trigger from `lg` with `lg:hidden`.

## Read more

`x-rapidez::readmore` clamps content at 5 lines and shows a toggle only when the content is longer. Change the number of lines with a class on the default slot.

```blade
<x-rapidez::readmore>
    <x-slot:slot class="line-clamp-3">…</x-slot:slot>
</x-rapidez::readmore>
```

- Slots `more` and `less` replace the toggles. Use a `<span>` in them (or `button.link` with `tag="span"`), never a `<button>`, because they are inside a `<label>`.
- `readmore.inline` is for a single line of plain text, not rich text.

## Prose

`x-rapidez::prose` renders text from a CMS or editor with consistent typography. It applies a single class, `prose-custom`, so the DOM stays small when it is used many times on a page, and all typography lives in one place. Never add typography classes on every use.

<!-- TODO: where projects define or override prose-custom (open decision about CSS in packages) -->

## Tag

`x-rapidez::tag` renders any element, like a dynamic component: `<x-rapidez::tag is="span">` renders a `<span>`. Use it when the element depends on a condition.

## Colors

The components use color tokens inspired by GitHub Primer, defined with default values in the package CSS. Brand colors come in pairs (`bg-primary text-primary-text`), neutral colors in a scale (`text-emphasis`, `text`, `text-muted`; `bg-emphasis`, `bg`, `bg-muted`; `border-emphasis`, `border-default`, `border-muted`). Use the utilities, never the underlying variables (`text-muted`, not `text-foreground-muted`). Projects override the token values in their own `@theme`.

## Requirements in the project

Check these when the components are used for the first time in a project:

- **CSS**: Tailwind 4 with the `@tailwindcss/forms` and `@tailwindcss/typography` plugins, the package's `package.css` imported, and an `@source` for the package views. `readmore.inline` also needs the `@tushargugnani/tailwind-group-peer-checked` plugin.
- **Read more**: the layout needs `@stack('foot')` before `</body>`; the component pushes its script there.
- **Slideover**: the `<html>` element needs `class="has-[:is([popover]:popover-open,dialog[open])]:overflow-clip"` to prevent scrolling while a slideover is open. For older browsers, add the `invokers-polyfill` npm package, and the package's `resources/js/polyfill.js` when the popover variant is used.

## Changing components

Overrides live in `resources/views/vendor/rapidez/components/`, in the same path as in the package. Publish all views with:

```bash
php artisan vendor:publish --tag=rapidez-blade-components-views
```

- Only keep the files you actually changed, so updates to the others still come through.
- Never change files inside `vendor/`; they are replaced on update.
- Change the look in the override, not with classes on every use, so the component looks identical everywhere.
- Keep the props, slots and structure of the original, so everything built on the component keeps working.
- In Rapidez projects, `resources/views/vendor/rapidez/` also contains overrides of Rapidez core views; only touch the `components/` you need.

## Hard rules

1. **Use these components** for buttons, form fields, accordions, slideovers, read more and prose. One place to change the look.
2. **Buttons through variants**, never `button.base` directly; new styles become new variants.
3. **Never change `vendor/`.** Override in `resources/views/vendor/rapidez/components/`.
4. **Keep props, slots and structure** in overrides.
5. **Unique `name` per accordion group.**
6. **Icon-only buttons get an `aria-label`**, including slideover close and back, and slider buttons.

## Checklist before delivery

- [ ] Existing components used; no custom buttons, inputs or accordions
- [ ] Buttons use a variant; `conversion` only for conversion actions
- [ ] Fields wrapped in a `<label>` with `x-rapidez::label`
- [ ] Accordion groups have a unique `name`
- [ ] Icon-only buttons have an `aria-label`
- [ ] Slideover: scroll-lock class on `<html>`; close buttons use `command="close"`
- [ ] Read more: `@stack('foot')` present; no `<button>` in the `more` and `less` slots
- [ ] Design changes made in overrides, not in `vendor/` or on every use
