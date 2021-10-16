<?php

namespace App\Http\Controllers;

use App\Models\Session;

class SessionController extends Controller
{
    public function payment(Session $session)
    {
        return response()->view('session.payment');
    }
}
