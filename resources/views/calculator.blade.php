<x-guest-layout>

<div>
    <div>
        <h1>Kalkulator wypłat (netto/brutto)</h1>
        <div>
            <table>
                <tr>
                    <th>Wypłata</th>
                    <th><input type="number" name="salary" id="salary" placeholder="Podaj wypłatę" /></th>
                </tr>
                <tr>
                    <th>Wypłata netto</th>
                    <<th>
                        <p id="salaryNetto"></p>
                    </th>
                </tr>
                <tr>
                    <th>Wypłata brutto</th>
                    <th>
                        <p id="salaryBrutto"></p>
                    </th>
                </tr>
            </table>
{{--            <script>--}}
{{--                function salaryCalculate()--}}
{{--                {--}}
{{--                    let salary = document.getElementById("salary").value;--}}
{{--                    let salaryNetto = 0.00;--}}
{{--                    let salaryBrutto = 0.00;--}}
{{--                    let VAT = 0.23;--}}


{{--                    let salaryTax = salary * VAT;--}}
{{--                    salaryNetto = salary - salaryTax;--}}
{{--                    salaryBrutto = salary;--}}

{{--                    document.getElementById("salaryNetto").innerHTML = salaryNetto;--}}
{{--                    document.getElementById("salaryBrutto").innerHTML = salaryBrutto;--}}

{{--                }--}}
{{--            </script>--}}
            <button id="salaryCalcID">Oblicz</button>
        </div>
    </div>

</div>
</x-guest-layout>
