<?php

namespace App\Http\Controllers;

use App\Models\ApplicationFile;
use App\Models\Offer;
use App\Models\OfferApplication;
use Illuminate\Http\RedirectResponse;
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
//        dd($offer);
        return view('sidewidgets.applyoffer', compact('offer'));
    }

    public function store(Request $request, Offer $offer): RedirectResponse
    {
        dd($offer);
        $apply = new OfferApplication;
        $apply->offer_id = $request->applyID;
        dd($apply->offer_id);
        dd($request->user()->offerApplications()->save($apply));
        if ($request->hasFile('filesUpload'))
        {
            foreach ($request->file('filesUpload') as $file)
            {
                $fileName = $file->getClientOriginalName();
                $appFile = new ApplicationFile;
                $appFile->name = $fileName;
                $request->user()->applicationFiles()->save($appFile);
            }
        }

        return redirect(route('home'));
    }
}
