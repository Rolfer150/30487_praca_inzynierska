<?php

namespace App\Livewire;

use App\Models\Contract;
use App\Models\Employment;
use App\Models\Offer;
use App\Models\Workmode;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;
    public string $search = '';
    public $clearAll = false;
    public int $perPage = 10;
    public string $sortOffer = 'new';
    public array $filterEmployments = [];
    public array $filterContracts = [];
    public array $filterWorkmodes = [];

    public function render()
    {
        $employments = Employment::employmentFilter();
        $contracts = Contract::contractFilter();
        $workmodes = Workmode::workmodeFilter();

        $offer = Offer::query()
            ->where('active', '=', 1)
            ->orderBy('created_at', 'desc')
            ->search($this->search)
            ->when($this->filterEmployments != null, function ($q) {
                return $q->whereIn('employment_id', $this->filterEmployments);
            })
            ->when($this->filterContracts != null, function ($q) {
                return $q->whereIn('contract_id', $this->filterContracts);
            })
            ->when($this->filterWorkmodes != null, function ($q) {
                return $q->whereIn('workmode_id', $this->filterWorkmodes);
            })
            ->paginate($this->perPage);


        return view('livewire.search', [
            'offers' => $offer,
            'employments' => $employments,
            'contracts' => $contracts,
            'workmodes' => $workmodes
        ])->layout('layouts.app');
    }

    public function searchFilter(Request $request)
    {

    }

    public function searchbar()
    {
        return view('livewire.search',[

        ]);
    }

    public function updatedClearAll($value)
    {
        if (!$value)
        {
            $this->filterEmployments = [];
            $this->filterContracts = [];
            $this->filterWorkmodes = [];
//            $this->reset('search');
//            $this->reset('filterEmployments');
//            $this->reset('filterContracts');
//            $this->reset('filterWorkmodes');
        }
    }

}
