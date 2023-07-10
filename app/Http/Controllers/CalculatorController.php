<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CalculatorController extends Controller
{
    public function index(): View
    {
        return view('calculator');
    }

    public function getSalaryCalculation()
    {
//        $VAT = 0.23;
//        $tax = $salary * $VAT;
//        $salaryNetto = $salary - $tax;
//        $salaryBrutto = $salary;
//        $salaryCalculated = [$salaryNetto, $salaryBrutto];
//        return $salaryCalculated;
    }

}
