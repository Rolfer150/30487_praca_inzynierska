<?php

namespace App\Http\Controllers;

use App\Models\ApplicationFile;
use App\Models\Offer;
use App\Models\OfferApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
        Session::put('id', $offer->id);
        return view('sidewidgets.applyoffer', compact('offer'));
    }

    public function store(Request $request): RedirectResponse
    {
        $apply = new OfferApplication;
        $sessionID = intval(Session::get('id'));
        $apply->offer_id = $sessionID;

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

        $request->user()->offerApplications()->save($apply);
        Session::flush();

        return redirect(route('home'));
    }
}
