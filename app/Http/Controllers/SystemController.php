<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SystemController extends Controller
{
    public function getCurrentUser()
    {
        return Auth::user();
    }

    public function index(): View
    {
        $currentUser = $this->getCurrentUser();
        return view('system.index', compact('currentUser'));
    }
}
