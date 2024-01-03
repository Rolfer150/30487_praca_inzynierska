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
    public string $socialSecurity;
    public string $annualResult;
    public string $calculation = 'Brutto';
    public bool $disabled = false;
    public bool $advanced = false;

    public function calculate(): void
    {
        $sal = (float)$this->salary;

        if ($this->calculation == 'Brutto') {
            $this->calculateNetSalary($sal);
        } elseif ($this->calculation == 'Netto') {
            $this->calculateGrossSalary($sal);
        }
    }

    public function calculateAnnual(): void
    {
        $sal = (float)$this->salary;
        $this->calculateNetSalary($sal);
        $this->annualResult = number_format((float)$this->result * 12, 2);
    }

    private function calculateNetSalary($sal): void
    {
        $socialSecurityRate = 0.0976; // 9.76%
        $healthInsuranceRate = 0.0775; // 9%
        $retirementInsuranceRate = 0.015; // 1.5%
        $disabilityInsuranceRate = 0.0245; // 1.5%

        $this->socialSecurity = number_format($sal * $socialSecurityRate, 2);
        $this->healthInsurance = number_format($sal * $healthInsuranceRate, 2);
        $this->retirementInsurance = number_format($sal * $retirementInsuranceRate, 2);
        $this->disabilityInsurance = number_format($sal * $disabilityInsuranceRate, 2);

        $netSalary = $sal - ($this->socialSecurity + $this->healthInsurance + $this->retirementInsurance + $this->disabilityInsurance);

        $this->result = number_format($netSalary, 2);
    }

    private function calculateGrossSalary($sal): void
    {
        $socialSecurityRate = 0.0976; // 9.76%
        $healthInsuranceRate = 0.0775; // 9%
        $retirementInsuranceRate = 0.015; // 1.5%
        $disabilityInsuranceRate = 0.0245; // 1.5%

        $this->socialSecurity = number_format($sal * $socialSecurityRate, 2);
        $this->healthInsurance = number_format($sal * $healthInsuranceRate, 2);
        $this->retirementInsurance = number_format($sal * $retirementInsuranceRate, 2);
        $this->disabilityInsurance = number_format($sal * $disabilityInsuranceRate, 2);

        $grossSalary = $sal + $this->socialSecurity + $this->healthInsurance + $this->retirementInsurance + $this->disabilityInsurance;

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
