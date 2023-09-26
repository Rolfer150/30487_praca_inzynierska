<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireForm extends Component
{
    public $questions = [''];
    public array $inputs = [];

    public function render()
    {
        return view('livewire.questionnaire')
            ->layout('layouts.app');
    }

    public function addQuestion()
    {
        $this->questions[] = '';
    }

    public function removeQuestion($key)
    {
        unset($this->questions[$key]);
        $this->questions = array_values($this->questions);
    }

    public function submit()
    {
        echo ('Cześć');

    }
}
