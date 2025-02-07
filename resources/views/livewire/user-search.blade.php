<div class="md:flex gap-x-2 p-3">
    {{--    Lewy Panel    --}}
    <div class="flex justify-center p-6 w-1/4 bg-white dark:bg-gray-800/50 rounded-lg border-[1px] border-gray-300 dark:border-0 ml-16">
        <div>
            <div class="flex grid-cols-2 justify-center items-center">
                <p class="w-1/3 text-lg">Filtry</p>
                <button wire:click="clearAll"
                        class="text-xs w-2/3 text-gray-500 hover:text-orange-500">Wyczyść wszystkie filtry</button>
            </div>
            <div class="mt-9 dark:bg-gray-900 rounded-lg border-[1px] border-gray-300 dark:border-0 p-3">
                <p class="text-lg mb-3">Branża firmy</p>
                <ul>
                    @foreach($brands as $brand)
                        <li wire:key="{{$brand->id}}">
                            <input type="checkbox" wire:model="filterUsers" value="{{$brand->id}}"
                                   class="rounded-md text-orange-600 dark:checked:bg-orange-500 bg-white
                                   dark:bg-gray-900 ring-offset-0 focus:ring-orange-500 dark:ring-offset-gray-800">
                            {{$brand->name}}
                        </li>
                    @endforeach
                </ul>
{{--                <div>Wynik: {{ var_export($filterUsers) }}</div>--}}
            </div>
{{--            <div class="mt-9 dark:bg-gray-900 rounded-lg border-[1px] border-gray-300 dark:border-0 p-3">--}}
{{--                <p class="text-lg mb-3">Lokalizacja</p>--}}
{{--                <ul>--}}
{{--                                        @foreach($categories as $category)--}}
{{--                                            <li wire:key="{{$category->id}}">--}}
{{--                                                <input type="checkbox" wire:model="filterCategories" value="{{$category->id}}"--}}
{{--                                                       class="rounded-md text-orange-600 dark:checked:bg-orange-500 bg-white--}}
{{--                                                       dark:bg-gray-900 ring-offset-0 focus:ring-orange-500 dark:ring-offset-gray-800">--}}
{{--                                                {{$category->name}} ({{$category->categorySum}})--}}
{{--                                            </li>--}}
{{--                                        @endforeach--}}
{{--                </ul>--}}
{{--                                <div>Wynik: {{ var_export($filterCategories) }}</div>--}}
{{--            </div>--}}

        </div>
        <button wire:click="searchFilter"
                class="fixed bottom-[24px] text-white font-bold text-lg bg-orange rounded-lg
                p-3 w-1/5 hover:bg-orange-500">Filtruj</button>
    </div>
    {{--    Prawy Panel    --}}
    <div class="w-3/4 p-3 bg-white dark:bg-gray-800/50 rounded-lg mr-16">
        <div class="p-3 flex" wire:model="search">
            <input type="text" placeholder="Szukaj..."
                   class="w-full focus:border-orange-500 focus:ring-orange-500
                   focus:ring-1 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-400 placeholder-gray-500
                   border-gray-300 dark:border-0 rounded-lg">
            <button wire:click="userRender" class="ml-4 pl-3 pr-3 text-white rounded-lg bg-orange hover:bg-orange-500"
                    type="submit">Wyszukaj
            </button>
        </div>

        <div class="p-3">
            <div class="flex justify-between">
                <div>
                    <label>Na stronę</label>
                    <select wire:model.live="perPage" class="mt-1 block w-full rounded-md shadow-sm border-gray-300
                        dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600
                        focus:ring-indigo-500 dark:focus:ring-indigo-600">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
{{--                    <div>Wynik: {{ var_export($perPage) }}</div>--}}
                </div>
            </div>
                        <div class=" space-x-3 grid xl:col-span-3 lg:grid-cols-2 md:grid-cols-1 sm:col-span-1">
                            @foreach($users as $user)
                                <x-user-item :user="$user" wire:key="{{$user->id}}"></x-user-item>
                            @endforeach
                        </div>
                        <div class="m-2">{{$users->links()}}</div>
        </div>
    </div>
</div>

<script>
    var slider = document.getElementById("range");
    var output = document.getElementById("showValue");
    output.innerHTML = slider.value;

    slider.oninput = function () {
        output.innerHTML = this.value;
    }
</script>
