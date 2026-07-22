{{--
This mobile version popovertargetms into inline content on desktop. The slideover behavior only applies on mobile screens.

## Behavior
- On mobile: Functions as a regular slideover
- On desktop: Content is displayed directly on the page
- Button should be hidden on desktop using `lg:hidden`

## Example
```blade
<button popovertarget="example" class="lg:hidden">
    Open Mobile Slideover
</button>

<x-slideover.mobile id="example">
    <x-slideover.mobile.header>
        Title
        <x-slideover.close popovertarget="example" />
    </x-slideover.mobile.header>
    <x-slideover.mobile.content>
        Content
    </x-slideover.mobile.content>
    <x-slideover.mobile.footer>
        Footer
    </x-slideover.mobile.footer>
</x-slideover.mobile>
```
--}}

<x-slideover :attributes="$attributes->twMerge('lg:contents')">
    {{ $slot }}
</x-slideover>