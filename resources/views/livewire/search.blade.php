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
                        <input type="checkbox" name="{{$employment->name}}" class="rounded-md text-orange-600 dark:checked:bg-orange-500 bg-white
                            dark:bg-gray-900 ring-offset-0 focus:ring-orange-500 dark:ring-offset-gray-800" wire:click="searchFilter">
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
                        <input type="checkbox" name="{{$contract->name}}" class="rounded-md text-orange-600 dark:checked:bg-orange-500 bg-white
                            dark:bg-gray-900 ring-offset-0 focus:ring-orange-500 dark:ring-offset-gray-800">
                        {{$contract->name}} ({{$contract->contractSum}})
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="mt-9 dark:bg-gray-900 rounded-lg border-[1px] border-gray-300 dark:border-0 p-3">
            <p class="text-lg mb-3">Tryb pracy</p>
            <ul>
                @foreach($workmodes as $workmode)
                    <li>
                        <input type="checkbox" name="{{$workmode->name}}" class="rounded-md text-orange-600 dark:checked:bg-orange-500 bg-white
                            dark:bg-gray-900 ring-offset-0 focus:ring-orange-500 dark:ring-offset-gray-800">
                        {{$workmode->name}} ({{$workmode->workmodeSum}})
                    </li>
                @endforeach
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
    <button class="fixed bottom-[24px] text-white font-bold text-lg bg-orange rounded-lg p-3 w-1/5 hover:bg-orange-500">Filtruj</button>
</div>
