{{--
The muted button is a variant used for basic use cases.
Example:

```
<x-rapidez::button.conversion>Something</x-rapidez::button.conversion>
```
--}}
<x-rapidez::button {{ $attributes->twMerge('bg text-muted hover:text hover:bg-emphasis border-b border-b-black/10') }}>
    {{ $slot }}
</x-rapidez::button>