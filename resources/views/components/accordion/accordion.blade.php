{{--
Accordion component using `<details>` & `<summary>` HTML elements.

## Properties
- `icon`    Show the icon with this component default `true` set it to `false` to hide the default icon.
- `single`  Default `false`, set to `true` if you want only one accordion to be open at a time.
- `mobile`  Default `false`, set to `true` to have it open initially from 768px.

## Slots
- `summary` Defines the clickable title that toggles the accordion.
- `content` The collapsible section that appears when the accordion is opened.
- `icon`    The icon that is shown, by default this is a chevron that rotates when accordion is opened.

## Examples
Basic usage:
```
<x-rapidez::accordion>
    <x-slot:summary>
        Label
    </x-slot:summary>
    <x-slot:content>
        Content
    </x-slot:content>
</x-rapidez::accordion>
```

Without icon:
```
<x-rapidez::accordion :icon="false">
    <x-slot:summary>
        Label
    </x-slot:summary>
    <x-slot:content>
        Content
    </x-slot:content>
</x-rapidez::accordion>
```
--}}

@props(['icon', 'single' => false, 'mobile' => false])
@slots(['summary', 'content', 'icon'])

<details
    {{ $attributes->twMerge('group/details details-content:h-0 details-content:overflow-clip details-content:transition-[height,content-visibility] details-content:transition-discrete details-content:duration-200 open:details-content:h-auto') }}
    @if ($single)
        onclick="document.querySelectorAll('details').forEach(d => d !== this && d.removeAttribute('open'))"
    @endif
    @if ($mobile)
        data-mobile-accordion
    @endif
>
    <summary {{ $summary->attributes->twMerge('flex items-center font-medium py-3.5 cursor-pointer list-none') }}>
        {{ $summary }}

        @if ($icon)
            @slotdefault('icon')
                <x-heroicon-o-chevron-down class="ml-auto size-4 flex shrink-0 text-muted group-open/details:rotate-180 transition" stroke-width="2" />
            @endslotdefault
        @endif
    </summary>

    <div {{ $content->attributes->twMerge('pb-5') }}>
        {{ $content }}
    </div>
</details>

@pushOnce('foot')
<script>
if (window.innerWidth >= 768) {
    document.querySelectorAll('details[data-mobile-accordion]').forEach(d => d.setAttribute('open', ''));
}
</script>
@endPushOnce