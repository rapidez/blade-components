{{--
Read more/less component, JS used for checking if content overflows line-clamp container and to show or
hide the more/less buttons.

## Notes
- **Clamping** The default of line-clamp-5 is used.
- **Buttons** You can't use <button> tags inside the slots because it's wrapped by a <label>. Simply use a <span> tag.
- **Invisible** The read more/less buttons are shown/hidden with visible/invisible property. This prevents layout shifting

## Slots
- `more` Change the clickable element that reveals the content.
- `less` Change the clickable element that collapses the content.
- `wrapper` If you want to show it "inline" use the slot.

## Example
```
<x-rapidez::readmore>
    Content
</x-rapidez::readmore>
```

## Changing the line-clamp quantity and using custom read more/less buttons
Keep in mind that you add the data-read-more data-read-less on the overwritten button
```
<x-rapidez::readmore>
    <x-slot:slot class="line-clamp-3">
        Content
    </x-slot:slot>
    <x-slot:more>
        Custom read more button
    </x-slot:more>
    <x-slot:less>
        Custom read less button
    </x-slot:less>
</x-rapidez::readmore>
```

## Inline variant
In some cases you may want to show the more/less buttons behind the text instead of below the text.
Add the classes `flex items-baseline` on the slot `wrapper`. Override the slot `less` by adding an empty <span></span> in it.
Move the read less button inside the default slot.
```
<x-rapidez::readmore>
    <x-slot:wrapper class="flex items-baseline">
        <x-slot:slot class="line-clamp-1 break-all">
            Content
            <span data-read-less class="hidden invisible cursor-pointer items-center gap-1 whitespace-nowrap text-primary hover:underline">
                @lang('Read less')
                <x-heroicon-o-chevron-up class="size-3.5 mt-px" stroke-width="2" />
            </span>
        </x-slot:slot>
        <x-slot:less><span></span></x-slot:less>
    </x-slot:wrapper>
</x-rapidez::readmore>
```
--}}
@slots(['more', 'less', 'wrapper'])
<div {{ $attributes->twMerge('read-more-component') }}>
    <div {{ $wrapper->attributes->twMerge('contents') }}>
        <div {{ $slot->attributes->twMerge('content line-clamp-5 mb-2') }}>
            {{ $slot }}
        </div>
        @slotdefault('more')
            <span data-read-more class="invisible flex cursor-pointer items-center gap-1 whitespace-nowrap text-primary hover:underline">
                @lang('Read more')
                <x-heroicon-o-chevron-down class="size-3.5 mt-px" stroke-width="2" />
            </span>
        @endslotdefault

        @slotdefault('less')
            <span data-read-less class="hidden invisible cursor-pointer items-center gap-1 whitespace-nowrap text-primary hover:underline">
                @lang('Read less')
                <x-heroicon-o-chevron-up class="size-3.5 mt-px" stroke-width="2" />
            </span>
        @endslotdefault
    </div>
</div>

@pushOnce('foot')
<script>
function checkReadMore() {
    document.querySelectorAll('.read-more-component').forEach(container => {
        const content = container.querySelector('.content');
        const readMoreBtn = container.querySelector('[data-read-more]');
        const readLessBtn = container.querySelector('[data-read-less]');
        const needsReadMore = content.scrollHeight > content.clientHeight;

        if (!content.dataset.originalClasses) {
            const lineClampMatch = content.className.match(/line-clamp-\d+/);
            content.dataset.originalClasses = lineClampMatch ? lineClampMatch[0] : 'line-clamp-5';
        }

        readMoreBtn.classList.toggle('invisible', !needsReadMore);
        readLessBtn.classList.add('invisible');

        readMoreBtn.addEventListener("click", () => {
            content.className = content.className.replace(/line-clamp-\d+/g, '');
            readMoreBtn.style.display = "none";
            readLessBtn.classList.remove('invisible')
            readLessBtn.style.display = "inline-flex";
        });

        readLessBtn.addEventListener("click", () => {
            content.className = content.className.replace(/line-clamp-\d+/g, '');
            content.classList.add(content.dataset.originalClasses);
            readMoreBtn.style.display = "inline-flex";
            readLessBtn.style.display = "none";
        });
    });
}

// TODO: Maybe add some debouncing while resizing?
window.addEventListener('resize', checkReadMore)
window.addEventListener('load', checkReadMore)
document.addEventListener('turbo:load', checkReadMore)
</script>
@endPushOnce
