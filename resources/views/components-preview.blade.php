<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com?plugins=forms"></script>

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
                            DEFAULT: color('--conversion', '#36B422'),
                            text: color('--conversion-text', tailwind.colors.white),
                        },
                        foreground: {
                            emphasis: color('--foreground-emphasis', tailwind.colors.slate[900]),
                            DEFAULT: color('--foreground', tailwind.colors.slate[800]),
                            muted: color('--foreground-muted', tailwind.colors.slate[600]),
                        },
                        border: {
                            emphasis: color('--border-emphasis', tailwind.colors.slate[500]),
                            DEFAULT: color('--border', tailwind.colors.slate[200]),
                            muted: color('--border-muted', tailwind.colors.slate[100]),
                        },
                        background: {
                            emphasis: color('--background-emphasis', tailwind.colors.slate[800]),
                            DEFAULT: color('--background', tailwind.colors.slate[100]),
                            muted: color('--background-muted', tailwind.colors.slate[50]),
                        },
                    },
                    textColor: (theme) => theme('colors.foreground'),
                    borderColor: (theme) => ({
                        default: theme('colors.border'),
                        ...theme('colors.border'),
                    }),
                    backgroundColor: (theme) => theme('colors.background'),
                }
            }
        }
        </script>
    </head>
    <body>
        <div class="flex flex-col container mx-auto my-20 gap-5 px-5">
            <h1 class="font-bold text-xl">Rapidez Blade Components preview</h1>

            <h2 class="font-bold text-lg">Input components</h2>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 [&>fieldset]:border [&>fieldset]:rounded [&>fieldset]:p-5">
                <h3 class="font-bold text-md">Base components</h3>
                <h3 class="font-bold text-md">Components with a label</h3>
                <h3 class="font-bold text-md">Components with a required label</h3>

                <fieldset>
                    <legend>Input</legend>
                    <x-rapidez::input />
                </fieldset>

                <fieldset>
                    <legend>Input</legend>
                    <label>
                        <x-rapidez::label>Something</x-rapidez::label>
                        <x-rapidez::input />
                    </label>
                </fieldset>

                <fieldset>
                    <legend>Input</legend>
                    <label>
                        <x-rapidez::label>Something</x-rapidez::label>
                        <x-rapidez::input required />
                    </label>
                </fieldset>

                <fieldset>
                    <legend>Checkbox</legend>
                    <x-rapidez::input.checkbox.base />
                </fieldset>

                <fieldset>
                    <legend>Checkbox</legend>
                    <x-rapidez::input.checkbox>
                        Something
                    </x-rapidez::input.checkbox>
                </fieldset>

                <fieldset>
                    <legend>Checkbox</legend>
                    <x-rapidez::input.checkbox required>
                        Something
                    </x-rapidez::input.checkbox>
                </fieldset>

                <fieldset>
                    <legend>Radio</legend>
                    <x-rapidez::input.radio.base />
                </fieldset>

                <fieldset>
                    <legend>Radio</legend>
                    <x-rapidez::input.radio>
                        Something
                    </x-rapidez::input.radio>
                </fieldset>

                <fieldset>
                    <legend>Radio</legend>
                    <x-rapidez::input.radio required>
                        Something
                    </x-rapidez::input.radio>
                </fieldset>

                <fieldset>
                    <legend>Select</legend>
                    <x-rapidez::input.select>
                        <option>Option</option>
                    </x-rapidez::input.select>
                </fieldset>

                <fieldset>
                    <legend>Select</legend>
                    <label>
                        <x-rapidez::label>Something</x-rapidez::label>
                        <x-rapidez::input.select>
                            <option>Option</option>
                        </x-rapidez::input.select>
                    </label>
                </fieldset>

                <fieldset>
                    <legend>Select</legend>
                    <label>
                        <x-rapidez::label>Something</x-rapidez::label>
                        <x-rapidez::input.select required>
                            <option>Option</option>
                        </x-rapidez::input.select>
                    </label>
                </fieldset>

                <fieldset>
                    <legend>Textarea</legend>
                    <x-rapidez::input.textarea/>
                </fieldset>

                <fieldset>
                    <legend>Textarea</legend>
                    <label>
                        <x-rapidez::label>Something</x-rapidez::label>
                        <x-rapidez::input.textarea />
                    </label>
                </fieldset>

                <fieldset>
                    <legend>Textarea</legend>
                    <label>
                        <x-rapidez::label>Something</x-rapidez::label>
                        <x-rapidez::input.textarea required />
                    </label>
                </fieldset>
            </div>

            <h2 class="font-bold text-lg">Button components</h2>
            <div class="grid grid-cols-5 gap-5">
                <x-rapidez::button>Button</x-rapidez::button>
                <x-rapidez::button.primary>Primary</x-rapidez::button.primary>
                <x-rapidez::button.secondary>Secondary</x-rapidez::button.secondary>
                <x-rapidez::button.outline>Outline</x-rapidez::button.outline>
                <x-rapidez::button.conversion>Conversion</x-rapidez::button.conversion>
                <div class="flex flex-col gap-2">
                    <strong>Slider:</strong>
                    <div class="flex items-center gap-2">
                        <x-rapidez::button.slider>&lt;</x-rapidez::button.slider>
                        <x-rapidez::button.slider>&gt;</x-rapidez::button.slider>
                    </div>
                </div>
            </div>

            <h2 class="text-lg font-bold mt-8">Slideover Component</h2>
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

            <h2 class="text-lg font-bold">Accordion component</h2>

            <div class="grid grid-cols-1 gap-5 lg:grid-cols-3">
                <div class="flex flex-col gap-3">
                    <h3 class="text-md font-bold">Default</h3>
                    <x-rapidez::accordion id="checkbox-question-1" class="rounded border p-3">
                        <x-slot:label class="font-bold">
                            Question 1
                        </x-slot:label>
                        <x-slot:content>
                            Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Reprehenderit eum in deleniti dicta ducimus perspiciatis provident tempore. Consequuntur nemo blanditiis delectus, quasi velit illum ipsa quibusdam maiores cupiditate itaque repellendus.
                        </x-slot:content>
                    </x-rapidez::accordion>
                    <x-rapidez::accordion id="checkbox-question-2" class="rounded border p-3">
                        <x-slot:label class="font-bold">
                            Question 2
                        </x-slot:label>
                        <x-slot:content>
                            Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Reprehenderit eum in deleniti dicta ducimus perspiciatis provident tempore. Consequuntur nemo blanditiis delectus, quasi velit illum ipsa quibusdam maiores cupiditate itaque repellendus.
                        </x-slot:content>
                    </x-rapidez::accordion>
                </div>

                <div class="flex flex-col gap-3">
                    <h3 class="font-bold text-md">Radio</h3>
                    <x-rapidez::accordion id="radio-question-1" type="radio" name="questions" class="rounded border p-3">
                        <x-slot:label class="font-bold">
                            Question 1
                        </x-slot:label>
                        <x-slot:content class="">
                            Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Reprehenderit eum in deleniti dicta ducimus perspiciatis provident tempore. Consequuntur nemo blanditiis delectus, quasi velit illum ipsa quibusdam maiores cupiditate itaque repellendus.
                        </x-slot:content>
                    </x-rapidez::accordion>
                    <x-rapidez::accordion id="radio-question-2" type="radio" name="questions" class="rounded border p-3">
                        <x-slot:label class="font-bold">
                            Question 2
                        </x-slot:label>
                        <x-slot:content class="">
                            Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Reprehenderit eum in deleniti dicta ducimus perspiciatis provident tempore. Consequuntur nemo blanditiis delectus, quasi velit illum ipsa quibusdam maiores cupiditate itaque repellendus.
                        </x-slot:content>
                    </x-rapidez::accordion>
                </div>

                <div class="flex flex-col gap-3">
                    <h3 class="font-bold text-md">Mobile only</h3>
                    <x-rapidez::accordion.mobile id="mobile-question-1" class="rounded border p-3">
                        <x-slot:label class="font-bold">
                            Question 1
                        </x-slot:label>
                        <x-slot:content class="">
                            Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Reprehenderit eum in deleniti dicta ducimus perspiciatis provident tempore. Consequuntur nemo blanditiis delectus, quasi velit illum ipsa quibusdam maiores cupiditate itaque repellendus.
                        </x-slot:content>
                    </x-rapidez::accordion.mobile>
                    <x-rapidez::accordion.mobile id="mobile-question-2" class="rounded border p-3">
                        <x-slot:label class="font-bold">
                            Question 2
                        </x-slot:label>
                        <x-slot:content class="">
                            Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Reprehenderit eum in deleniti dicta ducimus perspiciatis provident tempore. Consequuntur nemo blanditiis delectus, quasi velit illum ipsa quibusdam maiores cupiditate itaque repellendus.
                        </x-slot:content>
                    </x-rapidez::accordion.mobile>
                </div>

                <div class="flex flex-col gap-3">
                    <h3 class="font-bold text-md">With rotating chevron</h3>
                    <x-rapidez::accordion class="border rounded p-4" id="rotating-accordion">
                        <x-slot:label>
                            <span>Click me to toggle</span>
                            <svg class="w-5 h-5 group-has-[:checked]:rotate-180 transition-transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </x-slot:label>
                        <x-slot:content>
                            <div class="pt-4">
                                This accordion demonstrates the rotating chevron using group-has-[:checked]:rotate-180 class.
                                When you click the header, the chevron will rotate 180 degrees.
                            </div>
                        </x-slot:content>
                    </x-rapidez::accordion>
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="font-bold text-md">Navigation example with background</h3>
                    <x-rapidez::accordion class="border rounded p-4" id="navigation-accordion">
                        <x-slot:label>
                            <div class="flex items-center justify-between w-full">
                                <span>Shop Categories</span>
                                <svg class="w-5 h-5 group-has-[:checked]:rotate-180 transition-transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </x-slot:label>
                        <x-slot:content>
                            <ul class="p-5 bg-red-500 text-white rounded-lg mt-2">
                                <li><a href="/what-is-new.html" class="block hover:underline">What's New</a></li>
                                <li><a href="/women.html" class="block hover:underline">Women</a></li>
                                <li><a href="/men.html" class="block hover:underline">Men</a></li>
                                <li><a href="/gear.html" class="block hover:underline">Gear</a></li>
                                <li><a href="/training.html" class="block hover:underline">Training</a></li>
                                <li><a href="/sale.html" class="block hover:underline">Sale</a></li>
                            </ul>
                        </x-slot:content>
                    </x-rapidez::accordion>
                </div>
            </div>
        </div>
    </body>
</html>
