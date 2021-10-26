<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Response;

class SessionController extends Controller
{
    public function payment(Session $session): Response
    {
        return response()->view('session.payment', compact('session'));
    }
}
