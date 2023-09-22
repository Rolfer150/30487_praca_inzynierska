<?php

namespace App\Http\Controllers;

use App\Enums\OfferApplicationStatus;
use App\Models\ApplicationFile;
use App\Models\Offer;
use App\Models\OfferApplication;
use App\Notifications\ApplicationReceivedNotification;
use App\Notifications\ApplicationSentNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        abort_if($offer->userHasApplied(),404);

        Session::put('id', $offer->id);

        return view('sidewidgets.applyoffer', compact('offer'));
    }

    public function store(Request $request): RedirectResponse
    {
        $apply = new OfferApplication;
        $sessionID = intval(Session::get('id'));
        $apply->offer_id = $sessionID;

        $request->user()->offerApplications()->save($apply);

        if ($request->hasFile('filesUpload')) {
            foreach ($request->file('filesUpload') as $file) {
                $fileName = $file->getClientOriginalName();
                $appFile = new ApplicationFile;
                $appFile->name = $fileName;
                $request->user()->applicationFiles()->save($appFile);

                $apply->applicationFiles()->attach($appFile->id);
            }
        }

        auth()->user()->notify(new ApplicationSentNotification($apply));
        $owner = $apply->offer->user;
        $owner->notify(new ApplicationReceivedNotification($apply));

        return redirect(route('home'))->with('status', 'Aplikowanie zakończono pomyślnie!');
    }

    public function destroy(OfferApplication $offerApplication)
    {
        $offerApplication->status = OfferApplicationStatus::ANNULLED->value;
        $offerApplication->save();
        $offerApplication->delete();
        return redirect(route('sidewidgets.applyindex'));
    }
}
