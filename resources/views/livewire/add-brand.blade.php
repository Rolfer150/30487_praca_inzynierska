<div>
    @foreach($brandsArray as $index => $category)
        <div class="flex">
            <div class="mr-3 w-1/2">
                <x-input-label for="categories[category]" :value="__('Branża zawodowa')" />
                <select wire:model="brandsArray.{{ $index }}" placeholder="Wybierz Twoje umiejętności..." id="categories[category]"
                        name="categories[{{$index}}][category]" :value="old('categories[category]', $user->categories[category])"
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900
                        dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                    @foreach($brands as $category)
                        <option  value="{{$category}}">{{$category}}</option>
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('categories')" />
            </div>
            <x-secondary-button class="w-1/5 mt-6 justify-center" wire:click.prevent="removeBrand({{ $index }})">Usuń</x-secondary-button>
        </div>
    @endforeach
    <x-secondary-button class="w-1/5 mt-6 justify-center" wire:click.prevent="addBrand">+</x-secondary-button>
</div>
