<?php

namespace App\Http\Controllers;

use App\System\System;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NotificationController extends Controller
{
    public function index(): View
    {
        $system = new System;
        $user = $system->getCurrentUser()->name;
        dd($user);
        return view('notification.index');
    }
}
