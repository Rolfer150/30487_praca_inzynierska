<x-app-layout>
    <div class="md:flex gap-x-2 p-3">
        {{--    Lewy Panel    --}}
        <div class="flex justify-center p-6 w-1/4 bg-white dark:bg-gray-800/50 rounded-lg border-[1px] border-gray-300 dark:border-0">
            <div>
                <div class="flex grid-cols-2 justify-center items-center">
                    <p class="w-1/3 text-lg">Filtry</p>
                    <button class="text-xs w-2/3 text-gray-500 hover:text-orange-500">Wyczyść wszystkie filtry</button>
                </div>
                <div class="mt-9 dark:bg-gray-900 rounded-lg border-[1px] border-gray-300 dark:border-0 p-3">
                    <p class="text-lg mb-3">Wymiar pracy</p>
                    <ul>
                        @foreach($employments as $employment)
                            <li>
                                <input type="checkbox" class="rounded-md text-orange-600 dark:checked:bg-orange-500 bg-white
                            dark:bg-gray-900 ring-offset-0 focus:ring-orange-500 dark:ring-offset-gray-800">
                                {{$employment->name}} ({{$employment->employmentSum}})
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="mt-9 dark:bg-gray-900 rounded-lg border-[1px] border-gray-300 dark:border-0 p-3">
                    <p class="text-lg mb-3">Rodzaj umowy</p>
                    <ul>
                        @foreach($contracts as $contract)
                            <li>
                                <input type="checkbox" class="rounded-md text-orange-600 dark:checked:bg-orange-500 bg-white
                            dark:bg-gray-900 ring-offset-0 focus:ring-orange-500 dark:ring-offset-gray-800">
                                {{$contract->name}} ({{$contract->contractSum}})
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="mt-9 dark:bg-gray-900 rounded-lg border-[1px] border-gray-300 dark:border-0 p-3">
                    <p class="text-lg mb-3">Tryb pracy</p>
                    <ul>
                        <li>
                            <input type="checkbox" class="rounded-md text-orange-600 dark:checked:bg-orange-500 bg-white
                            dark:bg-gray-900 ring-offset-0 focus:ring-orange-500 dark:ring-offset-gray-800">
                            Praca stacjonarna
                        </li>
                        <li>
                            <input type="checkbox" class="rounded-md text-orange-600 dark:checked:bg-orange-500 bg-white
                            dark:bg-gray-900 ring-offset-0 focus:ring-orange-500 dark:ring-offset-gray-800">
                            Praca zdalna
                        </li>
                        <li>
                            <input type="checkbox" class="rounded-md text-orange-600 dark:checked:bg-orange-500 bg-white
                            dark:bg-gray-900 ring-offset-0 focus:ring-orange-500 dark:ring-offset-gray-800">
                            Praca mobilna
                        </li>
                        <li>
                            <input type="checkbox" class="rounded-md text-orange-600 dark:checked:bg-orange-500 bg-white
                            dark:bg-gray-900 ring-offset-0 focus:ring-orange-500 dark:ring-offset-gray-800">
                            Praca hybrydowa
                        </li>
                    </ul>
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
            <button class="fixed bottom-[24px] text-white text-lg bg-orange rounded-lg p-3 w-1/5 hover:bg-orange-500">Filtruj</button>
        </div>
        {{--    Prawy Panel    --}}
        <div class="w-3/4 p-3 bg-white dark:bg-gray-800/50 rounded-lg">
            <livewire:search />
            <div class="p-3">
                <h2 class="text-2xl text-gray-900 dark:text-gray-400">Najnowsze oferty</h2>
                <div class=" space-x-3 grid xl:col-span-3 lg:grid-cols-2 md:grid-cols-1 sm:col-span-1">
                    @foreach($new_offers as $offer)
                        <x-offer-item :offer="$offer"></x-offer-item>
                    @endforeach
                </div>
                <div class="m-2">
                    {{$new_offers->links()}}
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

</x-app-layout>
