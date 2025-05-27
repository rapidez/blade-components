{{--
This mobile version only collapses on mobile, on desktop it's always open.

## Example
```
<x-rapidez::accordion.mobile>
    <x-slot:summary>
        Title
    </x-slot:summary>
    <x-slot:content>
        Content
    </x-slot:content>
</x-rapidez::accordion.mobile>
```
--}}

<x-rapidez::accordion :attributes="$attributes->twMerge('md:details-content:[content-visibility:visible] md:details-content:h-auto')">
    <x-slot:summary :attributes="$summary->attributes->twMerge('md:cursor-auto')">
        {{ $summary }}
    </x-slot:summary>
    <x-slot:content>
        {{ $content }}
    </x-slot:content>
</x-rapidez::accordion>
