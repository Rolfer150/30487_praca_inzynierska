<?php

namespace App\Livewire;

use Livewire\Component;

class AddSkill extends Component
{
    public $skills = null;
    public $user = null;
    public $skillLevel = null;

    public array $skillArray = [];

    public array $skillLevelArray = [];

    public function render()
    {
//        dd($this->user->skills);
        $this->loadSkill();
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

    public function loadSkill()
    {
        if ($this->user->skills)
        {
            foreach ($this->user->skills as $skill)
            {
                $this->skillArray[] = $skill->skill;
                $this->skillLevelArray[] = $skill->skill_level;
            }
        }
    }
}
