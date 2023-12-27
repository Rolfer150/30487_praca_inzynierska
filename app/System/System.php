<?php

namespace App\System;

use App\Models\Category;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Contracts\View\View;

class System
{
    public int $offerNrBySkills = 0;

    public function index(): View
    {
        $currentUser = $this->getCurrentUser();
//        dd($this->getCurrentUser()->id);
//        $categories = $this->getUserCategories();
//        dd($categories);
        $offers = $this->getOffers();
        return view('system.index', compact('currentUser', 'offers'));
    }
    public function getCurrentUser()
    {
        return Auth::user();
    }
    public function getOfferNrBySkills(): int
    {
//        $offers = Offer::query()
//            ->where('category_id')

        return $this->getOfferNumber();
    }

//    public function getUserCategories()
//    {
//        return Category::query()
//            ->join('category_user', 'category_user.category_id', '=', 'categories.id')
//            ->where('category_user.user_id', '=', $this->getCurrentUser()->id)
//            ->get();
//    }

    public function getOffers()
    {
        return Offer::query()
            ->join('category_user', 'category_user.category_id', '=', 'offers.category_id')
            ->where('category_user.user_id', '=', $this->getCurrentUser()->id)
            ->where('active', '=', 1)
            ->get();
    }
}
