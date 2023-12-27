<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class UserSearch extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public string $search = '';
    public int $perPage = 10;
    #[Url(history: true)]
    public array $filterUsers = [];
    public function render()
    {
        $brands = Category::categoryFilter();
        $users = $this->userRender();
        return view('livewire.user-search', compact( 'users', 'brands'))
            ->layout('layouts.app');
    }

    public function userRender()
    {
        return User::query()
            ->when(Auth::user(), function ($q)
            {
                return $q->whereNot('id', '=', Auth::user()->id);
            })
            ->when($this->filterUsers != null, function ($q)
            {
                return $q->whereHas('categories', function ($q) {
                    $q->where('id', $this->filterUsers);
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
        $this->reset('filterUsers');
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
