{{--
This is the primary button.
Example:

```
<x-rapidez::button.primary>Something</x-rapidez::button.primary>
```
--}}
<x-rapidez::button {{ $attributes->twMerge('bg-primary text-primary-text') }}>
    {{ $slot }}
</x-rapidez::button>
