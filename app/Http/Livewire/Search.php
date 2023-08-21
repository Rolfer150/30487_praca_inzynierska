<?php

namespace App\Http\Livewire;

use App\Models\Offer;
use Livewire\Component;

class Search extends Component
{
    public string $search = '';
    protected $queryString = ['search'];
    public function render()
    {
        $query = Offer::query();
        if ($this->search)
        {
            $query
                ->where('name', 'like', "%{$this->search}%")
                ->orWhere('description', 'like', "%{$this->search}%");
        }

        return view('livewire.search', ['offers' => $query]);
    }

    public function updated($property)
    {
        if ($property === 'search')
        {
            $this->resetPage();
        }
    }
}
