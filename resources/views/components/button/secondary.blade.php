{{--
```
<x-rapidez::button.secondary>Something</x-rapidez::button.secondary>
```
--}}
<x-rapidez::button {{ $attributes->twMerge('bg-secondary text-secondary-text border-b border-b-black/15') }}>
    {{ $slot }}
</x-rapidez::button>