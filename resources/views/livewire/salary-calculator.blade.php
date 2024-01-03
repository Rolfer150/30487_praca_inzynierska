<div class="md:flex p-3 h-[80vh]">
    <div class="ml-32 mr-32 w-full mt-10">
        <h1 class="text-3xl text-gray-900 dark:text-gray-400 text-center">Kalkulator wypłat (netto/brutto)</h1>
        <div class="flex justify-center gap-3">
            <input type="number" wire:model="salary" placeholder="Wprowadź wypłatę" class="mt-1 block w-full rounded-md shadow-sm border-gray-300
                        dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600
                        focus:ring-indigo-500 dark:focus:ring-indigo-600">
            <select wire:model="calculation" class="mt-1 block rounded-md shadow-sm border-gray-300
                        dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600
                        focus:ring-indigo-500 dark:focus:ring-indigo-600 cursor-pointer">
                <option>Brutto</option>
                <option>Netto</option>
            </select>
            <button wire:click="calculate"
                    class="disabled:cursor-not-allowed disabled:opacity-70 text-white rounded-lg bg-orange hover:bg-orange-500 pl-3 pr-3" {{$disabled ? ' disabled' : ''}}>
                Wynik
            </button>
{{--            <button wire:click="calculateAnnual"--}}
{{--                    class="disabled:cursor-not-allowed disabled:opacity-70 text-white rounded-lg bg-green-500 hover:bg-green-600 pl-3 pr-3" {{$disabled ? ' disabled' : ''}}>--}}
{{--                Oblicz roczne wynagrodzenie--}}
{{--            </button>--}}
        </div>
        <div class="bg-white dark:bg-gray-800/50 border-[1px] border-gray-300 dark:border-0 mt-10 p-3 rounded-lg">
            @if($calculation == 'Brutto')
                <h1 class="text-2xl">Wynik Netto: {{$result}}</h1>
            @else
                <h1>Wynik Brutto: {{$result}}</h1>
            @endif
    {{--        <p>Roczne wynagrodzenie: {{$annualResult}}</p>--}}
            <div class="p-3">
                @if($calculation == 'Brutto')
                    <p class="mb-3">Ubezpieczenie emerytalne: {{$socialSecurity}}</p>
                    <p class="mb-3">Ubezpieczenie rentowe: {{$retirementInsurance}}</p>
                    <p class="mb-3">Ubezpieczenie chorobowe: {{$disabilityInsurance}}</p>
                    <p class="mb-3">Ubezpieczenie zdrowotne: {{$healthInsurance}}</p>
                @endif
            </div>
        </div>
    </div>
</div>
