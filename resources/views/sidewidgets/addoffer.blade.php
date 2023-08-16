<x-app-layout>
    <form method="POST" action="{{ route('sidewidgets.store') }}">
        @csrf
        <div class="flex flex-col items-center">
            <div class="bg-white dark:bg-gray-800/50">
                <x-input-label for="name" :value="__('Tytuł Oferty')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="bg-white dark:bg-gray-800/50">
                <x-input-label for="categorie" :value="__('Kategoria')"/>
                <x-input-select :options="$categories" class="block mt-1 w-full" required autofocus autocomplete="categorie" />
                <x-input-error :messages="$errors->get('categorie')" class="mt-2" />
            </div>
            <div class="flex bg-white dark:bg-gray-800/50">
                <x-input-label for="salary" :value="__('Cena')" />
                <x-text-input id="salary" class="block mt-1 w-full" type="number" name="salary" :value="old('salary')" autofocus autocomplete="salary" />
                <x-input-select :options="$payments" class="block mt-1 w-full" />
                <x-input-error :messages="$errors->get('salary')" class="mt-2" />
            </div>
            <div class="bg-white dark:bg-gray-800/50">
                <x-input-label for="employment" :value="__('Wymiar Pracy')" />
                <x-input-select :options="$employments" class="block mt-1 w-full" />
                <x-input-error :messages="$errors->get('employment')" class="mt-2" />
            </div>
            <div class="bg-white dark:bg-gray-800/50">
                <x-input-label for="contract" :value="__('Rodzaj umowy')" />
                <x-input-select :options="$contracts" class="block mt-1 w-full" />
                <x-input-error :messages="$errors->get('contract')" class="mt-2" />
            </div>
            <div class="bg-white dark:bg-gray-800/50">
                <x-input-label for="vacancy" :value="__('Miejsca')" />
                <x-text-input id="vacancy" class="block mt-1 w-full" type="number" name="vacancy" :value="old('vacancy')" autofocus autocomplete="vacancy" />
                <x-input-error :messages="$errors->get('vacancy')" class="mt-2" />
            </div>
            <div class="bg-white dark:bg-gray-800/50">
                <x-input-label for="description" :value="__('Opis')" />
                <x-input-textarea id="description" class="block mt-1 w-full" name="description" :value="old('description')" autofocus autocomplete="description" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div class="bg-white dark:bg-gray-800/50">
                <x-input-label for="image_path" :value="__('Grafika')" />
                <x-text-input id="image_path" class="block mt-1 w-full" type="file" name="image_path" :value="old('image_path')" autofocus autocomplete="image_path" />
                <x-input-error :messages="$errors->get('image_path')" class="mt-2" />
            </div>
            <x-primary-button class="ml-3">
                {{ __('Potwierdź') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
