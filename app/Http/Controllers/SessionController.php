<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function payment(Session $session, Request $request)
    {
        return view('payment');
    }
}
