{{--
No-js slideover component by making use of checkboxes and form reset logic for nested slideovers.

## Properties
- `has-parent`    Used for nested slideovers. Set to `true` when this slideover is a child of another slideover
- `id`            Unique identifier for the checkbox input. Required for the slideover toggle
- `open`          Default `false`, set to `true` to have it open initially
- `position`      Position of the slideover. Can be `left` or `right`. Defaults to `left`
- `tag`           Base tag of the slideover. Set to `form` for parent of nested slideover. Defaults to `div`
- `title`         Title displayed in the header. Can be provided as a slot or property

## Slots
- `headerbutton`  Custom button in the header instead of the default left arrow
- `title`         Alternative way to set the header title
- Default slot    Main content of the slideover

## Body Class
Add this class to prevent scrolling when slideover is open:
```html
<body class="has-[.slideover-checkbox:checked]:overflow-hidden">
```

## Nesting Slideovers
For nested slideovers:
1. Parent slideover must use `tag="form"`
2. Child slideovers must set `has-parent="true"`
3. Child slideovers should use default `tag="div"`

This setup enables form reset logic and ensures proper background overlay behavior.

## Examples
Basic usage:
```blade
<label for="my-slideover">
    Open Menu
</label>
<x-rapidez::slideover id="my-slideover" title="Menu">
    Content goes here
</x-rapidez::slideover>
```

Right-positioned slideover:
```blade
<label for="right-menu">
    Open Settings
</label>
<x-rapidez::slideover id="right-menu" position="right" title="Settings">
    Settings content
</x-rapidez::slideover>
```

Nested slideovers:
```blade
<label for="parent">
    Open Parent
</label>
<x-rapidez::slideover id="parent" tag="form" title="Parent">
    Parent content
    <label for="child">
        Open Child
    </label>
    <x-rapidez::slideover id="child" has-parent="true" title="Child">
        Child content
    </x-rapidez::slideover>
</x-rapidez::slideover>
```

--}}
@props(['id' => uniqid('slideover-'), 'title', 'hasParent' => false, 'position' => 'left', 'tag' => 'div', 'open' => false])
@slots(['title', 'headerbutton'])

@php
    $isInForm = $tag === 'form' || $hasParent;
    $closeId = $isInForm ? 'close-' . $id : $id;
@endphp

<x-rapidez::tag :is="$tag">
    <input id="{{ 'close-' . $id }}" class="hidden" type="reset">
    @if (!$hasParent)
        <input @checked($open) id="{{ $id }}" class="peer hidden slideover-checkbox" type="checkbox">
        <label
            for="{{ $closeId }}"
            class="pointer-events-none fixed inset-0 z-40 cursor-pointer bg-overlay/40 opacity-0 transition peer-checked:pointer-events-auto peer-checked:opacity-100"
        ></label>
    @else
        <input @checked($open) id="{{ $id }}" class="peer hidden" type="checkbox">
    @endif
    <div {{ $attributes->class([
        'fixed inset-y-0 transition-all bg-white z-40 flex flex-col max-w-md w-full',
        '-right-full peer-checked:right-0' => $position === 'right',
        '-left-full peer-checked:left-0' => $position === 'left',
    ]) }}>
        @include('rapidez::components.slideover.partials.header')
        <div class="slideover-wrapper flex flex-1 flex-col items-start overflow-y-auto">
            {{ $slot }}
        </div>
    </div>
</x-rapidez::tag>
