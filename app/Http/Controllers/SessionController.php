<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\Session;

class SessionController extends Controller
{
    public function search(Merchant $merchant, Session $session)
    {
        return response()->json();
    }
}
