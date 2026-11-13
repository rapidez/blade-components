{{--
Show more/less component using a native `<details>`/`<summary>` as toggle state. Hides every item after the `visible-items` amount.

## Notes
- **Buttons** You can't use <button tags inside the slots because they're wrapped by a <summary. Simply use a <span tag.
- **Items** Every direct child of the slot counts as an item. Nested items can be targeted with the `handle` class.
- **Styling** The CSS is pushed once per `visible-items`/`handle` combination to the `foot` stack, so make sure your layout has a `@stack('foot')`.

## Props
- `visible-items` Amount of items that are visible when collapsed. Default: 5
- `handle` Class name of nested items that should be counted. Default: `show-more-item`

## Slots
- `more` Change the clickable element that reveals the items.
- `less` Change the clickable element that collapses the items.

## Example
```
<x-rapidez::showmore>
    <div>Item 1</div>
    <div>Item 2</div>
    ...
</x-rapidez::showmore>
```

## Changing the visible items and using custom show more/less buttons
```
<x-rapidez::showmore :visible-items="3">
    <div>Item 1</div>
    <div>Item 2</div>
    ...
    <x-slot:more>
        <span>Custom show more button</span>
    </x-slot:more>
    <x-slot:less>
        <span>Custom show less button</span>
    </x-slot:less>
</x-rapidez::showmore>
```

## Nested items using the handle
```
<x-rapidez::showmore handle="filter-option">
    <ul>
        <li class="filter-option">Option 1</li>
        <li class="filter-option">Option 2</li>
        ...
    </ul>
</x-rapidez::showmore>
```
--}}
@slots(['more', 'less'])
@props(['visibleItems' => 5, 'handle' => 'show-more-item'])

<div {{ $attributes->twMerge('show-more-component show-more-' . $visibleItems) }}>
    <div {{ $slot->attributes->twMerge('content mb-2') }}>
        {{ $slot }}
    </div>

    <details class="group/details">
        <summary class="inline-flex list-none cursor-pointer [&::-webkit-details-marker]:hidden">
            <span {{ $more->attributes->twMerge('inline-flex group-open/details:hidden') }}>
                @slotdefault('more')
                    <x-rapidez::button.link tag="span">
                        @lang('Show more')
                    </x-rapidez::button.link>
                @endslotdefault
            </span>
            <span {{ $less->attributes->twMerge('hidden group-open/details:inline-flex') }}>
                @slotdefault('less')
                    <x-rapidez::button.link tag="span">
                        @lang('Show less')
                    </x-rapidez::button.link>
                @endslotdefault
            </span>
        </summary>
    </details>
</div>

@pushOnce('foot', 'show-more-' . $visibleItems . '-' . $handle)
<style>
    .show-more-{{ $visibleItems }}:not(:has(> details[open])) > .content > :nth-child(n+{{ $visibleItems + 1 }}),
    .show-more-{{ $visibleItems }}:not(:has(> details[open])) > .content .{{ $handle }}:nth-child(n+{{ $visibleItems + 1 }}) {
        display: none;
    }
</style>
@endPushOnce