{{--
No-js slideover component by making use of the amazing popover html functionality.

## Properties
- `position`      Position of the slideover. Can be `left` or `right`. Defaults to `left`

## HTML Class
Add this class to prevent scrolling when popover is open:
```html
<html class="has-[:popover-open]:overflow-clip">
```

## Examples
Basic usage:
```blade
<button popovertarget="example">
    Open slideover
</button>

<x-slideover id="example">
    <x-slideover.header>
        Title
        <x-slideover.close popovertarget="example" />
    </x-slideover.header>
    <x-slideover.content>
        Content
    </x-slideover.content>
    <x-slideover.footer>
        Footer
    </x-slideover.footer>
</x-slideover>
```

Right-positioned slideover:
```blade
<x-rapidez::slideover id="example" position="right">
```

Nested slideovers (inside <x-slideover.content):
```blade
<button popovertarget="nested">
    Bikes
</button>

<x-slideover id="nested" class="backdrop:hidden">
    <x-slideover.header>
        <x-slideover.back popovertarget="nested" />
        Parent title
        <x-slideover.close popovertarget="example" />
    </x-slideover.header>
    <x-slideover.content>
        Parent content
    </x-slideover.content>
</x-slideover>
```

--}}
@props(['position' => 'left'])

<div
    popover
    {{ $attributes
        ->twMerge('h-screen w-full max-w-lg shadow-xl z-slideover text open:flex flex-col overscroll-none duration-500 backdrop:bg-backdrop backdrop:opacity-0 starting:open:backdrop:opacity-0 open:backdrop:opacity-100 backdrop:transition-opacity backdrop:transition-discrete backdrop:duration-700 transition-all transition-discrete transform-gpu')
        ->class([
            '-translate-x-full starting:open:[transform:translateX(-100%)] open:translate-x-0' => $position === 'left',
            'translate-x-full starting:open:[transform:translateX(100%)] open:translate-x-0 ml-auto' => $position === 'right',
        ]) 
    }}
>
    {{ $slot }}
</div>
