<?php

namespace App\Livewire;

use App\Enums\SortOffer;
use App\Models\Category;
use App\Models\Contract;
use App\Models\Employment;
use App\Models\Offer;
use App\Models\WorkMode;
use App\System\System;
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
    public string $sortOffer = SortOffer::NEW->value;
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
        $system = new System;

        if ($this->sortOffer === SortOffer::OLD->value)
        {
            $offers = $this->offerRender('created_at', 'asc');
            $messSortOffer = 'Najstarsze oferty';
        }
        elseif ($this->sortOffer === SortOffer::POPULAR->value) $messSortOffer = 'Najpopularniejsze oferty';

        elseif ($this->sortOffer === SortOffer::LOCATION->value) $messSortOffer = 'Oferty znajdujące się w Twojej okolicy';

        elseif ($this->sortOffer === SortOffer::RECOMMENDED->value)
        {
            $offers = $system->getOfferSearch()->paginate($this->perPage);
            $messSortOffer = 'Oferty rekomendowane przez system';
        }

        return view('livewire.offer-search',
            compact('employments', 'contracts', 'workModes', 'offers', 'messSortOffer', 'categories'))
            ->layout('layouts.app');
    }

    public function sortRender($messageSort = SortOffer::RECOMMENDED)
    {
        switch ($messageSort)
        {
            case SortOffer::NEW:
                $this->messageSortOffer = 'Najnowsze oferty';
                return $this->offerRender();
            case SortOffer::OLD:
                $this->messageSortOffer = 'Najstarsze oferty';
                return $this->offerRender('created_at', 'asc');
            case SortOffer::POPULAR:
                $this->messageSortOffer = 'Najpopularniejsze oferty';
                return $this->offerRender();
            case SortOffer::LOCATION:
                $this->messageSortOffer = 'Oferty znajdujące się w Twojej okolicy';
                return $this->offerRender();
            case SortOffer::RECOMMENDED:
                $this->messageSortOffer = 'Oferty rekomendowane przez system';
                return $this->offerRender();
        }

    }

    public function offerRender(string $value = 'created_at', string $sorting = 'desc')
    {
        return Offer::query()
            ->where('active', '=', 1)
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
            ->orderBy($value, $sorting)
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
