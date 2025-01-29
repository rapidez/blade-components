{{--
The default button is a variant used for basic use cases.
Example:
```
<x-rapidez::button>Something</x-rapidez::button>
```
--}}
<x-rapidez::button.base {{ $attributes->twMerge('bg text-muted hover:text hover:bg-emphasis border-b border-b-black/10') }}>
    {{ $slot }}
</x-rapidez::button.base>