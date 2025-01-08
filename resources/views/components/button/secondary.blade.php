{{--
```
<x-rapidez::button.secondary>Something</x-rapidez::button.secondary>
```
--}}
<x-rapidez::button {{ $attributes->twMerge('bg-secondary text-secondary-text') }}>
    {{ $slot }}
</x-rapidez::button>