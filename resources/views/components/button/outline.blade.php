{{--
This is an outline button so it doesn't need a background and only need a border.
Example:

```
<x-rapidez::button.outline>Something</x-rapidez::button.outline>
```
--}}
<x-rapidez::button.base {{ $attributes->twMerge('bg-transparent border text-default hover:border-emphasis') }}>
    {{ $slot }}
</x-rapidez::button.base>