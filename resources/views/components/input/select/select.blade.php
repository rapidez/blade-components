{{--
Examples:

1. Just a select:
```
<x-rapidez::input.select>
    <option>Option 1</option>
</x-rapidez::input.select>
```

2. With a label:
```
<label>
    <x-rapidez::label>Something</x-rapidez::label>
    <x-rapidez::input.select>
        <option>Option 1</option>
    </x-rapidez::input.select>
</label>
```
--}}
<select {{ $attributes->twMerge('w-full py-3 px-5 border border-default rounded-md outline-0 ring-0 text-sm transition-colors focus:ring-transparent focus:border-emphasis disabled:cursor-not-allowed disabled:bg-muted disabled:border-muted placeholder:text-muted') }}>
    {{ $slot }}
</select>
