{{--
Read more/less component using the Tailwind CSS `peer` utility. Only used JS for checking if content overflows line-clamp container.
## Notes
- `Clamping`      The default of line-clamp-5 is used.
- `Buttons`       You can't use <button tags inside the slots because it's wrapped by a <label. Simply use a <span tag.
- `Invisible`     The read more/less buttons are shown/hidden with visible/invisible property. This prevents layout shifting

## Slots
- `more`          Change the clickable element that reveals the content.
- `less`          Change the clickable element that collapses the content.

## Example
```
<x-rapidez::read-more>
    Content
</x-rapidez::read-more>
```

## Changing the line-clamp quantity and using custom read more/less buttons
```
<x-rapidez::read-more> 
    <x-slot:slot class="line-clamp-3">
        Content
    </x-slot:slot>
    <x-slot:more>
        Custom read more button
    </x-slot:more>
    <x-slot:less>
        Custom read less button
    </x-slot:less>
</x-rapidez::read-more>
```
--}}
@slots(['more', 'less'])
<div {{ $attributes->twMerge('read-more-component group') }}>
    <div {{ $slot->attributes->twMerge('content line-clamp-5 group-has-[:checked]:line-clamp-none mb-2') }}>
        {{ $slot }}
    </div>
    <label class="invisible">
        <input type="checkbox" class="hidden peer">
        <span {{ $more->attributes->twMerge('inline-flex peer-checked:hidden') }}>
            @slotdefault('more')
                <span class="hover:underline cursor-pointer flex items-center gap-1 text-primary">
                    @lang('Read more')
                    <x-heroicon-o-chevron-down class="size-3.5 mt-px" stroke-width="2" />
                </span>
            @endslotdefault
        </span>
        <span {{ $less->attributes->twMerge('hidden peer-checked:inline-flex') }}>
            @slotdefault('less')
                <span class="hover:underline cursor-pointer flex items-center gap-1 text-primary">
                    @lang('Read less')
                    <x-heroicon-o-chevron-up class="size-3.5 mt-px" stroke-width="2" />
                </span>
            @endslotdefault
        </span>
    </label>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.read-more-component').forEach(container => {
            const content = container.querySelector('.content');
            const label = container.querySelector('label');
            label.classList.toggle('invisible', content.scrollHeight <= content.clientHeight);
        });
    });
</script>