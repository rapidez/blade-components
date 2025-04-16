{{--
```
<x-rapidez::button.secondary>Something</x-rapidez::button.secondary>
```
--}}
<x-rapidez::button.base {{ $attributes->twMerge('bg-secondary text-secondary-text border-b border-b-black/20 hover:bg-opacity-80') }}>
    {{ $slot }}
</x-rapidez::button.base>