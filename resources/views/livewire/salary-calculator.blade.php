    <div class="md:flex gap-x-6 p-3">
        <div>
            <h1>Kalkulator wypłat (netto/brutto)</h1>
            <input type="number" wire:model="salary" placeholder="Wprowadź wypłatę">
            <select wire:model="calculation">
                <option>Brutto</option>
                <option>Netto</option>
            </select>
            <button wire:click="calculate" class="disabled:cursor-not-allowed bg-indigo-50 disabled:opacity-70" {{$disabled ? ' disabled' : ''}}>Wynik</button>
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
