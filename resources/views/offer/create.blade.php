<x-app-layout>
        <form method="POST" action="{{ route('offer.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="flex pt-3 gap-3">
                {{-- Lewa strona --}}
                <div class="w-1/2 ml-24 border-[1px] border-gray-300 dark:border-0 bg-gray-300 dark:bg-gray-800/50 rounded-lg">
                    <div class="p-3 w-full">
                        <x-input-label for="name" :value="__('Tytuł Oferty')"/>
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                      required autofocus autocomplete="name"/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>
                    <div class="flex gap-3">
                        <div class="p-3 pr-1 w-1/3">
                            <x-input-label for="vacancy" :value="__('Miejsca')"/>
                            <x-text-input id="vacancy" class="block mt-1 w-full" type="number" name="vacancy"
                                          :value="old('vacancy')" autofocus autocomplete="vacancy"/>
                            <x-input-error :messages="$errors->get('vacancy')" class="mt-2"/>
                        </div>
                        <div class="p-3 pl-1 w-2/3">
                            <x-input-label for="salary" :value="__('Cena')"/>
                            <div class="flex gap-3">
                                <x-text-input id="salary" class="block mt-1 w-full" type="number" name="salary"
                                              :value="old('salary')" autofocus autocomplete="salary"/>
                                <select name="payment"
                                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
                                focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500
                                dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    @foreach($payments as $payment)
                                        <option value="{{$payment->value}}">{{$payment->value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <x-input-error :messages="$errors->get('salary')" class="mt-2"/>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <div class="p-3 pr-1 w-1/2">
                            <x-input-label for="category" :value="__('Kategoria')"/>
                            <select name="category_id"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
                                    focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500
                                    dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
                                <option value=""></option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category')" class="mt-2"/>
                        </div>
                        <div class="p-3 pl-1 w-1/2">
                            <x-input-label for="employment" :value="__('Wymiar Pracy')"/>
                            <select name="employment"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
                                    focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500
                                    dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
                                <option value=""></option>
                                @foreach($employments as $employment)
                                    <option value="{{$employment->value}}">{{$employment->value}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('employment')" class="mt-2"/>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <div class="p-3 pr-1 w-1/2">
                            <x-input-label for="contract" :value="__('Rodzaj umowy')"/>
                            <select name="contract"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
                                    focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500
                                    dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
                                <option value=""></option>
                                @foreach($contracts as $contract)
                                    <option value="{{$contract->value}}">{{$contract->value}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('contract')" class="mt-2"/>
                        </div>
                        <div class="p-3 pl-1 w-1/2">
                            <x-input-label for="work_mode" :value="__('Tryb pracy')"/>
                            <select name="work_mode"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
                                    focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500
                                    dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
                                <option value=""></option>
                                @foreach($workModes as $workMode)
                                    <option value="{{$workMode->value}}">{{$workMode->value}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('work_mode')" class="mt-2"/>
                        </div>
                    </div>

                    <div class="p-3 w-full">
                        <x-input-label for="description" :value="__('Opis')"/>
                        <x-input-textarea id="description" class="block mt-1 w-full" name="description"
                                          :value="old('description')" autofocus autocomplete="description"/>
                        <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                    </div>
                </div>

                {{-- Prawa strona --}}
                <div class="w-1/2 mr-24 border-[1px] border-gray-300 dark:border-0 bg-gray-300 dark:bg-gray-800/50 rounded-lg">
                    <livewire:job-description :skills="$skills" :skill-level="$skillLevel" />

                    <div class="p-3 w-full">
                        <x-input-label for="image_path" :value="__('Grafika')"/>
                        <input id="image_path" class="block mt-1 w-full" type="file" name="image_path"/>
                        <x-input-error :messages="$errors->get('image_path')" class="mt-2"/>
                    </div>
                    <x-primary-button class="ml-3">
                        {{ __('Potwierdź') }}
                    </x-primary-button>
                </div>
            </div>
        </form>
</x-app-layout>
