<?php

namespace App\Http\Controllers;

use App\Enums\PaymentType;
use App\Http\Requests\CreateOfferRequest;
use App\Models\Category;
use App\Models\Contract;
use App\Models\Employment;
use App\Models\Offer;
use App\Models\WorkMode;
use App\Notifications\OfferCreatedNotification;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;

class OfferController extends Controller
{
    public function mainPage(): View
    {
        $offers = Offer::query()
            ->where('active', '=', 1)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('home', compact('offers'));
    }

//    public function showOffers(): View
//    {
//        $employments = Employment::employmentFilter();
//        $contracts = Contract::contractFilter();
//        $workmodes = WorkMode::workmodeFilter();
//
//        $new_offers = Offer::query()
//            ->where('active', '=', 1)
//            ->orderBy('created_at', 'desc')
//            ->paginate(8);
//
//        return view('sidewidgets.offer', compact('new_offers'));
//    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $myOffers = Offer::query()
            ->where('user_id', '=', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('offer.myoffers', compact('myOffers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
//        dd(PaymentType::cases());
//        $user = auth()->user();
//        if (!$user)
//        {
//            return view('auth.login');
//        }
        $payments = PaymentType::cases();
        $categories = Category::query()
            ->select('id', 'name')
            ->get();
        $employments = Employment::query()
            ->select('id', 'name')
            ->get();
        $contracts = Contract::query()
            ->select('id', 'name')
            ->get();
        $workmodes = WorkMode::query()
            ->select('id', 'name')
            ->get();
        return view('offer.create', compact('categories', 'payments', 'employments', 'contracts', 'workmodes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateOfferRequest $request): RedirectResponse
    {
        $offer = new Offer($request->all());
        $offer->slug = Str::slug($request->name);
        $offer->active = true;
        $offer->created_at = Carbon::now();
//        dd($request->input());
        $request->user()->offers()->save($offer);
//        auth()->user()->notify(new OfferCreatedNotification());

        return redirect(route('home'))->with('message', 'Oferta została dodana!');
    }

    /**
     * Display the specified resource.
     * @param Offer $offer
     * @return View
     */
    public function show(Offer $offer): View
    {
        try {
            $offer::where('id', '=', $offer->id)
                ->where('active', '=', 1)
                ->firstOrFail();
        } catch (\Exception $exception) {
            return view('errors.offerNotActive');
        }

        $canNotApply = '';

        $user = auth()->user();
        if ($user) {
            if ($offer->isUsersOffer())
                $canNotApply = 'userMadeThisOffer';
            if ($offer->userHasApplied())
                $canNotApply = 'userHasApplied';
        }

        $category_offers = Offer::query()
            ->where('active', '=', 1)
            ->where('category_id', '=', $offer->category_id)
            ->where('id', '!=', $offer->id)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        return view("offer.show", compact('offer', 'category_offers', 'canNotApply'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        //
    }

//    public function search(Request $request)
//    {
//        $q = $request->get('q');
//
//        $employments = Employment::employmentFilter();
//        $contracts = Contract::contractFilter();
//        $workmodes = WorkMode::workmodeFilter();
//
//        $searched_offers = Offer::query()
//            ->where('active', '=', 1)
//            ->whereDate('published_at', '<', Carbon::now())
//            ->orderBy('published_at', 'desc')
//            ->where(function ($query) use($q)
//            {
//                $query->where('name', 'like', "%$q%")
//                    ->orWhere('description', 'like', "%$q%");
//            })
//            ->paginate(8);
//
//        return view('sidewidgets.search', compact('searched_offers', 'q'));
//    }
}
