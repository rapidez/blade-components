{{--
No-js modal component by making use of the amazing dialog or popover html functionality.

## HTML Class
Add this class to prevent scrolling when popover/dialog is open:
```html
<html class="has-[:is([popover]:popover-open,dialog[open])]:overflow-clip">
```

## Choose between a dialog or popover
```blade
<button commandfor="example" command="show-modal">
    Open modal as dialog
</button>

<button popovertarget="example" popovertargetaction="show">
    Open modal as popover
</button>
```

## Examples
Basic usage:
```blade
<button commandfor="example" command="show-modal">
    Open modal
</button>

<x-rapidez::modal id="example" closedby="any">
    <x-rapidez::modal.header>
        Title
        <x-rapidez::modal.close commandfor="example" command="close" />
    </x-rapidez::modal.header>
    <x-rapidez::modal.content>
        Content
    </x-rapidez::modal.content>
    <x-rapidez::modal.footer>
        Footer
    </x-rapidez::modal.footer>
</x-rapidez::modal>
```

Positioned modal (center, top, top-right, right, bottom-right, bottom, bottom-left, left, top-left):
```blade
<x-rapidez::modal id="example" position="top-right">
```

--}}

@props(['position' => 'center'])

@php
    $positionClasses = match ($position) {
        'top' => 'mx-auto mb-auto origin-top',
        'top-right' => 'ml-auto mb-auto origin-top-right',
        'right' => 'ml-auto my-auto origin-right',
        'bottom-right' => 'ml-auto mt-auto origin-bottom-right',
        'bottom' => 'mx-auto mt-auto origin-bottom',
        'bottom-left' => 'mr-auto mt-auto origin-bottom-left',
        'left' => 'mr-auto my-auto origin-left',
        'top-left' => 'mr-auto mb-auto origin-top-left',
        default => 'm-auto',
    };
@endphp

<dialog {{ $attributes
    ->merge(['popover' => ''])
    ->twMerge($positionClasses . ' w-[calc(100%-2rem)] max-h-[calc(100dvh-2rem)] max-w-xl inset-4 shadow-2xl rounded-2xl z-modal text open:flex flex-col overflow-hidden duration-300 ease-in-out open:ease-in-out backdrop:bg-backdrop backdrop:opacity-0 starting:open:backdrop:opacity-0 open:backdrop:opacity-100 backdrop:transition-opacity backdrop:transition-discrete backdrop:duration-300 transition-all transition-discrete opacity-0 starting:open:opacity-0 open:opacity-100 [transform:scale(0.95)] open:transform-none starting:open:[transform:scale(0.95)]')
}}>
    {{ $slot }}

    {{-- Safari - Close modal when clicking outside of the modal. This already works by default on chrome and firefox --}}
    @if ($attributes->get('closedby') === 'any')
        <form method="dialog" class="contents">
            <button tabindex="-1" aria-hidden="true" class="fixed inset-0 -z-10 cursor-default"></button>
        </form>
    @endif
</dialog>