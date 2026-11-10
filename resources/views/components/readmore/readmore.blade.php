{{-- 
Read more/less component using a native `<details>`/`<summary>` as toggle state. Only uses JS for checking if content overflows line-clamp container.

## Notes
- **Buttons** You can't use <button tags inside the slots because they're wrapped by a <summary. Simply use a <span tag.
- **Invisible** The read more/less buttons are shown/hidden with visible/invisible property. This prevents layout shifting
- **Clamping** The default of line-clamp-5 is used.

## Slots
- `more` Change the clickable element that reveals the content.
- `less` Change the clickable element that collapses the content.

## Example
```
<x-rapidez::readmore>
    Content
</x-rapidez::readmore>
```

## Changing the line-clamp quantity and using custom read more/less buttons
```
<x-rapidez::readmore>
    <x-slot:slot class="line-clamp-3">
        Content
    </x-slot:slot>
    <x-slot:more>
        <span>Custom read more button</span>
    </x-slot:more>
    <x-slot:less>
        <span>Custom read less button</span>
    </x-slot:less>
</x-rapidez::readmore>
``` --}}

@slots(['more', 'less'])
<div {{ $attributes->twMerge('read-more-component group/read-more') }}>
    <div {{ $slot->attributes->twMerge('content line-clamp-5 group-has-open/read-more:line-clamp-none mb-2') }}>
        {{ $slot }}
    </div>
    
    <details class="invisible">
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

@pushOnce('foot')
<script>
function checkReadMore() {
    document.querySelectorAll('.read-more-component').forEach(container => {
        const content = container.querySelector('.content');
        const details = container.querySelector('details');
        if (!details || details.open) return;
        details.classList.toggle('invisible', content.scrollHeight <= content.clientHeight);
    });
}

// TODO: Maybe add some debouncing while resizing?
window.addEventListener('resize', checkReadMore)
window.addEventListener('load', checkReadMore)
document.addEventListener('turbo:load', checkReadMore)
</script>
@endPushOnce
