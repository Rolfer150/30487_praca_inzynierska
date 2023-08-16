<x-app-layout>
<div>
    <div class="md:flex gap-x-2 p-3">
        <div class="p-6 w-1/4 bg-white dark:bg-gray-800/50 rounded-lg">
            <div class="flex grid-cols-2 justify-center items-center">
                <p class="w-1/2 text-lg">Filtry</p>
                <button class="text-xs w-1/2 text-gray-500">Wyczyść wszystkie filtry</button>
            </div>
            <div class="mt-9">
                <p class="w-1/2 text-lg">Wymiar pracy</p>
                @foreach($employments as $employment)
                    <input type="checkbox"> {{$employment->name}} ({{$employment->employmentSum}})
                @endforeach
            </div>
            <div class="mt-9">
                <p class="w-1/2 text-lg">Rodzaj umowy</p>
                @foreach($contracts as $contract)
                    <input type="checkbox"> {{$contract->name}} ({{$contract->contractSum}})
                @endforeach
            </div>
        </div>
        <div class="w-3/4 p-3 bg-white dark:bg-gray-800/50 rounded-lg">
            <div class="p-3 flex">
                <input type="text" placeholder="Szukaj..." class="w-full bg-white dark:bg-gray-900 text-gray-900
                dark:text-gray-400 placeholder-gray-500 rounded-lg">
                <button class="ml-4 pl-3 pr-3 text-white rounded-lg bg-orange hover:bg-orange-500">Wyszukaj</button>
            </div>
            <div class="p-3">
                <h2 class="text-2xl text-gray-900 dark:text-gray-400">Najnowsze oferty</h2>
                <div class=" space-x-3 grid xl:col-span-3 lg:grid-cols-2 md:grid-cols-1 sm:col-span-1">
                    @foreach($new_offers as $offer)
                        <x-offer-item :offer="$offer"></x-offer-item>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
</x-app-layout>
