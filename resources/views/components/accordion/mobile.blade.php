{{--
This mobile version only collapses on mobile, on desktop it's always open.

## Example
```
<x-rapidez::accordion.mobile>
    <x-slot:label>
        Title
    </x-slot:label>
    <x-slot:content>
        Content
    </x-slot:content>
</x-rapidez::accordion.mobile>
```
--}}

<x-rapidez::accordion :attributes="$attributes->twMerge('md:details-content:[content-visibility:visible] md:details-content:h-auto')">
    <x-slot:label :attributes="$label->attributes->twMerge('md:cursor-auto md:pointer-events-none')">
        {{ $label }}
    </x-slot:label>
    <x-slot:content :attributes="$content->attributes->twMerge('pb-5')">
        {{ $content }}
    </x-slot:content>
</x-rapidez::accordion>
<div class="hidden firefox-only">
    {{ $content }}
</div>
