<?php

namespace App\Actions;

use App\Constants\ReasonCodes;
use App\Models\Card;
use App\Models\Person;
use App\Models\Session;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class StoreTransactionAction
{
    public function execute(Session $session, Request $request): Transaction
    {
        $card = $this->createCard($request);
        $payer = $this->createPayer($request);

        $transaction = new Transaction([
            'status' => Transaction::STATUS_PENDING,
            'uuid' => Str::uuid(),
            'response_code' => ReasonCodes::REQUEST_IN_PROGRESS,
        ]);

        $transaction->instrument()->associate($card);
        $transaction->session()->associate($session);
        $transaction->payer()->associate($payer);

        $transaction->save();

        return $transaction;
    }

    private function createCard(Request $request): Card
    {
        $card = new Card();

        $card->payment_method_id = $request->input('instrument.paymentMethodId');
        $card->pan = Crypt::encryptString($request->input('instrument.card.number'));
        $card->setCvv($request->input('instrument.card.cvv'));
        $card->save();

        return $card;
    }

    private function createPayer(Request $request): Person
    {
        $payer = new Person();

        $payer->name = $request->input('payer.name');
        $payer->surname = $request->input('payer.surname');
        $payer->document_type = $request->input('payer.documentType');
        $payer->document_number = $request->input('payer.document');
        $payer->email = $request->input('payer.email');
        $payer->mobile = $request->input('payer.mobile');

        $payer->save();

        return $payer;
    }
}
