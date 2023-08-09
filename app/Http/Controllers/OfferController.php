<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;
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
        $new_offers = Offer::query()
            ->where('active', '=', 1)
            ->whereDate('published_at', '<', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate();

        return view('sidewidgets.offer', compact('new_offers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
            ->limit(4)
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
