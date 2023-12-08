<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Company;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
class EmployerSearch extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public string $search = '';
    public int $perPage = 10;
    #[Url(history: true)]
    public array $filterBrands = [];

    public function render()
    {
        $brands = Brand::brandFilter();
        $employerCompanies = $this->employerRender();
        return view('livewire.employer-search', compact('employerCompanies', 'brands'))
            ->layout('layouts.app');
    }

    public function employerRender()
    {
        return Company::query()
            ->when($this->filterBrands != null, function ($q)
            {
                return $q->whereHas('brands', function ($q) {
                    $q->where('id', $this->filterBrands);
                });
            })
            ->search($this->search)
            ->paginate($this->perPage);
    }

    public function searchFilter()
    {

    }

    public function clearAll()
    {
        $this->reset('search');
        $this->reset('filterBrands');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedFilterBrands()
    {
        $this->resetPage();
    }
}
