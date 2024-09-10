{{--
This is a customizable accordion component that uses peer to toggle its content.

Properties:
    id:         A unique identifier for each accordion instance, automatically generated if not provided.
    type:       This is checkbox by default. If you want to close all other accordions, set this to `radio`.
    name:       This is required if you use radio.
    opened:     This is closed by default.

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

If you want to only have the accordion on mobile,
you can add grid-rows-[1fr] on a breakpoint like this to cancel the grid-rows-[0fr] on the content:
    <x-rapidez::accordion>
        <x-rapidez::accordion.label>
            Label
        </x-rapidez::accordion.label>
        <x-rapidez::accordion.content class="sm:grid-rows-[1fr]">
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
