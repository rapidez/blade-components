{{--
This mobile version popovertargets into inline content on desktop. The slideover behavior only applies on mobile screens.

## Behavior
- On mobile: Functions as a regular slideover
- On desktop: Content is displayed directly on the page
- Button should be hidden on desktop using `lg:hidden`

## Example
```blade
<button popovertarget="example" class="lg:hidden">
    Open Mobile Slideover
</button>

<x-rapidez::slideover.mobile id="example">
    <x-rapidez::slideover.mobile.header>
        Title
        <x-rapidez::slideover.close popovertarget="example" />
    </x-rapidez::slideover.mobile.header>
    <x-rapidez::slideover.mobile.content>
        Content
    </x-rapidez::slideover.mobile.content>
    <x-rapidez::slideover.mobile.footer>
        Footer
    </x-rapidez::slideover.mobile.footer>
</x-rapidez::slideover.mobile>
```
--}}

<x-rapidez::slideover :attributes="$attributes->twMerge('lg:contents')">
    {{ $slot }}
</x-rapidez::slideover>