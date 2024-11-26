{{--
This is the default button if you use the example you get this.
It is not recommended to use this button. Make use of the other buttons. ie: `button/primary`
Example:

```
<x-rapidez::button>Something</x-rapidez::button>
```
--}}
<x-rapidez::button.base {{ $attributes->twMerge('relative inline-flex items-center justify-center text transition bg text-base font-medium rounded min-h-12 py-1.5 px-5 hover:bg-opacity-80 border-b border-b-black/15 disabled:text-muted disabled:bg-muted disabled:cursor-not-allowed') }}>
    {{ $slot }}
</x-rapidez::button.base>
