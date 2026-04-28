{{--
The link button variant, the button doesn't have a background and padding.
Example:
```
<x-rapidez::button.link>Something</x-rapidez::button.link>
```
--}}
<x-rapidez::button.tag {{ $attributes->twMerge('inline-flex items-center gap-x-1.5 transition text-base text-primary no-underline justify-start w-fit cursor-pointer hover:underline disabled:opacity-50 disabled:cursor-not-allowed') }}>
    {{ $slot }}
</x-rapidez::button.tag>