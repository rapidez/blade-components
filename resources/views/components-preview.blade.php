<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>

        <style type="text/tailwindcss">
            {{ file_get_contents(base_path('../../../../resources/css/components/prose.css')) }}
            {{ file_get_contents(base_path('../../../../resources/css/components/detail-summary.css')) }}
        </style>

        <title>Rapidez Blade Components Preview</title>

        <script>
        function color(variable, fallback) {
            return 'color-mix(in srgb, var(' + variable + ', ' + fallback + ') calc(100% * <alpha-value>), transparent)'
        }

        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: color('--primary', '#2FBC85'),
                            text: color('--primary-text', tailwind.colors.white),
                        },
                        secondary: {
                            DEFAULT: color('--secondary', '#202F60'),
                            text: color('--secondary-text', tailwind.colors.white),
                        },
                        conversion: {
                            DEFAULT: color('--conversion', tailwind.colors.green[700]),
                            text: color('--conversion-text', tailwind.colors.white),
                        },
                        foreground: {
                            emphasis: color('--foreground-emphasis', tailwind.colors.slate[900]),
                            DEFAULT: color('--foreground', tailwind.colors.slate[800]),
                            muted: color('--foreground-muted', tailwind.colors.slate[600]),
                        },
                        border: {
                            emphasis: color('--border-emphasis', tailwind.colors.slate[400]),
                            DEFAULT: color('--border', tailwind.colors.slate[300]),
                            muted: color('--border-muted', tailwind.colors.slate[100]),
                        },
                        background: {
                            emphasis: color('--background-emphasis', tailwind.colors.slate[200]),
                            DEFAULT: color('--background', tailwind.colors.slate[100]),
                            muted: color('--background-muted', tailwind.colors.slate[50]),
                        },
                        backdrop: color('--backdrop', 'rgba(0, 0, 0, 0.4)'),
                    },
                    zIndex: {
                        'slideover': '120',
                        'slideover-overlay': '10',
                        'slideover-sidebar': '20',
                    },
                    textColor: (theme) => ({
                        default: theme('colors.foreground'),
                        ...theme('colors.foreground'),
                    }),
                    borderColor: (theme) => ({
                        default: theme('colors.border'),
                        ...theme('colors.border'),
                    }),
                    backgroundColor: (theme) => ({
                        default: theme('colors.background'),
                        ...theme('colors.background'),
                    }),
                    ringColor: (theme) => ({
                        default: theme('colors.border'),
                        ...theme('colors.border'),
                    }),
                    outlineColor: (theme) => ({
                        default: theme('colors.border'),
                        ...theme('colors.border'),
                    }),
                }
            }
        }
        </script>
    </head>
    <body class="has-[.prevent-scroll:checked]:overflow-clip">
        <div class="bg mb-6">
            <div class="container mx-auto px-5 py-10">
                <h1 class="font-bold text-2xl">Rapidez Blade Components preview</h1>
            </div>
        </div>
        <div class="flex flex-col container mx-auto mt-5 mb-20 gap-5 px-5">
            <h2 class="font-bold text-2xl mb-2 mt-5">Button components</h2>
            <div class="grid grid-cols-1 gap-5 items-start lg:grid-cols-3">
                <div>
                    <h3 class="text-xl font-bold">Primary & Secondary button</h3>
                    <div class="text-sm text-muted">
                        These buttons use theme colors; primary and secondary.
                        If you change the color in your project, the buttons will update as well.
                    </div>
                </div>
                <div class="flex flex-col gap-y-2">
                    <x-rapidez::button.primary>Primary</x-rapidez::button.primary>
                    <x-rapidez::button.primary disabled>Primary disabled</x-rapidez::button.primary>
                </div>
                <div class="flex flex-col gap-y-2">
                    <x-rapidez::button.secondary>Secondary</x-rapidez::button.secondary>
                    <x-rapidez::button.secondary disabled>Secondary disabled</x-rapidez::button.secondary>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-5 items-start lg:grid-cols-3">
                <div>
                    <h3 class="text-xl font-bold">Default & Outline button</h3>
                    <div class="text-sm text-muted">
                        The default button is the default button. Nothing special, it is not recommended to use this button,
                        but if you would like to use the button, it is possible. The outline button doesn't have a background and only
                        contains a border.
                    </div>
                </div>
                <div class="flex flex-col gap-y-2">
                    <x-rapidez::button>Default button</x-rapidez::button>
                    <x-rapidez::button disabled>Default button disabled</x-rapidez::button>
                </div>
                <div class="flex flex-col gap-y-2">
                    <x-rapidez::button.outline>Outline</x-rapidez::button.outline>
                    <x-rapidez::button.outline disabled>Outline disabled</x-rapidez::button.outline>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-5 items-start lg:grid-cols-3">
                <div>
                    <h3 class="text-xl font-bold">Conversion & Rounded button</h3>
                    <div class="text-sm text-muted">
                        The conversion button is used for anything conversion related, like adding to cart or inside a checkout.
                        The rounded button is a variant that you can use for slider navigation.
                    </div>
                </div>
                <div class="flex flex-col gap-y-2">
                    <x-rapidez::button.conversion>Conversion</x-rapidez::button.conversion>
                    <x-rapidez::button.conversion disabled>Conversion disabled</x-rapidez::button.conversion>
                </div>
                <div class="flex gap-x-4">
                    <div class="flex items-center gap-2">
                        <x-rapidez::button.slider>&lt;</x-rapidez::button.slider>
                        <x-rapidez::button.slider>&gt;</x-rapidez::button.slider>
                    </div>
                    <div class="flex items-center gap-2">
                        <x-rapidez::button.slider disabled>&lt;</x-rapidez::button.slider>
                        <x-rapidez::button.slider disabled>&gt;</x-rapidez::button.slider>
                    </div>
                </div>
            </div>

            <h2 class="font-bold text-2xl mt-5 mb-2">Input components</h2>
            <div class="grid grid-cols-1 gap-5 lg:grid-cols-3">
                <div>
                    <h3 class="text-xl font-bold">Text Fields</h3>
                    <div class="text-sm text-muted">
                        Text fields can be used with or without label.
                        When you add a required attribute, the label will be marked with an asterisk.
                    </div>
                </div>
                <div class="flex flex-col gap-y-4">
                    <x-rapidez::input />
                    <label>
                        <x-rapidez::label>Input</x-rapidez::label>
                        <x-rapidez::input />
                    </label>
                    <label>
                        <x-rapidez::label>Input</x-rapidez::label>
                        <x-rapidez::input required />
                    </label>
                    <label>
                        <x-rapidez::label>Input</x-rapidez::label>
                        <x-rapidez::input disabled />
                    </label>
                </div>
                <div class="flex flex-col gap-y-4">
                    <x-rapidez::input.textarea />
                    <label>
                        <x-rapidez::label>Textarea</x-rapidez::label>
                        <x-rapidez::input.textarea />
                    </label>
                    <label>
                        <x-rapidez::label>Textarea</x-rapidez::label>
                        <x-rapidez::input.textarea required />
                    </label>
                    <label>
                        <x-rapidez::label>Textarea</x-rapidez::label>
                        <x-rapidez::input.textarea disabled />
                    </label>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-5 lg:grid-cols-3">
                <div>
                    <h3 class="text-xl font-bold">Selectors</h3>
                    <div class="text-sm text-muted">
                        These fields can be used with or without label.
                        When you add a required attribute, the label will be marked with an asterisk.
                    </div>
                </div>
                <div class="flex flex-col gap-y-4">
                    <x-rapidez::input.select>
                        <option>Option</option>
                    </x-rapidez::input.select>
                    <label>
                        <x-rapidez::label>Select</x-rapidez::label>
                        <x-rapidez::input.select>
                            <option>Option</option>
                        </x-rapidez::input.select>
                    </label>
                    <label>
                        <x-rapidez::label>Select</x-rapidez::label>
                        <x-rapidez::input.select required>
                            <option>Option</option>
                        </x-rapidez::input.select>
                    </label>
                    <label>
                        <x-rapidez::label>Select</x-rapidez::label>
                        <x-rapidez::input.select disabled>
                            <option>Option</option>
                        </x-rapidez::input.select>
                    </label>
                </div>
                <div class="flex flex-col gap-y-8 lg:gap-y-14">
                    <div class="flex flex-col gap-y-4">
                        <x-rapidez::input.checkbox.base />
                        <x-rapidez::input.checkbox>
                            Checkbox
                        </x-rapidez::input.checkbox>
                        <x-rapidez::input.checkbox required>
                            Checkbox
                        </x-rapidez::input.checkbox>
                        <x-rapidez::input.checkbox disabled>
                            Checkbox
                        </x-rapidez::input.checkbox>
                    </div>
                    <div class="flex flex-col gap-y-4">
                        <x-rapidez::input.radio.base />
                        <x-rapidez::input.radio>
                            Radio
                        </x-rapidez::input.radio>
                        <x-rapidez::input.radio required>
                            Radio
                        </x-rapidez::input.radio>
                        <x-rapidez::input.radio disabled>
                            Radio
                        </x-rapidez::input.radio>
                    </div>
                </div>
            </div>

            <h2 class="text-2xl font-bold mt-8">Slideover Component</h2>
            <div class="grid grid-cols-1 gap-5 lg:grid-cols-3">
                <div class="flex flex-col gap-3">
                    <h3 class="text-md font-bold">Default</h3>
                    <div>
                        <x-rapidez::button.primary for="default-slideover">
                            Open Slideover
                        </x-rapidez::button.primary>
                        <x-rapidez::slideover id="default-slideover" title="Example Slideover">
                            <div class="p-4">
                                <p class="mb-4">This is an example of the slideover component.</p>
                                <p>You can put any content here!</p>
                            </div>
                        </x-rapidez::slideover>
                    </div>
                </div>

                <div class="flex flex-col gap-3">
                    <h3 class="text-md font-bold">Right-positioned</h3>
                    <div>
                        <x-rapidez::button.secondary for="right-slideover">
                            Open Right Slideover
                        </x-rapidez::button.secondary>
                        <x-rapidez::slideover id="right-slideover" position="right" title="Right Slideover">
                            <div class="p-4">
                                <p class="mb-4">This slideover appears from the right side.</p>
                                <p>It demonstrates the position property.</p>
                            </div>
                        </x-rapidez::slideover>
                    </div>
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="text-md font-bold">Mobile only</h3>
                    <div>
                        <x-rapidez::button.outline for="mobile-slideover" class="lg:hidden">
                            Open Mobile Slideover
                        </x-rapidez::button.outline>
                        <x-rapidez::slideover.mobile id="mobile-slideover" title="Mobile Slideover">
                            <div class="max-lg:p-4">
                                <p class="mb-4">This is a mobile-specific slideover that transforms on desktop.</p>
                                <p>On mobile devices, it appears as a slideover.</p>
                                <p class="mt-4">On desktop screens (lg breakpoint and above), this content is directly embedded in the page instead of being in a slideover.</p>
                            </div>
                        </x-rapidez::slideover.mobile>
                    </div>
                </div>
            </div>

            <h2 class="text-2xl font-bold">Accordion component</h2>
            <div class="grid grid-cols-1 gap-5 items-start lg:grid-cols-3">
                <div>
                    <h3 class="text-xl font-bold">Default usage</h3>
                    <div class="text-sm text-muted">
                        We use the default behavior from the details/summary HTML elements. This means that the
                        component will have a chevron by default and it can have multiple open accordions at once.
                    </div>
                </div>
                <div class="flex flex-col gap-3">
                    <x-rapidez::accordion class="rounded border px-3">
                        <x-slot:label class="font-bold">Question 1</x-slot:label>
                        <x-slot:content>
                            Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Reprehenderit eum in deleniti dicta ducimus perspiciatis provident tempore. Consequuntur nemo blanditiis delectus, quasi velit illum ipsa quibusdam maiores cupiditate itaque repellendus.
                        </x-slot:content>
                    </x-rapidez::accordion>
                    <x-rapidez::accordion class="rounded border px-3">
                        <x-slot:label class="font-bold">Question 2</x-slot:label>
                        <x-slot:content>
                            Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Reprehenderit eum in deleniti dicta ducimus perspiciatis provident tempore. Consequuntur nemo blanditiis delectus, quasi velit illum ipsa quibusdam maiores cupiditate itaque repellendus.
                        </x-slot:content>
                    </x-rapidez::accordion>
                </div>
                <div class="flex flex-col gap-3">
                    <x-rapidez::accordion class="rounded border px-3" name="single">
                        <x-slot:label class="font-bold">Single open 1</x-slot:label>
                        <x-slot:content>
                            Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Reprehenderit eum in deleniti dicta ducimus perspiciatis provident tempore. Consequuntur nemo blanditiis delectus, quasi velit illum ipsa quibusdam maiores cupiditate itaque repellendus.
                        </x-slot:content>
                    </x-rapidez::accordion>
                    <x-rapidez::accordion class="rounded border px-3" name="single">
                        <x-slot:label class="font-bold">Single open 2</x-slot:label>
                        <x-slot:content>
                            Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Reprehenderit eum in deleniti dicta ducimus perspiciatis provident tempore. Consequuntur nemo blanditiis delectus, quasi velit illum ipsa quibusdam maiores cupiditate itaque repellendus.
                        </x-slot:content>
                    </x-rapidez::accordion>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-5 items-start lg:grid-cols-3">
                <div>
                    <h3 class="text-xl font-bold">Accordion with custom icon</h3>
                    <div class="text-sm text-muted">
                        By default the component will have a chevron that rotates when the open state is true.
                        You can also use this component with a custom icon if you prefer that.
                    </div>
                </div>
                <x-rapidez::accordion class="rounded border px-3" :icon="false">
                    <x-slot:label class="font-bold">
                        Question 1
                        <x-slot:icon>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="ml-auto size-5 flex shrink-0 text-muted group-open/details:hidden transition">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="ml-auto size-5 flex shrink-0 text-muted hidden opacity-0 group-open/details:block group-open/details:opacity-100 transition">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                            </svg>
                        </x-slot:icon>
                    </x-slot:label>
                    <x-slot:content>
                        Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Reprehenderit eum in deleniti dicta ducimus perspiciatis provident tempore. Consequuntur nemo blanditiis delectus, quasi velit illum ipsa quibusdam maiores cupiditate itaque repellendus.
                    </x-slot:content>
                </x-rapidez::accordion>
                <x-rapidez::accordion class="rounded border px-3">
                    <x-slot:label class="font-bold">
                        Question 2
                        <x-slot:icon>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="ml-auto size-5 flex shrink-0 text-muted group-open/details:hidden transition">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="ml-auto size-5 flex shrink-0 text-muted hidden opacity-0 group-open/details:block group-open/details:opacity-100 transition">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                            </svg>
                        </x-slot:icon>
                    </x-slot:label>
                    <x-slot:content>
                        Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Reprehenderit eum in deleniti dicta ducimus perspiciatis provident tempore. Consequuntur nemo blanditiis delectus, quasi velit illum ipsa quibusdam maiores cupiditate itaque repellendus.
                    </x-slot:content>
                </x-rapidez::accordion>
            </div>
            <div class="grid grid-cols-1 gap-5 items-start lg:grid-cols-3">
                <div>
                    <h3 class="text-xl font-bold">Accordion without icon</h3>
                    <div class="text-sm text-muted">
                        By default the component will have an chevron that rotates when the open state is true.
                        You can also use this component without using an icon.
                    </div>
                </div>
                <x-rapidez::accordion class="rounded border px-3" :icon="false">
                    <x-slot:label class="font-bold">Question 1</x-slot:label>
                    <x-slot:content>
                        Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Reprehenderit eum in deleniti dicta ducimus perspiciatis provident tempore. Consequuntur nemo blanditiis delectus, quasi velit illum ipsa quibusdam maiores cupiditate itaque repellendus.
                    </x-slot:content>
                </x-rapidez::accordion>
                <x-rapidez::accordion class="rounded border px-3" :icon="false">
                    <x-slot:label class="font-bold">Question 2</x-slot:label>
                    <x-slot:content>
                        Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Reprehenderit eum in deleniti dicta ducimus perspiciatis provident tempore. Consequuntur nemo blanditiis delectus, quasi velit illum ipsa quibusdam maiores cupiditate itaque repellendus.
                    </x-slot:content>
                </x-rapidez::accordion>
            </div>
            <div class="grid grid-cols-1 gap-5 items-start lg:grid-cols-3">
                <div>
                    <h3 class="text-xl font-bold">Mobile only accordion</h3>
                    <div class="text-sm text-muted">
                        This is only an accordion on mobile devices. On desktop, it's always open.
                    </div>
                </div>
                <x-rapidez::accordion.mobile class="rounded border p-3" :icon="false">
                    <x-slot:label class="font-bold">Question 1</x-slot:label>
                    <x-slot:content>
                        Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Reprehenderit eum in deleniti dicta ducimus perspiciatis provident tempore. Consequuntur nemo blanditiis delectus, quasi velit illum ipsa quibusdam maiores cupiditate itaque repellendus.
                    </x-slot:content>
                </x-rapidez::accordion.mobile>
                <x-rapidez::accordion.mobile class="rounded border p-3" :icon="false">
                    <x-slot:label class="font-bold">Question 2</x-slot:label>
                    <x-slot:content>
                        Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Reprehenderit eum in deleniti dicta ducimus perspiciatis provident tempore. Consequuntur nemo blanditiis delectus, quasi velit illum ipsa quibusdam maiores cupiditate itaque repellendus.
                    </x-slot:content>
                </x-rapidez::accordion.mobile>
            </div>

            <h2 class="text-2xl font-bold mt-5">Read more component</h2>
            <div class="grid grid-cols-1 gap-5 items-start lg:grid-cols-3">
                <div>
                    <h3 class="text-xl font-bold">Read more / Read less</h3>
                    <div class="text-sm text-muted">
                        This component is useful for long texts. It will automatically add a button if the text is too long.
                        Resize the window to see button show and hide.
                    </div>
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="text-md font-bold">Long text</h3>
                    <x-rapidez::readmore>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, repellat incidunt placeat. Quo accusantium laudantium, adipisci culpa ad enim dolores molestiae alias ducimus officiis labore facilis modi provident cupiditate? Voluptates. Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, repellat incidunt placeat. Quo accusantium laudantium, adipisci culpa ad enim dolores molestiae alias ducimus officiis labore facilis modi provident cupiditate? Voluptates.
                    </x-rapidez::readmore>
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="text-md font-bold">Short text</h3>
                    <x-rapidez::readmore>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, repellat incidunt placeat. Quo accusantium laudantium, adipisci culpa ad enim dolores molestiae alias ducimus officiis labore facilis modi provident cupiditate? Voluptates.
                    </x-rapidez::readmore>
                </div>
            </div>

            <h2 class="font-bold text-2xl mt-5">Prose component</h2>
            <x-rapidez::prose>
                <h1>Wayne Enterprises</h1>
                <h2>Wayne Foundation</h2>
                <h3>Bat Bunker</h3>
                <h4>Batcave</h4>
                <p>
                    <strong>Wayne Enterprises, Inc.</strong>, also known as <strong>WayneCorp</strong> and <strong>Wayne Industries</strong>, is a wealthy fictional company appearing in American comic books published by DC Comics, commonly in association with the superhero <a href="https://en.wikipedia.org/wiki/Batman">Batman</a>. Wayne Enterprises is a large, growing multinational company.
                </p>
                <ul>
                    <li>Robert Pattinson</li>
                    <li>Ben Affleck</li>
                    <li>Christian Bale</li>
                </ul>
                <ol>
                    <li>Christian Bale</li>
                    <li>Ben Affleck</li>
                    <li>Robert Pattinson</li>
                </ol>
                <blockquote>
                    I am vengeance, I am the night, I am Batman.
                </blockquote>
                <table>
                    <thead>
                        <tr>
                            <th>Movie</th>
                            <th>Score</th>
                            <th>Year</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Batman Begins</td>
                            <td>8.2</td>
                            <td>2005</td>
                        </tr>
                        <tr>
                            <td>The Dark Knight</td>
                            <td>9.0</td>
                            <td>2008</td>
                        </tr>
                        <tr>
                            <td>The Dark Knight Rises</td>
                            <td>8.4</td>
                            <td>2012</td>
                        </tr>
                    </tbody>
                </table>
            </x-rapidez::prose>
        </div>
        @stack('foot')
    </body>
</html>
