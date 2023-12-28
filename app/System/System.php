<?php

namespace App\System;

use App\Models\Offer;
use App\Notifications\OfferRecommendedNotification;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Contracts\View\View;
use Livewire\WithPagination;

class System
{
    use WithPagination;

    public function index(): View
    {
        $currentUser = $this->getCurrentUser();
        $offers = $this->getOfferSearch()->get();
        $this->getOfferNotification();
        return view('system.index', compact('currentUser', 'offers'));
    }
    public function getCurrentUser()
    {
        return Auth::user();
    }
    public function getOfferNotification()
    {
        return $this->getCurrentUser()->notify(new OfferRecommendedNotification($this->getOfferSearch()->pluck('id')->all()));
    }
    public function getOfferSearch()
    {
        return Offer::query()
            ->join('category_user', 'category_user.category_id', '=', 'offers.category_id')
            ->where('category_user.user_id', '=', $this->getCurrentUser()->id)
            ->where('active', '=', 1);
    }
}
