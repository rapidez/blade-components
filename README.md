# Rapidez Blade Components

This package includes some Tailwind CSS styled Blade components, the components do not need or require Rapidez. This package is only used within Rapidez by default, but **can be used in any Laravel project**.

### Inputs

- [Input](https://github.com/rapidez/blade-components/blob/master/resources/views/components/input/index.blade.php)
- [Checkbox](https://github.com/rapidez/blade-components/blob/master/resources/views/components/input/checkbox/index.blade.php)
- [Radio](https://github.com/rapidez/blade-components/blob/master/resources/views/components/input/radio/index.blade.php)
- [Select](https://github.com/rapidez/blade-components/blob/master/resources/views/components/input/select/index.blade.php)
- [Textarea](https://github.com/rapidez/blade-components/blob/master/resources/views/components/input/textarea/index.blade.php)
- [Label](https://github.com/rapidez/blade-components/blob/master/resources/views/components/label/index.blade.php)

The idea with these components is to have a good starting point and centralized styling. Most of the components use a [Anonymous Index](https://laravel.com/docs/master/blade#anonymous-index-components), this way you have a default and variants can be added next to it.

We don't provide a input + label combination component as you'll end up with attribute merging issues. We can't guess where the attribute should go; the input or the label. We could provide a 99% use case but you'll eventually end up with exceptions and complexity within the components. But; we do provide it for the checkbox and radio as you can see within those components. If you don't need the label you can use the `base` component as you can find within the examples.

![](.github/media/screenshot.png)

### Buttons

- [Base](https://github.com/rapidez/blade-components/blob/master/resources/views/components/button/base.blade.php)
- [Index](https://github.com/rapidez/blade-components/blob/master/resources/views/components/button/index.blade.php)
- [Primary](https://github.com/rapidez/blade-components/blob/master/resources/views/components/button/primary.blade.php)
- [Outline](https://github.com/rapidez/blade-components/blob/master/resources/views/components/button/outline.blade.php)
- [Enhanced](https://github.com/rapidez/blade-components/blob/master/resources/views/components/button/enhanced.blade.php)
- [Slider](https://github.com/rapidez/blade-components/blob/master/resources/views/components/button/slider.blade.php)

The base button doesn't have any styling; here, we only use the `x-tag`.
All other buttons use the `button/index`, which contains the basic styling for buttons, such as padding, hover effects, and the disabled state.
The button variants contain styling for the background and text color. There is only one exception: the `button/slider`, which has more custom styling than the other button variants.

![](.github/media/buttons.png)

## Installation

```
composer require rapidez/blade-components
```

And make sure these colors are present in your Tailwind config:
```js
colors: {
    colors: {
        primary: {
            DEFAULT: '#2FBC85',
            text: '#FFFFFF',
        },
        secondary: {
            DEFAULT: '#F97316',
            text: '#FFFFFF',
        },
        neutral: '#334155',
        inactive: '#64748B',
        border: '#E7EBEF',
        disabled: '#EBE8DE',
        enhanced: '#36B422'
    }
}
```

### Views

If you like to change the components you can publish the views with:
```
php artisan vendor:publish --tag=rapidez-blade-components-views
```

## Usage

Just like any other Blade component, check out the [Laravel Blade docs](https://laravel.com/docs/master/blade) and the examples within the components code linked above. All components are prefixed with `x-rapidez::` to avoid any conflicts with existing Blade components within your project.

### Basic examples

#### Input with a label

```blade
<label>
    <x-rapidez::label>Something</x-rapidez::label>
    <x-rapidez::input name="something" class="extra-styling" />
</label>
```

#### Checkbox

```blade
<x-rapidez::input.checkbox name="something">
    @lang('Translatable label')
</x-rapidez::input.checkbox>
```

## x-tag

It is a Blade version of a [dynamic Vue component](https://vuejs.org/guide/essentials/component-basics.html#dynamic-components)

### Usage

```blade
<x-tag is="span" class="font-bold">
    Something
</x-tag>
```

which will result in

```html
<span class="font-bold">
    Something
</span>
```

## Preview

There is a preview Blade file included with all the components, to view that in your project you could register a route for it within `routes/web.php` and visit the `/components` route from your browser:

```php
Route::view('components', 'rapidez::components-preview');
```

## License

GNU General Public License v3. Please see [License File](LICENSE) for more information.
