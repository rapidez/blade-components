{{--
This is a customizable accordion component that uses the `peer` utility to toggle its content visibility.

Properties:
    id:         A unique identifier for each accordion instance, automatically generated if not provided.
    type:       The default is `checkbox`. Set this to `radio` if you want to allow only one accordion to be open at a time.
    name:       Required if you use `radio` to group accordions together.
    opened:     The accordion is closed by default. Set to `true` to have it open initially.

Slots:
    label:      Defines the clickable label that toggles the accordion.
    content:    The collapsible section that appears when the accordion is opened.

Example:
    <x-rapidez::accordion>
        <x-rapidez::accordion.label>
            Label
        </x-rapidez::accordion.label>
        <x-rapidez::accordion.content>
            Content
        </x-rapidez::accordion.content>
    </x-rapidez::accordion>
--}}

@props(['id' => uniqid('accordion-'), 'name' => '', 'type' => 'checkbox', 'opened' => false])
@slots(['label', 'content'])

<div {{ $attributes->twMerge('flex flex-col group') }}>
    <input
        id="{{ $id }}"
        name="{{ $name }}"
        type="{{ $type }}"
        @checked($opened)
        class="peer hidden"
    />
    <label for="{{ $id }}" {{ $label->attributes->twMerge('flex items-center gap-2 justify-between cursor-pointer') }}>
        {{ $label }}
    </label>
    <div {{ $content->attributes->twMerge('grid peer-checked:grid-rows-[1fr] grid-rows-[0fr] transition-all *:overflow-hidden') }}>
        {{ $content }}
    </div>
</div>
