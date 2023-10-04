<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;

class QuestionnaireForm extends Component
{
    public array $questions = [];

    public function render()
    {
        return view('livewire.questionnaire')
            ->layout('layouts.app');
    }

    public function addQuestion()
    {
        $this->questions[] = [
            'answers' => [],
        ];
    }

    public function removeQuestion($qKey)
    {
        unset($this->questions[$qKey]);
        $this->questions = array_values($this->questions);
    }

    public function addAnswer($qKey)
    {
        $this->questions[$qKey]['answers'][] = '';
    }

    public function removeAnswer($qKey, $aKey)
    {
        unset($this->questions[$qKey]['answers'][$aKey]);
        $this->questions[$qKey]['answers'] = array_values($this->questions[$qKey]['answers']);
    }

}
