{{--
This mobile version only collapses on mobile, on desktop it's always open.

## Example
```
<x-rapidez::accordion.mobile>
    <x-slot:label>
        Title
    </x-slot:label>
    <x-slot:content>
        Content
    </x-slot:content>
</x-rapidez::accordion.mobile>
```

Currently, the pseudo-selector ::details-content is not supported in Firefox. We use this pseudo-selector for the mobile accordion variant.
As a result, the section remains closed on mobile and is intended to be open on desktop using the CSS defined in resources/css/components/detail-summary.css.
However, because Firefox doesn’t support this pseudo-selector, the section will also remain closed on desktop in Firefox.
To address this, we have changed the mobile accordion and use an input and label to toggle the content on mobile and keep it always open on desktop.

--}}

@props(['id' => uniqid('accordion-'), 'type' => 'checkbox', 'name' => '', 'opened' => false])
@slots(['label', 'content'])

<div {{ $attributes->twMerge('flex flex-col group') }}>
    <input
        id="{{ $id }}"
        name="{{ $name }}"
        type="{{ $type }}"
        @checked($opened)
        class="peer hidden"
    />
    <label
        for="{{ $id }}"
        {{ $label->attributes->twMerge('flex items-center gap-2 justify-between cursor-pointer md:cursor-auto') }}
        @if ($type === 'radio')
            onclick="event.preventDefault(); document.getElementById('{{ $id }}').checked = !document.getElementById('{{ $id }}').checked;"
        @endif
    >
        {{ $label }}
    </label>
    <div {{ $content->attributes->twMerge('grid peer-checked:grid-rows-[1fr] grid-rows-[0fr] transition-all md:grid-rows-[1fr]') }}>
        <div class="overflow-hidden">
            {{ $content }}
        </div>
    </div>
</div>