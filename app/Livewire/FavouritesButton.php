<?php

namespace App\Livewire;

use App\Models\Favourite;
use App\Models\Offer;
use Livewire\Component;

class FavouritesButton extends Component
{
    public Offer $offer;

    public function mount(Offer $offer)
    {
        $this->offer = $offer;
    }

    public function render()
    {
        $hasAddedToFavourites = false;

        $user = request()->user();

        if ($user) {
            $favourite = Favourite::where('offer_id', '=', $this->offer->id)
            ->where('user_id', '=', $user->id)
            ->first();
            if ($favourite)
            {
                $hasAddedToFavourites = true;
            }
        }
        return view('livewire.favourites-button', compact('hasAddedToFavourites'));
    }

    public function favouriteAdd()
    {
        $user = auth()->user();
        if (!$user) {
            return $this->redirect('/login');
        }

        $favourite = Favourite::where('offer_id', '=', $this->offer->id)
            ->where('user_id', '=', $user->id)
            ->first();

        if (!$favourite) {
            Favourite::create([
                'offer_id' => $this->offer->id,
                'user_id' => $user->id
            ]);
            return;
        } else {
            $favourite->delete();
        }

    }
}
