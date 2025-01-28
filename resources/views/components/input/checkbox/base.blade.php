{{--
Examples:

1. Just a simple checkbox:
```
<x-rapidez::input.checkbox.base />
```
--}}
<input type="checkbox" {{ $attributes->twMerge('cursor-pointer border border-default rounded-md size-5 text focus:outline-none focus:ring-0 focus:ring-offset-0 disabled:cursor-not-allowed disabled:bg-muted disabled:border-muted') }} />
