<div class="md:flex gap-x-2 p-3">
    {{--    Lewy Panel    --}}
    <div class="flex justify-center p-6 w-1/4 bg-white dark:bg-gray-800/50 rounded-lg border-[1px] border-gray-300 dark:border-0">
        <div>
            <div class="flex grid-cols-2 justify-center items-center">
                <p class="w-1/3 text-lg">Filtry</p>
                <button wire:click="clearall" class="text-xs w-2/3 text-gray-500 hover:text-orange-500">Wyczyść wszystkie filtry</button>
            </div>
            <div class="mt-9 dark:bg-gray-900 rounded-lg border-[1px] border-gray-300 dark:border-0 p-3">
                <p class="text-lg mb-3">Wymiar pracy</p>
                <ul>
                    @foreach($employments as $employment)
                        <li>
                            <input type="checkbox" wire:model="filterEmployments" value="{{$employment->id}}" class="rounded-md text-orange-600 dark:checked:bg-orange-500 bg-white
                            dark:bg-gray-900 ring-offset-0 focus:ring-orange-500 dark:ring-offset-gray-800" >
                            {{$employment->name}} ({{$employment->employmentSum}})
                        </li>
                    @endforeach
                </ul>
                <div>Wynik: {{ var_export($filterEmployments) }}</div>
            </div>
            <div class="mt-9 dark:bg-gray-900 rounded-lg border-[1px] border-gray-300 dark:border-0 p-3">
                <p class="text-lg mb-3">Rodzaj umowy</p>
                <ul>
                    @foreach($contracts as $contract)
                        <li>
                            <input type="checkbox" wire:model="filterContracts" value="{{$contract->id}}" class="rounded-md text-orange-600 dark:checked:bg-orange-500 bg-white
                            dark:bg-gray-900 ring-offset-0 focus:ring-orange-500 dark:ring-offset-gray-800">
                            {{$contract->name}} ({{$contract->contractSum}})
                        </li>
                    @endforeach
                </ul>
                <div>Wynik: {{ var_export($filterContracts) }}</div>
            </div>
            <div class="mt-9 dark:bg-gray-900 rounded-lg border-[1px] border-gray-300 dark:border-0 p-3">
                <p class="text-lg mb-3">Tryb pracy</p>
                <ul>
                    @foreach($workmodes as $workmode)
                        <li>
                            <input type="checkbox" wire:model="filterWorkmodes" value="{{$workmode->id}}" class="rounded-md text-orange-600 dark:checked:bg-orange-500 bg-white
                            dark:bg-gray-900 ring-offset-0 focus:ring-orange-500 dark:ring-offset-gray-800">
                            {{$workmode->name}} ({{$workmode->workmodeSum}})
                        </li>
                    @endforeach
                </ul>
                <div>Wynik: {{ var_export($filterWorkmodes) }}</div>
            </div>
            <div class="mt-9 dark:bg-gray-900 rounded-lg border-[1px] border-gray-300 dark:border-0 p-3">
                <div class="flex w-full justify-between items-center">
                    <p class="text-lg mb-3">Wypłata</p>
                    <p>Wartość: <span id="showValue"></span></p>
                </div>
                <input id="range" class="w-full" type="range" min="0" max="100000" value="5000">
                <div class="flex w-full justify-between items-center">
                    <p>0</p>
                    <p>100 000</p>
                </div>
            </div>
        </div>
        <button wire:click="searchFilter" class="fixed bottom-[24px] text-white font-bold text-lg bg-orange rounded-lg p-3 w-1/5 hover:bg-orange-500">Filtruj</button>
    </div>
    {{--    Prawy Panel    --}}
    <div class="w-3/4 p-3 bg-white dark:bg-gray-800/50 rounded-lg">
                        <div class="p-3 flex" wire:model.live="search">
                            <input type="text" placeholder="Szukaj..." class="w-full focus:border-orange-500 focus:ring-orange-500
                        focus:ring-1 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-400 placeholder-gray-500
                        border-gray-300 dark:border-0 rounded-lg">
                            <button class="ml-4 pl-3 pr-3 text-white rounded-lg bg-orange hover:bg-orange-500" type="submit">Wyszukaj</button>
                        </div>

        <div class="p-3">
            <div class="flex justify-between">
                <h2 class="text-2xl text-gray-900 dark:text-gray-400">Najnowsze oferty</h2>
                <div>
                    <label>Na stronę</label>
                    <select wire:model.live="perPage">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
            <div class=" space-x-3 grid xl:col-span-3 lg:grid-cols-2 md:grid-cols-1 sm:col-span-1">
                @foreach($offers as $offer)
                    <x-offer-item :offer="$offer"></x-offer-item>
                @endforeach
            </div>
            <div class="m-2">
                {{$offers->links()}}
            </div>
        </div>
    </div>
</div>

<script>
    var slider = document.getElementById("range");
    var output = document.getElementById("showValue");
    output.innerHTML = slider.value;

    slider.oninput = function() {
        output.innerHTML = this.value;
    }
</script>
