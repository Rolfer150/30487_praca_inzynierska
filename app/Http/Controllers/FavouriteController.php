<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Offer;
use Illuminate\View\View;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $favourites = Offer::query()
            ->join('favourites', 'favourites.offer_id', '=', 'offers.id')
            ->where('favourites.user_id', '=', auth()->user()->id)
            ->orderBy('favourites.created_at', 'desc')
            ->get();
        return view('favourite.index', compact('favourites'));
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
     */
    public function show(Favourite $favourite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favourite $favourite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favourite $favourite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favourite $favourite)
    {
        $favourite->delete();
        return redirect()->back();
    }
}
