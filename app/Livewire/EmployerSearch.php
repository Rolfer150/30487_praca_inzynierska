<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
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
    public array $filterEmployer = [];
    public function render()
    {
        $categories = Category::categoryFilter();
        $employerCompanies = $this->employerRender();
        return view('livewire.employer-search', compact('employerCompanies', 'categories'))
            ->layout('layouts.app');
    }

    public function employerRender()
    {
        return Company::query()
            ->when($this->filterEmployer != null, function ($q)
            {
                return $q->whereHas('categories', function ($q) {
                    $q->where('id', $this->filterEmployer);
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
        $this->reset('filterEmployer');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedFilterCategories()
    {
        $this->resetPage();
    }
}
