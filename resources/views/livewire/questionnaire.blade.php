{{--<x-app-layout>--}}
    <div class="md:flex gap-x-6 p-3 justify-center">
        <form method="POST" action="{{ route('questionnaire.store') }}">
            @csrf
            <div class="flex flex-col items-center">
                <div class="bg-white dark:bg-gray-800/50">
                    <x-input-label for="name" :value="__('Tytuł Ankiety')"/>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                  required autofocus autocomplete="name"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>
                <button wire:click.prevent="addQuestion()">Dodaj Pytanie</button>
                @foreach($questions as $key => $value)
                    <div class="bg-white dark:bg-gray-800/50 mt-6">
                        <div>
                            <input type="text" placeholder="Wprowadź pytanie" name="question.{{$key}}" wire:model="questions.{{$key}}">
                        </div>
                    </div>
                    <div class="bg-white dark:bg-gray-800/50 mt-6">
                        <div>
                            <input type="text" placeholder="Wprowadź odpowiedź" name="answer.{{$key}}" wire:model="answer.{{$key}}">
                        </div>
                    </div>
                    <button wire:click.prevent="removeQuestion({{$key}})">Usuń Pytanie</button>
                @endforeach
                <x-primary-button class="ml-3">
                    {{ __('Potwierdź') }}
                </x-primary-button>
            </div>
        </form>
    </div>
{{--</x-app-layout>--}}




{{--    @foreach($inputs as $key => $value)--}}
{{--        <div class="bg-white dark:bg-gray-800/50 mt-6">--}}
{{--            <div>--}}
{{--                <x-input-label for="question" :value="__('Pytanie nr ')"/>--}}
{{--                <x-text-input wire:model="question.{{$value}}" id="question" class="block mt-1 w-full" type="text" name="question" :value="old('question')"--}}
{{--                              required autofocus autocomplete="question" placeholder="Wprowadź pytanie"/>--}}
{{--                <x-input-error :messages="$errors->get('question.{{$value}}')" class="mt-2"/>--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                <x-input-label for="answer" :value="__('Odpowiedź')"/>--}}
{{--                <x-text-input wire:model="answer.{{$value}}" id="answer" class="block mt-1 w-full" type="text" name="answer" :value="old('answer')"--}}
{{--                              required autofocus autocomplete="answer" placeholder="Wprowadź odpowiedź"/>--}}
{{--                <x-input-error :messages="$errors->get('answer.{{$value}}')" class="mt-2"/>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <button wire:click.prevent="removeQuestion({{$key}})">Usuń Pytanie</button>--}}
{{--    @endforeach--}}


{{--    <div class="bg-white dark:bg-gray-800/50">--}}
{{--        <x-input-label for="category" :value="__('Kategoria')"/>--}}
{{--        <select name="category"--}}
{{--                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">--}}
{{--            <option>Brak</option>--}}
{{--            @foreach($categories as $category)--}}
{{--                <option value="{{$category->id}}">{{$category->name}}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--        <x-input-error :messages="$errors->get('category')" class="mt-2"/>--}}
{{--    </div>--}}
