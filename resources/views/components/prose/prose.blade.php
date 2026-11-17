{{--
We're using one class here so if you're using this component
multiple times you don't have all the classes repeated.
This requires the `.prose-custom` CSS from the README in your own `app.css`!

Example:
```
<x-rapidez::prose>Example text</x-rapidez::prose>
```
--}}
<div {{ $attributes->twMerge('prose-custom') }}>
    {{ $slot }}
</div>
