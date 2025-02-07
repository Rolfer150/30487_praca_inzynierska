<?php

namespace App\Livewire;

use Livewire\Component;

class JobDescription extends Component
{
    public $skills = null;
    public $skillLevel = null;
    public array $jobDescriptions = [
        'tasks' => [
            '0' => 'wartosc',
        ],
        'skills' => [
            '0' => '',
        ],
        'expectancies' => [
            '0' => '',
        ],
        'additionals' => [
            '0' => '',
        ],
        'assurances' => [
            '0' => '',
        ]
    ];

    public function render()
    {
        return view('livewire.job-description');
    }

    public function addDescription($key)
    {
        $this->jobDescriptions[$key][] = '';
    }
}
