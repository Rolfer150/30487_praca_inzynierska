const salaryCalculate = () =>
{
    let salary = document.getElementById("salary").value;
    let salaryNetto = 0.00;
    let salaryBrutto = 0.00;
    let VAT = 0.23;


    let salaryTax = salary * VAT;
    salaryNetto = salary - salaryTax;
    salaryBrutto = salary;

    document.getElementById("salaryNetto").innerHTML = salaryNetto;
    document.getElementById("salaryBrutto").innerHTML = salaryBrutto;
}

document.getElementById("salaryCalcID").addEventListener("click", salaryCalculate);
