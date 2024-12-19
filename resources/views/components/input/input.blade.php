{{--
Examples:

1. Just an input:
```
<x-rapidez::input />
```

2 With a label:
```
<label>
    <x-rapidez::label>Something</x-rapidez::label>
    <x-rapidez::input />
</label>
```
--}}
<input {{ $attributes->twMerge('w-full py-3 px-5 border border-default rounded-md outline-0 ring-0 text-sm transition-colors focus:ring-transparent focus:border-emphasis disabled:cursor-not-allowed disabled:bg-emphasis disabled:border-emphasis placeholder:text-inactive [&::-webkit-inner-spin-button]:appearance-none [&:user-invalid:not(:placeholder-shown)]:border-red-500') }} />
