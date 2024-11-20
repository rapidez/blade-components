{{--
Accordion component using the Tailwind CSS `peer` and `group` utilities.

## Properties
- `id`      A unique identifier for each accordion instance, automatically generated if not provided.
- `type`    Default `checkbox`, set to `radio` if you want only one accordion to be open at a time.
- `name`    Required if you use `radio` to group accordions together.
- `opened`  Default `false`, set to `true` to have it open initially.

## Slots
- `label`   Defines the clickable label that toggles the accordion.
- `content` The collapsible section that appears when the accordion is opened.

## Examples
Basic usage:
```
<x-rapidez::accordion>
    <x-slot:label>
        Label
    </x-slot:label>
    <x-slot:content>
        Content
    </x-slot:content>
</x-rapidez::accordion>
```

With rotating chevron:
```
<x-rapidez::accordion>
    <x-slot:label>
        <span>Label</span>
        <x-heroicon-o-chevron-down class="transition-transform size-5 group-has-[:checked]:rotate-180" />
    </x-slot:label>
    <x-slot:content>
        Content
    </x-slot:content>
</x-rapidez::accordion>
```
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
        {{ $label->attributes->twMerge('flex items-center gap-2 justify-between cursor-pointer') }}
        @if ($type === 'radio')
            onclick="event.preventDefault(); document.getElementById('{{ $id }}').checked = !document.getElementById('{{ $id }}').checked;"
        @endif
    >
        {{ $label }}
    </label>
    <div {{ $content->attributes->twMerge('grid peer-checked:grid-rows-[1fr] grid-rows-[0fr] transition-all') }}>
        <div class="overflow-hidden">
            {{ $content }}
        </div>
    </div>
</div>
