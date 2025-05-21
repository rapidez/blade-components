{{--
Examples:

1. Just a simple radio:
```
<x-rapidez::input.radio.base />
```
--}}
<input type="radio" {{ $attributes->twMerge('cursor-pointer border border-default size-5 text focus:outline-none focus:ring-emphasis focus:ring-offset-0 disabled:cursor-not-allowed disabled:bg-muted disabled:border-muted') }} />
