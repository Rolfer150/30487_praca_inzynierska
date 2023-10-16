<x-app-layout>
    <div class="md:flex gap-x-6 p-3 justify-center">
        <form method="POST" action="{{ route('offer.store') }}">
            @csrf
            <div class="flex flex-col items-center">
                <div class="bg-white dark:bg-gray-800/50">
                    <x-input-label for="name" :value="__('Tytuł Oferty')"/>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                  required autofocus autocomplete="name"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>
                <div class="bg-white d ark:bg-gray-800/50">
                    <x-input-label for="category" :value="__('Kategoria')"/>
                    <select name="category_id"
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="">Brak</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category')" class="mt-2"/>
                </div>
                <div class="flex bg-white dark:bg-gray-800/50">
                    <x-input-label for="salary" :value="__('Cena')"/>
                    <x-text-input id="salary" class="block mt-1 w-full" type="number" name="salary"
                                  :value="old('salary')" autofocus autocomplete="salary"/>
                    <select name="payment"
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="">Brak</option>
                        @foreach($payments as $payment)
                            <option value="{{$payment->value}}">{{$payment->value}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('salary')" class="mt-2"/>
                </div>
                <div class="bg-white dark:bg-gray-800/50">
                    <x-input-label for="employment" :value="__('Wymiar Pracy')"/>
                    <select name="employment_id"
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="">Brak</option>
                        @foreach($employments as $employment)
                            <option value="{{$employment->id}}">{{$employment->name}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('employment')" class="mt-2"/>
                </div>
                <div class="bg-white dark:bg-gray-800/50">
                    <x-input-label for="contract" :value="__('Rodzaj umowy')"/>
                    <select name="contract_id"
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="">Brak</option>
                        @foreach($contracts as $contract)
                            <option value="{{$contract->id}}">{{$contract->name}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('contract')" class="mt-2"/>
                </div>
                <div class="bg-white dark:bg-gray-800/50">
                    <x-input-label for="work_mode" :value="__('Tryb pracy')"/>
                    <select name="work_mode_id"
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="">Brak</option>
                        @foreach($work_modes as $work_mode)
                            <option value="{{$work_mode->id}}">{{$work_mode->name}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('work_mode')" class="mt-2"/>
                </div>
                <div class="bg-white dark:bg-gray-800/50">
                    <x-input-label for="vacancy" :value="__('Miejsca')"/>
                    <x-text-input id="vacancy" class="block mt-1 w-full" type="number" name="vacancy"
                                  :value="old('vacancy')" autofocus autocomplete="vacancy"/>
                    <x-input-error :messages="$errors->get('vacancy')" class="mt-2"/>
                </div>
                <div class="bg-white dark:bg-gray-800/50">
                    <x-input-label for="description" :value="__('Opis')"/>
                    <x-input-textarea id="description" class="block mt-1 w-full" name="description"
                                      :value="old('description')" autofocus autocomplete="description"/>
                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                </div>
                <div class="bg-white dark:bg-gray-800/50">
                    <x-input-label for="image_path" :value="__('Grafika')"/>
                    <x-text-input id="image_path" class="block mt-1 w-full" type="file" name="image_path"/>
                    <x-input-error :messages="$errors->get('image_path')" class="mt-2"/>
                </div>
                <x-primary-button class="ml-3">
                    {{ __('Potwierdź') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
