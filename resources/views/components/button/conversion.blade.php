{{--
The conversion button is a variant specifically used for anything conversion related.
Like purchasing a product or completing the checkout.
Example:

```
<x-rapidez::button.conversion>Something</x-rapidez::button.conversion>
```
--}}
<x-rapidez::button {{ $attributes->twMerge('bg-conversion text-conversion-text border-b border-b-black/15') }}>
    {{ $slot }}
</x-rapidez::button>
