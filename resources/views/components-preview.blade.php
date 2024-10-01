<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>

        {{--
            We need this for the prose preview because we can't load a custom css file.
            Taliwind CDN docs: https://tailwindcss.com/docs/installation/play-cdn.
        --}}
        <style type="text/tailwindcss">
            @layer utilities {
                .prose-base {
                    @apply prose font-sans text-neutral text-pretty max-w-none
                    prose-headings:text-neutral prose-a:text-primary prose-strong:text-neutral prose-blockquote:text-neutral
                    prose-a:prose-headings:no-underline prose-a:prose-headings:text-neutral prose-th:text-left;
                }
            }
        </style>

        <title>Preview</title>

        <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2FBC85',
                        neutral: '#334155',
                        inactive: '#64748b',
                        border: '#e7ebef',
                        disabled: '#ebe8de',
                    }
                }
            }
        }
        </script>
    </head>
    <body>
        <div class="flex flex-col container mx-auto my-20 gap-5">
            <h1 class="font-bold text-xl">Rapidez Blade Components preview</h1>

            <h2 class="font-bold text-lg">Input components</h2>

            <div class="grid grid-cols-3 gap-5 [&>fieldset]:border [&>fieldset]:rounded [&>fieldset]:p-5">
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
            Soon...

            <h2 class="font-bold text-lg">Prose component</h2>
            <x-rapidez::prose>
                <h1>Prose heading 1</h1>
                <h2>Prose heading 2</h2>
                <h3>Prose heading 3</h3>
                <h4>Prose heading 4</h4>
                <p>
                    For years <strong>parents</strong> have espoused the <i>health</i> benefits of eating garlic bread with cheese to their
                    children, with the food earning such an iconic status in our culture that kids will often dress
                    up as warm, cheesy loaf for <a href="/">Halloween</a>.
                </p>
                <ul>
                    <li>List item</li>
                    <li>List item</li>
                    <li>List item</li>
                    <li>List item</li>
                </ul>
                <ol>
                    <li>List item</li>
                    <li>List item</li>
                    <li>List item</li>
                    <li>List item</li>
                </ol>
                <blockquote>
                    With the food earning such an iconic status in our culture that kids will often dress
                </blockquote>
                <table>
                    <thead>
                        <tr>
                        <th>Song</th>
                        <th>Artist</th>
                        <th>Year</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>The Sliding Mr. Bones (Next Stop, Pottersville)</td>
                            <td>Malcolm Lockyer</td>
                            <td>1961</td>
                        </tr>
                        <tr>
                            <td>Witchy Woman</td>
                            <td>The Eagles</td>
                            <td>1972</td>
                        </tr>
                        <tr>
                            <td>Shining Star</td>
                            <td>Earth, Wind, and Fire</td>
                            <td>1975</td>
                        </tr>
                    </tbody>
                </table>
            </x-rapidez::prose>

            <h2 class="font-bold text-lg">Slideover component</h2>
            Soon...
        </div>
    </body>
</html>
