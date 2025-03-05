{{--
This mobile version transforms into inline content on desktop. The slideover behavior only applies on mobile screens.

## Behavior
- On mobile: Functions as a regular slideover
- On desktop: Content is displayed directly on the page
- Label should be hidden on desktop using `lg:hidden`

## Example
```blade
<label for="mobile-slideover" class="lg:hidden">
    Open Mobile Slideover
</label>
<x-rapidez::slideover.mobile id="mobile-slideover" title="Mobile Slideover">
    Mobile slideover
</x-rapidez::slideover.mobile>
```
--}}
@include('rapidez::components.slideover.slideover', ['attributes' => $attributes->class('lg:contents [&>.slideover-wrapper]:lg:contents [&>.slideover-header]:lg:hidden mobile-slideover')])
