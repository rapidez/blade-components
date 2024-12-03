{{--
This is the default prose, suitable for SEO content and other text.
The prose classes are not added here directly but are instead located in a separate CSS file: css/components/prose.css.
When multiple prose components appear on a single page, this setup prevents excessive class clutter in the page source.
With this solution, only these two classes appear in the source code rather than all individual prose classes.
Example:

```
<x-rapidez::prose>Example text</x-rapidez::prose>
```
--}}
<div {{ $attributes->twMerge('prose-custom') }}>
    {{ $slot }}
</div>