{{--
```
<x-rapidez::button.slider>Icon</x-rapidez::button.slider>
```
--}}
<x-rapidez::button.base {{ $attributes->twMerge('bg-white p-0 rounded-full size-12 border hover:border-emphasis') }}>
    {{ $slot }}
</x-rapidez::button.base>
