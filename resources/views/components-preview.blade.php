<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com"></script>

        <title>Rapidez Blade Components Preview</title>

        <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
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

            <h2 class="font-bold text-lg">Slideover component</h2>
            Soon...

            <h2 class="font-bold text-lg">Accordion component</h2>

            <div class="grid grid-cols-3 gap-5">
                <h3 class="font-bold text-md">Default</h3>
                <h3 class="font-bold text-md">Radio</h3>
                <h3 class="font-bold text-md">Mobile only</h3>

                <div class="flex flex-col gap-3">
                    <x-rapidez::accordion id="checkbox-question-1" class="rounded border p-3">
                        <x-slot:label class="font-bold">
                            Question 1
                        </x-slot:label>
                        <x-slot:content class="">
                            Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Reprehenderit eum in deleniti dicta ducimus perspiciatis provident tempore. Consequuntur nemo blanditiis delectus, quasi velit illum ipsa quibusdam maiores cupiditate itaque repellendus.
                        </x-slot:content>
                    </x-rapidez::accordion>
                    <x-rapidez::accordion id="checkbox-question-2" class="rounded border p-3">
                        <x-slot:label class="font-bold">
                            Question 2
                        </x-slot:label>
                        <x-slot:content class="">
                            Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Reprehenderit eum in deleniti dicta ducimus perspiciatis provident tempore. Consequuntur nemo blanditiis delectus, quasi velit illum ipsa quibusdam maiores cupiditate itaque repellendus.
                        </x-slot:content>
                    </x-rapidez::accordion>
                </div>

                <div class="flex flex-col gap-3">
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
            </div>
        </div>
    </body>
</html>
