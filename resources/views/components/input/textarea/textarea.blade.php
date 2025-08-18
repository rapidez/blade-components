{{--
Examples:

1. Just a textarea:
```
<x-rapidez::input.textarea />
```

2 With a label:
```
<label>
    <x-rapidez::label>Something</x-rapidez::label>
    <x-rapidez::input.textarea />
</label>
```
--}}
<textarea {{ $attributes->twMerge('w-full py-3 px-5 border border-default rounded-md outline-0 ring-0 text-sm transition-colors focus:ring-transparent focus:border-emphasis disabled:cursor-not-allowed disabled:text-disabled disabled:bg-disabled disabled:border-disabled placeholder:text-muted') }}>{{ $slot }}</textarea>
