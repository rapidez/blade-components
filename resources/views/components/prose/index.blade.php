{{--
This is the default prose, suitable for SEO content or other text.
Example:

```
<x-rapidez::prose>Example text</x-rapidez::prose>
```
--}}
<div {{ $attributes->twMerge('prose-custom prose-sm') }}>
    {{ $slot }}
</div>