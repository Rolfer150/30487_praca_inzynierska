<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;

class QuestionnaireForm extends Component
{
    public array $questions = [];

    public array $answers = [];

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

    public function addAnswer($key)
    {
        $this->answers[] = '';
//        array_push($this->questions, $this->answers[] = '');
    }

    public function removeAnswer($key)
    {
        unset($this->answers[$key]);
        $this->answers = array_values($this->answers);
    }

}
