{{--
The enhanced button is a variant specifically used for anything conversion related.
Like purchasing a product or completing the checkout.
Example:

```
<x-rapidez::button.enhanced>Something</x-rapidez::button.enhanced>
```
--}}
<x-rapidez::button {{ $attributes->twMerge('bg-enhanced text-white border-b border-black/15') }}>
    {{ $slot }}
</x-rapidez::button>
