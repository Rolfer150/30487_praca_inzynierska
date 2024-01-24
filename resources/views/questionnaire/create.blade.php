<x-app-layout>
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
                <div class="bg-white dark:bg-gray-800/50">
                    <x-input-label for="description" :value="__('Opis')"/>
                    <x-input-textarea id="description" class="block mt-1 w-full" name="description"
                                      :value="old('description')" autofocus autocomplete="description"/>
                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                </div>

                <livewire:questionnaire-form/>
                <div class="bg-white d ark:bg-gray-800/50">
                    <x-input-label for="category" :value="__('Oferty, do których ma być przypisana ankieta')"/>
                    <select name="offers[]" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500
                            dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" multiple>
                        <option>Brak</option>
                        @foreach($userOffers as $offer)
                            <option value="{{$offer->id}}">{{$offer->name}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('offer')" class="mt-2"/>
                </div>
                <x-primary-button class="ml-3">
                    {{ __('Potwierdź') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
