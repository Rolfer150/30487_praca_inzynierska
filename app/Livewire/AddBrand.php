<?php

namespace App\Livewire;

use Livewire\Component;

class AddBrand extends Component
{
    public $brands = null;
    public $user = null;
    public array $brandsArray = [];

    public function render()
    {
        $this->loadBrand();
        return view('livewire.add-brand');
    }

    public function addBrand()
    {
        $this->brandsArray[] = '';
    }

    public function removeBrand($index)
    {
        unset($this->brandsArray[$index]);
        $this->brandsArray = array_values($this->brandsArray);
    }

    public function loadBrand()
    {
        if ($this->user->categories)
        {
            foreach ($this->user->categories as $brand) $this->brandsArray[] = $brand->name;
        }
    }
}
