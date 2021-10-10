<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SessionRequest;
use App\Models\Session;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Response;

class SessionController extends Controller
{
    public function payment(SessionRequest $request) :JsonResponse
    {
        $session = Session::create([
            'uuid' => Str::uuid(),
            'merchant_id' => $request->merchant,
            'status' => Session::STATUS_PENDING,
            'reference' => $request->payment->reference,
            'description' => $request->payment->description,
            'total_amount' => $request->payment->total_amount,
            'date' => Carbon::now(),
            'expiration' => Carbon::now()->addMinutes(10),
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'return_url' => $this->faker->url(),
        ]);
        return Response::json($session);
    }
}
