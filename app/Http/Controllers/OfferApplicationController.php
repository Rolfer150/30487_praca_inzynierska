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
    public function index(): View
    {
        $applies = OfferApplication::query()
            ->where('user_id', '=', auth()->user()->id)
            ->get();
        return view('sidewidgets.applyindex', compact('applies'));
    }

    public function apply(Offer $offer): View
    {
        if ($offer->userHasApplied()) {
            return redirect(view('sidewidgets.show')->with('warning', 'Aplikacja na daną ofertę pracy została już złożona!'));
        }
        Session::put('id', $offer->id);

        return view('sidewidgets.applyoffer', compact('offer'));
    }

    public function store(Request $request): RedirectResponse
    {
        $apply = new OfferApplication;
        $sessionID = intval(Session::get('id'));
        $apply->offer_id = $sessionID;

        if ($request->hasFile('filesUpload')) {
            foreach ($request->file('filesUpload') as $file) {
                $fileName = $file->getClientOriginalName();
                $appFile = new ApplicationFile;
                $appFile->name = $fileName;
                $request->user()->applicationFiles()->save($appFile);
            }
        }

        $request->user()->offerApplications()->save($apply);

        return redirect(route('home'));
    }

    public function destroy(Offer $offer)
    {
        dd($offer);
    }
}
