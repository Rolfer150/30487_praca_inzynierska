<?php

namespace App\Livewire;

use App\Models\Contract;
use App\Models\Employment;
use App\Models\Offer;
use App\Models\Workmode;
use Illuminate\Http\Request;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public string $search = '';
    public int $perPage = 10;
    #[Url(history: true)]
    public string $sortOffer = 'new';
    public string $messageSortOffer = 'Najnowsze oferty';
    #[Url(history: true)]
    public array $filterEmployments = [];
    #[Url(history: true)]
    public array $filterContracts = [];
    #[Url(history: true)]
    public array $filterWorkmodes = [];

    public function render()
    {
        $employments = Employment::employmentFilter();
        $contracts = Contract::contractFilter();
        $workmodes = Workmode::workmodeFilter();
        $messSortOffer = $this->messageSortOffer;

        if ($this->sortOffer === 'old') {
            $offer = $this->offerRender('created_at', 'asc');
            $messSortOffer = 'Najstarsze oferty';
        } else {
            $offer = $this->offerRender();
            $messSortOffer;
        }

        return view('livewire.search', [
            'offers' => $offer,
            'employments' => $employments,
            'contracts' => $contracts,
            'workmodes' => $workmodes,
            'messSortOffer' => $messSortOffer
        ])->layout('layouts.app');
    }

    public function offerRender(string $value = 'created_at', string $sorting = 'desc')
    {
        return Offer::query()
            ->where('active', '=', 1)
            ->when($this->sortOffer === 'new' || $this->sortOffer === 'old', function ($q) use ($value, $sorting) {
                return $q->orderBy($value, $sorting);
            })
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
    }

    public function searchFilter()
    {

    }

    public function clearAll()
    {
        $this->reset('search');
        $this->reset('filterEmployments');
        $this->reset('filterContracts');
        $this->reset('filterWorkmodes');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedFilterEmployments()
    {
        $this->resetPage();
    }

    public function updatedFilterContracts()
    {
        $this->resetPage();
    }

    public function updatedFilterWorkmodes()
    {
        $this->resetPage();
    }

}
