<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contract;
use App\Models\Employment;
use App\Models\Offer;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OfferController extends Controller
{
    public function mainPage():View
    {
        $offers = Offer::query()
            ->where('active', '=', 1)
            ->whereDate('published_at', '<', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate();

        return view('home', compact('offers'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $employments = Employment::query()
            ->join('offers', 'employments.id', '=', 'offers.employment_id')
            ->select('employments.name', DB::raw('count(*) as employmentSum'))
            ->groupBy('employments.id')
            ->get();
        $contracts = Contract::query()
            ->join('offers', 'contracts.id', '=', 'offers.contract_id')
            ->select('contracts.name', DB::raw('count(*) as contractSum'))
            ->groupBy('contracts.id')
            ->get();
        $new_offers = Offer::query()
            ->where('active', '=', 1)
            ->whereDate('published_at', '<', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate();

        return view('sidewidgets.offer', compact('new_offers', 'employments', 'contracts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $user = auth()->user();
//        if (!$user)
//        {
//            return view('auth.login');
//        }
        $payments = Payment::query()
            ->select('id', 'name')
            ->get();
        $categories = Category::query()
            ->select('id', 'name')
            ->get();
        $employments = Employment::query()
            ->select('id', 'name')
            ->get();
        $contracts = Contract::query()
            ->select('id', 'name')
            ->get();
        return view('sidewidgets.addoffer', compact('categories','payments','employments', 'contracts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $offer = new Offer($request->all());
        $offer->slug = Str::slug($request->name);
        $offer->active = true;
        $offer->published_at = Carbon::now();
        $request->user()->offers()->save($offer);

        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     * @param  Offer  $offer
     * @return View
     */
    public function show(Offer $offer): View
    {
        if(!$offer->active || $offer->published_at > Carbon::now())
        {
            throw new NotFoundHttpException();
        }

        $category_offers = Offer::query()
            ->where('active', '=', 1)
            ->where('category_id', '=', $offer->category_id)
            ->where('id', '!=', $offer->id)
            ->whereDate('published_at', '<', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->limit(6)
            ->get();

        return view("sidewidgets.show", compact('offer', 'category_offers'));
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
}
