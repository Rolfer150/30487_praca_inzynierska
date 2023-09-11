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
        $offerID = $offer->id;

        return view('sidewidgets.applyoffer', compact('offerID'));
    }

    public function store(Request $request)
    {
//        $user = auth()->user();
//
//        if (!$user) {
//            return view('auth.login');
//        }
        $id = $request->offer->id;
        dd($id);
        $apply = new OfferApplication($request->all());
        $apply->offer_id = $offer->id;

        foreach ($files as $file)
        {
            $request->user()->applicationFiles()->save($file);
        }
        $request->user()->offerApplications()->save($apply);

        return redirect(route('home'));
    }
}
