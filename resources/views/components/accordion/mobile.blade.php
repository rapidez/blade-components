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

Currently, the pseudo-selector ::details-content is not supported in Firefox. We use this pseudo-selector for the mobile accordion variant.
As a result, the section remains closed on mobile and is intended to be open on desktop using the CSS defined in resources/css/components/detail-summary.css.
However, because Firefox doesn’t support this pseudo-selector, the section will also remain closed on desktop in Firefox.
To address this, the div below will only be visible in Firefox so that content appears correctly on desktop. On mobile, nothing will change.
--}}

<x-rapidez::accordion :attributes="$attributes->twMerge('md:details-content:[content-visibility:visible] md:details-content:h-auto')">
    <x-slot:label :attributes="$label->attributes->twMerge('md:cursor-auto md:pointer-events-none')">
        {{ $label }}
    </x-slot:label>
    <x-slot:content :attributes="$content->attributes->twMerge('pb-5')">
        {{ $content }}
    </x-slot:content>
</x-rapidez::accordion>
<div class="max-md:hidden md:block details-content-unsupported-only">
    {{ $content }}
</div>
