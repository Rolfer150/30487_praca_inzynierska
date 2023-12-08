<?php

namespace App\Livewire;

use Livewire\Component;

class SalaryCalculator extends Component
{
    public float $salary = 0;
    public string $result;
    public string $calculation = 'Brutto';
    public bool $disabled = false;
    public bool $advanced = false;

    public function calculate(): void
    {
        $sal = (float)$this->salary;

        if ($this->calculation == 'Brutto') {
            // Obliczanie netto na podstawie brutto

            // Ustaw stawki składek (proszę dostosować je do obecnych przepisów):
            $socialSecurityRate = 0.0976; // 9.76%
            $healthInsuranceRate = 0.0775; // 9%
            $retirementInsuranceRate = 0.015; // 1.5%
            $disabilityInsuranceRate = 0.0245; // 1.5%

            // Obliczanie składek:
            $socialSecurity = $sal * $socialSecurityRate;
            $healthInsurance = $sal * $healthInsuranceRate;
            $retirementInsurance = $sal * $retirementInsuranceRate;
            $disabilityInsurance = $sal * $disabilityInsuranceRate;

            // Obliczanie netto:
            $netSalary = $sal - ($socialSecurity + $healthInsurance + $retirementInsurance + $disabilityInsurance);

            $this->result = number_format($netSalary, 2);
        } elseif ($this->calculation == 'Netto') {
            // Obliczanie brutto na podstawie netto

            // Ustaw stawki składek (proszę dostosować je do obecnych przepisów):
            $socialSecurityRate = 0.0976; // 9.76%
            $healthInsuranceRate = 0.0775; // 9%
            $retirementInsuranceRate = 0.015; // 1.5%
            $disabilityInsuranceRate = 0.0245; // 1.5%

            // Obliczanie składek:
            $socialSecurity = $sal * $socialSecurityRate;
            $healthInsurance = $sal * $healthInsuranceRate;
            $retirementInsurance = $sal * $retirementInsuranceRate;
            $disabilityInsurance = $sal * $disabilityInsuranceRate;

            // Obliczanie brutto:
            $grossSalary = $sal + $socialSecurity + $healthInsurance + $retirementInsurance + $disabilityInsurance;

            $this->result = number_format($grossSalary, 2);
        }
    }

    public function update($property): void
    {
        if ($this->salary == 0) {
            $this->disabled = true;
        } else {
            $this->disabled = false;
        }
    }

    public function render()
    {
        return view('livewire.salary-calculator')
            ->layout('layouts.app');
    }
}
