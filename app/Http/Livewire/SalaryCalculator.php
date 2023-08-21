<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SalaryCalculator extends Component
{
    public float $salary = 0;
    public string $result;
    public string $calculation = 'Brutto';
    public bool $disabled = false;
    public bool $advanced = false;

    public function calculate()
    {
        $sal = (float)$this->salary;
        if($this->calculation == 'Brutto')
        {
            $this->result = number_format($sal * 0.7658, 2);
        }
        elseif ($this->calculation == 'Netto')
        {
            $this->result = number_format($sal + $sal * 0.7658, 2);
        }
    }

    public function update($property)
    {
        if ($this->salary == 0)
        {
            $this->disabled = true;
        }
        else
        {
            $this->disabled = false;
        }
    }

    public function render()
    {
        return view('livewire.salary-calculator')
            ->layout('layouts.app');
    }
}
