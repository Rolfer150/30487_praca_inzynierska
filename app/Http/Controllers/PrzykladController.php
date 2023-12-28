<?php

namespace App\Http\Controllers;

use App\Models\Przyklad;
use Illuminate\View\View;

class PrzykladController extends Controller
{
    public function show(): View
    {
        $daneKontroler = Przyklad::query()
            ->whereNot('id', '=', '1')
            ->orderBy('id', 'asc')
            ->get();
        return view('przyklad-view', compact('daneKontroler'));
    }
}
