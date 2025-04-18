{{--
The classes that are set on this button are the base for most other buttons.
It is not recommended to use this button. Make use of the other buttons. ie: `button/primary`
Example:

```
<x-rapidez::button>Something</x-rapidez::button>
```
--}}
<x-rapidez::button.tag {{ $attributes->twMerge('inline-flex items-center justify-center transition font-medium text-base rounded min-h-12 py-1.5 px-5 disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer gap-x-1.5') }}>
    {{ $slot }}
</x-rapidez::button.tag>
