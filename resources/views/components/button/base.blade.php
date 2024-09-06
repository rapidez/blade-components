{{--
This is the base for all the buttons. In here we don't need classes.
If you want to change styling for buttons go to the button/index.
<x-tag> Is a dynamic tag when a button has a href it will be a <a>,
when you add a for on the button the button will be a <label>.
If the button doesn't have a href or label it will be a <button>
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
@php
    $tag = $attributes->hasAny('href', ':href', 'v-bind:href', 'x-bind:href') ? 'a' : 'button';
    $tag = $attributes->has('for') ? 'label' : $tag;
@endphp

<x-tag is="{{ $tag }}" {{ $attributes }}>
    {{ $slot }}
</x-tag>
