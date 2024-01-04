<?php

namespace App\Livewire;

use Livewire\Component;

class SalaryCalculator extends Component
{
    public float $salary = 0;
    public string $result;
    public string $retirementInsurance;
    public string $disabilityInsurance;
    public string $healthInsurance;
    public string $pensionInsurance;
    public string $calculation = 'Brutto';
    public bool $disabled = false;

    public function calculate(): void
    {
        $sal = (float)$this->salary;

        if ($this->calculation == 'Brutto') {
            $this->calculateNetSalary($sal);
        } elseif ($this->calculation == 'Netto') {
            $this->calculateGrossSalary($sal);
        }
    }

//    public function calculateAnnual(): void
//    {
//        $sal = (float)$this->salary;
//        $this->calculateNetSalary($sal);
//        $this->annualResult = number_format((float)$this->result * 12, 2);
//    }

    private function calculateNetSalary($sal): void
    {
        $retirementInsuranceRate = 0.0976; // 9.76%
        $healthInsuranceRate = 0.0775; // 7.75%
        $pensionInsuranceRate = 0.015; // 1.5%
        $disabilityInsuranceRate = 0.0245; // 2.45%

        $this->retirementInsurance = number_format($sal * $retirementInsuranceRate, 2);
        $this->healthInsurance = number_format($sal * $healthInsuranceRate, 2);
        $this->pensionInsurance = number_format($sal * $pensionInsuranceRate, 2);
        $this->disabilityInsurance = number_format($sal * $disabilityInsuranceRate, 2);

        $netSalary = $sal - ($this->pensionInsurance + $this->healthInsurance + $this->retirementInsurance + $this->disabilityInsurance);

        $this->result = number_format($netSalary, 2);
    }

    private function calculateGrossSalary($sal): void
    {
        $retirementInsuranceRate = 0.0976; // 9.76%
        $healthInsuranceRate = 0.0775; // 9%
        $pensionInsuranceRate = 0.015; // 1.5%
        $disabilityInsuranceRate = 0.0245; // 1.5%

        $this->retirementInsurance = number_format($sal * $retirementInsuranceRate, 2);
        $this->healthInsurance = number_format($sal * $healthInsuranceRate, 2);
        $this->pensionInsurance = number_format($sal * $pensionInsuranceRate, 2);
        $this->disabilityInsurance = number_format($sal * $disabilityInsuranceRate, 2);

        $grossSalary = $sal + $this->pensionInsurance + $this->healthInsurance + $this->retirementInsurance + $this->disabilityInsurance;

        $this->result = number_format($grossSalary, 2);
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
