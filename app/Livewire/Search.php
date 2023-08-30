<?php

namespace App\Livewire;

use App\Models\Contract;
use App\Models\Employment;
use App\Models\Offer;
use App\Models\Workmode;
use Illuminate\Http\Request;
use Livewire\Component;

class Search extends Component
{
    public string $search = '';
    protected $queryString = ['search'];
    public function render()
    {
        $employments = Employment::employmentFilter();
        $contracts = Contract::contractFilter();
        $workmodes = Workmode::workmodeFilter();

        $query = Offer::query();
        if ($this->search)
        {
            $query
                ->where('name', 'like', "%{$this->search}%")
                ->orWhere('description', 'like', "%{$this->search}%");
        }

        return view('livewire.search', compact('employments', 'contracts', 'workmodes'));
    }

    public function searchFilter(Request $request)
    {

    }
}
