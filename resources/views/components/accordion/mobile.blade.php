{{--
The responsive accordion version, only functions on smaller screens.

- `md:cursor-auto` overrides the cursor-pointer on larger screens.
- `md:grid-rows-[1fr]` to collapse the content on smaller screens.

## Example
```
<x-rapidez::mobile>
    <x-rapidez::accordion.label>
        Label
    </x-rapidez::accordion.label>
    <x-rapidez::accordion.content>
        Content
    </x-rapidez::accordion.content>
</x-rapidez::mobile>
```
--}}

<x-rapidez::accordion :$attributes>
    <x-slot:label class="md:cursor-auto">
        {{ $label }}
    </x-slot:label>
    <x-slot:content class="md:grid-rows-[1fr]">
        {{ $content }}
    </x-slot:content>
</x-rapidez::accordion>
