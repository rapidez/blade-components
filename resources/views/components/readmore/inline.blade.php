{{--
Read more/less component using a native `<details>`/`<summary>` as toggle state.

## Notes
- **Clamping** The default of line-clamp-1 is used. It is recommended that you keep it line-clamp-1
- **Buttons** You can't use <button tags inside the slots because they're wrapped by a <summary. Simply use a <span tag.
- When using this component with a CMS like Statamic, don't use a bard but use a simple text field

## Slots
- `more` Change the clickable element that reveals the content.
- `less` Change the clickable element that collapses the content.

## Example
```
<x-rapidez::readmore.inline>
    Content
</x-rapidez::readmore.inline>
```

## Changing the read more/less buttons
```
<x-rapidez::readmore.inline>
    <x-slot:more>
        Custom read more button
    </x-slot:more>
    <x-slot:less>
        Custom read less button
    </x-slot:less>
</x-rapidez::readmore.inline>
```
--}}

@slots(['more', 'less'])
<div {{ $attributes->twMerge('read-more-component group/read-more flex gap-1 mb-2 has-open:block') }}>
    <div {{ $slot->attributes->twMerge('content line-clamp-1 group-has-open/read-more:line-clamp-none group-has-open/read-more:inline!') }}>
        {{ $slot }}
    </div>
    <details class="shrink-0 group-has-open/read-more:inline">
        <summary class="inline-flex list-none cursor-pointer [&::-webkit-details-marker]:hidden">
            <span {{ $more->attributes->twMerge('inline-flex group-has-open/read-more:hidden') }}>
                @slotdefault('more')
                    <x-rapidez::button.link tag="span">
                        @lang('Read more')
                        <x-heroicon-o-chevron-down class="size-3.5 mt-px stroke-2" />
                    </x-rapidez::button.link>
                @endslotdefault
            </span>
            <span {{ $less->attributes->twMerge('hidden group-has-open/read-more:inline-flex') }}>
                @slotdefault('less')
                    <x-rapidez::button.link tag="span">
                        @lang('Read less')
                        <x-heroicon-o-chevron-up class="size-3.5 mt-px stroke-2" />
                    </x-rapidez::button.link>
                @endslotdefault
            </span>
        </summary>
    </details>
</div>
