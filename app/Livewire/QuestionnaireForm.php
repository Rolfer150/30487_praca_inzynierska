<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Questionnaire;

class QuestionnaireForm extends Component
{
    public int $questionCounter = 1;

    public function render()
    {
        $questionCounter = $this->questionCounter;
        return view('livewire.questionnaire', compact('questionCounter'));
    }
}
