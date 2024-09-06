{{--
This is the enhanced button the button can be used for the add to cart buttons
and it can be used inside the checkout.
Example:

```
<x-rapidez::button.enhanced>Something</x-rapidez::button.enhanced>
```
--}}
<x-rapidez::button {{ $attributes->twMerge('bg-enhanced text-white border-b border-black/15') }}>
    {{ $slot }}
</x-rapidez::button>
