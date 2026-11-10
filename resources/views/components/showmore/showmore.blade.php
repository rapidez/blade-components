@slots(['more', 'less'])
@props(['visibleItems' => 5, 'handle' => 'show-more-item'])

<div {{ $attributes->twMerge('show-more-component') }}>
    <div {{ $slot->attributes->twMerge('content mb-3') }}>
        {{ $slot }}
    </div>

    <details class="group/details">
        <summary class="inline-flex list-none cursor-pointer [&::-webkit-details-marker]:hidden">
            <span {{ $more->attributes->twMerge('inline-flex group-open/details:hidden') }}>
                @slotdefault('more')
                    <x-rapidez::button.link tag="span">
                        @lang('Show more')
                    </x-rapidez::button.link>
                @endslotdefault
            </span>
            <span {{ $less->attributes->twMerge('hidden group-open/details:inline-flex') }}>
                @slotdefault('less')
                    <x-rapidez::button.link tag="span">
                        @lang('Show less')
                    </x-rapidez::button.link>
                @endslotdefault
            </span>
        </summary>
    </details>

    <style>
        @scope {
            :scope:not(:has(> details[open])) .content > :nth-child(n+{{ $visibleItems + 1 }}),
            :scope:not(:has(> details[open])) .content {{ '.' . $handle }}:nth-child(n+{{ $visibleItems + 1 }}) {
                display: none;
            }
        }
    </style>
</div>
