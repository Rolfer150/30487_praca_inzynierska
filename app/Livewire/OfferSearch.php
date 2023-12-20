<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Contract;
use App\Models\Employment;
use App\Models\Offer;
use App\Models\WorkMode;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class OfferSearch extends Component
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

    #[Url(history: true)]
    public array $filterCategories = [];

    public function render()
    {
        $employments = Employment::employmentFilter();
        $contracts = Contract::contractFilter();
        $workModes = WorkMode::workModeFilter();
        $categories = Category::categoryFilter();
        $messSortOffer = $this->messageSortOffer;
        $offers = $this->offerRender();

        if ($this->sortOffer === 'old')
        {
            $offers = $this->offerRender('created_at', 'asc');
            $messSortOffer = 'Najstarsze oferty';
        }
        elseif ($this->sortOffer === 'popular') $messSortOffer = 'Najpopularniejsze oferty';

        elseif ($this->sortOffer === 'near') $messSortOffer = 'Oferty znajdujące się w Twojej okolicy';

        return view('livewire.offer-search', compact(
            'employments', 'contracts', 'workModes', 'offers', 'messSortOffer', 'categories'
        ))
            ->layout('layouts.app');
    }

    public function offerRender(string $value = 'created_at', string $sorting = 'desc')
    {
        return Offer::query()
            ->where('active', '=', 1)
            ->when($this->sortOffer === 'new' || $this->sortOffer === 'old', function ($q) use ($value, $sorting)
            {
                return $q->orderBy($value, $sorting);
            })
            ->when($this->filterEmployments != null, function ($q)
            {
                return $q->whereIn('employment_id', $this->filterEmployments);
            })
            ->when($this->filterContracts != null, function ($q)
            {
                return $q->whereIn('contract_id', $this->filterContracts);
            })
            ->when($this->filterWorkModes != null, function ($q)
            {
                return $q->whereIn('work_mode_id', $this->filterWorkModes);
            })
            ->when($this->filterCategories != null, function ($q)
            {
                return $q->whereIn('category_id', $this->filterCategories);
            })
            ->search($this->search)
            ->paginate($this->perPage);
    }

//    public function getEmploymentSum()
//    {
//        return $sumWithEmployment = $this->offerRender()->select(DB::raw('count(*)'));
//    }

    public function searchFilter()
    {

    }

    public function clearAll()
    {
        $this->reset('search');
        $this->reset('filterEmployments');
        $this->reset('filterContracts');
        $this->reset('filterWorkModes');
        $this->reset('filterCategories');
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
    public function updatedFilterCategories()
    {
        $this->resetPage();
    }

}