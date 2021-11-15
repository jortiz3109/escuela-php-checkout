<?php

namespace App\Http\Controllers\Api\V1;

use App\Constants\ReasonCodes;
use App\Contracts\GatewayContract;
use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Person;
use App\Models\Session;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SessionController extends Controller
{
    public function process(Session $session, Request $request, GatewayContract $gateway)
    {
        $card = new Card();
        $card->payment_method_id = $request->input('instrument.paymentMethodId');
        $card->pan = Crypt::encryptString($request->input('instrument.card.number'));
        $card->setCvv($request->input('instrument.card.cvv'));
        $card->save();

        $payer = new Person();
        $payer->name = $request->input('payer.name');
        $payer->surname = $request->input('payer.surname');
        $payer->document_type = $request->input('payer.documentType');
        $payer->document_number = $request->input('payer.document');
        $payer->email = $request->input('payer.email');
        $payer->mobile = $request->input('payer.mobile');
        $payer->save();

        $transaction = new Transaction([
            'status' => Transaction::STATUS_PENDING,
            'response_code' => ReasonCodes::REQUEST_IN_PROGRESS,
        ]);
        $transaction->instrument()->associate($card);
        $transaction->session()->associate($session);
        $transaction->payer()->associate($payer);
        $transaction->save();

        return $gateway->process($transaction);
    }
}
