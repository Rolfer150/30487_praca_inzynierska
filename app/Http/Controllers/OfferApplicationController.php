<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\OfferApplication;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OfferApplicationController extends Controller
{
    public function index(Offer $offer): View
    {
//        $user = auth()->user();
//
//        if (!$user)
//        {
//            return view('auth.login');
//        }

        return view('sidewidgets.applyoffer');
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return view('auth.login');
        }

        $apply = new OfferApplication($request->all());
    }
}
