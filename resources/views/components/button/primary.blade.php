{{--
```
<x-rapidez::button.primary>Something</x-rapidez::button.primary>
```
--}}
<x-rapidez::button {{ $attributes->twMerge('bg-primary text-primary-text border-b border-b-black/15') }}>
    {{ $slot }}
</x-rapidez::button>
