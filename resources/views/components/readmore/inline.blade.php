{{--
Read more/less component using the Tailwind CSS `peer` utility.

## Notes
- **Clamping** The default of line-clamp-1 is used. It is recommended that you keep it line-clamp-1
- **Buttons** You can't use <button tags inside the slots because it's wrapped by a <label. Simply use a <span tag.
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
<div {{ $attributes->twMerge('read-more-component group') }}>
    <input id="toggle" type="checkbox" class="hidden peer">
    <div class="group flex mb-2">
        <p {{ $slot->attributes->twMerge('content line-clamp-1 group-peer-checked:flex group-peer-checked:line-clamp-none') }}>
            <span>
                {{ $slot }}
                @slotdefault('less')
                    <label for="toggle" class="shrink-0">
                        <span class="hover:underline cursor-pointer inline items-center gap-1 text-primary">
                            @lang('Read less')
                        </span>
                    </label>
                @endslotdefault
            </span>
        </p>
        <label for="toggle" class="shrink-0">
            <span {{ $more->attributes->twMerge('inline-flex group-peer-checked:hidden') }}>
                @slotdefault('more')
                    <span class="hover:underline cursor-pointer flex items-center gap-1 text-primary">
                        @lang('Read more')
                    </span>
                @endslotdefault
            </span>
        </label>
    </div>
</div>