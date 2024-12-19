{{--
```
<x-rapidez::button.primary>Something</x-rapidez::button.primary>
```
--}}
<x-rapidez::button {{ $attributes->twMerge('bg-primary text-primary-text border-b border-b-black/20 hover:bg-opacity-80') }}>
    {{ $slot }}
</x-rapidez::button>
