<?php

namespace App\System;

use App\Models\Offer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class System
{
    public int $offerNrBySkills = 0;

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

    public function getUserBrands()
    {
        $userID = $this->getCurrentUser();
        User::query()
            ->join('brand_company', 'users.id', '=', 'brand_user.user_id')
            ->where('users.id', '=', $userID);
    }
}
