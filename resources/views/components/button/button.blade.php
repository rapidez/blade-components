{{--
This is the default button if you use the example you get this.
It is not recommended to use this button. Make use of the other buttons. ie: `button/primary`
Example:

```
<x-rapidez::button>Something</x-rapidez::button>
```
--}}
<x-rapidez::button.base {{ $attributes->twMerge('relative inline-flex items-center justify-center transition font-medium rounded min-h-12 py-1.5 px-5 disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer gap-x-1.5') }}>
    {{ $slot }}
</x-rapidez::button.base>
