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

<x-rapidez::slideover id="example">
    <x-rapidez::slideover.header>
        Title
        <x-rapidez::slideover.close popovertarget="example" />
    </x-rapidez::slideover.header>
    <x-rapidez::slideover.content>
        Content
    </x-rapidez::slideover.content>
    <x-rapidez::slideover.footer>
        Footer
    </x-rapidez::slideover.footer>
</x-rapidez::slideover>
```

Right-positioned slideover:
```blade
<x-rapidez::slideover id="example" position="right">
```

Nested slideovers (inside <x-rapidez::slideover.content>):
```blade
<button popovertarget="nested">
    Open nested slideover
</button>

<x-rapidez::slideover id="nested" class="backdrop:hidden">
    <x-rapidez::slideover.header>
        <x-rapidez::slideover.back popovertarget="nested" />
        Parent title
        <x-rapidez::slideover.close popovertarget="example" />
    </x-rapidez::slideover.header>
    <x-rapidez::slideover.content>
        Parent content
    </x-rapidez::slideover.content>
</x-rapidez::slideover>
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
