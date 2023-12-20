<?php

namespace App\Livewire;

use Livewire\Component;

class AddSkill extends Component
{
    public $skills = null;
    public $user = null;
    public $skillLevel = null;

    public array $skillArray = [''];

    public array $skillLevelArray = [];

    public function render()
    {
        return view('livewire.add-skill');
    }

    public function addSkill()
    {
        $this->skillArray[] = '';
    }

    public function removeSkill($index)
    {
        unset($this->skillArray[$index]);
        $this->skillArray = array_values($this->skillArray);
    }
}
