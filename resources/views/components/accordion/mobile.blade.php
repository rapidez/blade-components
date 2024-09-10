{{--
This is a responsive version of the accordion component.

Responsive behavior adjustments:
    - The `label` slot applies `md:cursor-auto`,
      making it non-clickable on larger screens,

    - The `content` slot uses `md:grid-rows-[1fr]`
      to collapse the content on smaller screens,
      overriding the default `grid-rows-[0fr]`.

These changes ensure that the accordion functions only as an accordion on smaller screens.

TODO: implement attribute merging on label and slot

--}}

<x-rapidez::accordion :$attributes>
    <x-slot:label class="md:cursor-auto">
        {{ $label }}
    </x-slot:label>
    <x-slot:content class="md:grid-rows-[1fr]">
        {{ $content }}
    </x-slot:content>
</x-rapidez::accordion>
