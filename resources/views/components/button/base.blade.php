{{--
This is the base for all the buttons. In here we don't need classes.
If you want to change styling for buttons go to the button/button.
- `href` attribute results in an `<a>`
- `for` attribute results in a `<label>`
- Fallback/default is `<button>`
Examples:

```
<x-rapidez::button href="something">Something</x-rapidez::button>
```

```
<x-rapidez::button for="something">Something</x-rapidez::button>
```

```
<x-rapidez::button>Something</x-rapidez::button>
```
--}}
@props(['tag' => 'button'])

@php
    $tag = $attributes->hasAny('href', ':href', 'v-bind:href', 'x-bind:href') ? 'a' : $tag;
    $tag = $attributes->has('for') ? 'label' : $tag;
@endphp

<x-rapidez::tag is="{{ $tag }}" {{ $attributes }}>
    {{ $slot }}
</x-rapidez::tag>
