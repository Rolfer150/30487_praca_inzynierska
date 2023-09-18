<?php

namespace App\Livewire;

use App\Models\Contract;
use App\Models\Employment;
use App\Models\Offer;
use App\Models\WorkMode;
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
    public array $filterWorkModes = [];

    public function render()
    {
        $employments = Employment::employmentFilter();
        $contracts = Contract::contractFilter();
        $workModes = WorkMode::workmodeFilter();
        $messSortOffer = $this->messageSortOffer;

        if ($this->sortOffer === 'old') {
            $offers = $this->offerRender('created_at', 'asc');
            $messSortOffer = 'Najstarsze oferty';
        } else {
            $offers = $this->offerRender();
            $messSortOffer;
        }

        return view('livewire.search', compact(
            'employments', 'contracts', 'workModes', 'offers', 'messSortOffer'
        ))
            ->layout('layouts.app');
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
            ->when($this->filterWorkModes != null, function ($q) {
                return $q->whereIn('work_mode_id', $this->filterWorkModes);
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
        $this->reset('filterWorkModes');
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

    public function updatedFilterWorkModes()
    {
        $this->resetPage();
    }

}
