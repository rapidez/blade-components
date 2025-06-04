{{--
Accordion component using `<details>` & `<summary>` HTML elements.

## Slots
- `label`   Defines the clickable title that toggles the accordion.
- `content` The collapsible section that appears when the accordion is opened.
- `icon`    The icon that is shown, by default this is a chevron that rotates when accordion is opened.

## Examples
Basic usage:
```
<x-rapidez::accordion>
    <x-slot:label>
        Title
    </x-slot:label>
    <x-slot:content>
        Content
    </x-slot:content>
</x-rapidez::accordion>
```

Open one accordion at the time then add a name to the accordion:
```
<x-rapidez::accordion name="single">
    <x-slot:label>
        Title
    </x-slot:label>
    <x-slot:content>
        Content
    </x-slot:content>
</x-rapidez::accordion>
<x-rapidez::accordion name="single">
    <x-slot:label>
        Title
    </x-slot:label>
    <x-slot:content>
        Content
    </x-slot:content>
</x-rapidez::accordion>
```
--}}
@slots(['label', 'content', 'icon'])

<details
    {{ $attributes->twMerge('group/details details-content:h-0 details-content:overflow-clip details-content:transition-[height,content-visibility] details-content:transition-discrete details-content:duration-200 open:details-content:h-auto') }}
>
    <summary {{ $label->attributes->twMerge('flex items-center font-medium py-3.5 cursor-pointer list-none') }}>
        {{ $label }}

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
