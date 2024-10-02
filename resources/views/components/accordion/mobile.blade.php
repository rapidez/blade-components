{{--
This mobile version only collapses on mobile, on desktop it's always open.

## Example
```
<x-rapidez::accordion.mobile>
    <x-slot:label>
        Label
    </x-slot:label>
    <x-slot:content>
        Content
    </x-slot:content>
</x-rapidez::accordion.mobile>
```
--}}

<x-rapidez::accordion :$attributes>
    <x-slot:label :attributes="$label->attributes->twMerge('md:cursor-auto')">
        {{ $label }}
    </x-slot:label>
    <x-slot:content :attributes="$content->attributes->twMerge('md:grid-rows-[1fr]')">
        {{ $content }}
    </x-slot:content>
</x-rapidez::accordion>
