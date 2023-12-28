<div class="md:flex gap-x-6 p-3">
    <div>
        <h1>Kalkulator wypłat (netto/brutto)</h1>
        <div class="flex">
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
        </div>

        <p>{{$result}}</p>
        {{--            <div>--}}
        {{--                <table>--}}
        {{--                    <tr>--}}
        {{--                        <th>Wypłata</th>--}}
        {{--                        <th><input type="number" name="salary" id="salary" class="text-black" placeholder="Podaj wypłatę" /></th>--}}
        {{--                    </tr>--}}
        {{--                    <tr>--}}
        {{--                        <th>Wypłata netto</th>--}}
        {{--                        <<th>--}}
        {{--                            <p id="salaryNetto"></p>--}}
        {{--                        </th>--}}
        {{--                    </tr>--}}
        {{--                    <tr>--}}
        {{--                        <th>Wypłata brutto</th>--}}
        {{--                        <th>--}}
        {{--                            <p id="salaryBrutto"></p>--}}
        {{--                        </th>--}}
        {{--                    </tr>--}}
        {{--                </table>--}}
        {{--                <button id="salaryCalcID">Oblicz</button>--}}
        {{--            </div>--}}
    </div>
</div>
