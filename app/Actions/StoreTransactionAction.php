<?php

namespace App\Actions;

use App\Constants\ReasonCodes;
use App\Models\Card;
use App\Models\Person;
use App\Models\Session;
use App\Models\Transaction;
use Illuminate\Http\Request;
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
        $card = Card::create([
            'payment_method_id' => $request->input('instrument.paymentMethodId'),
            'pan' => $request->input('instrument.card.number'),
        ]);

        $card->setExpiration($request->input('instrument.card.expiration'));
        $card->setCvv($request->input('instrument.card.cvv'));
        $card->setPin($request->input('instrument.card.pin'));

        return $card;
    }

    private function createPayer(Request $request): Person
    {
        return Person::create([
            'name' => $request->input('payer.name'),
            'surname' => $request->input('payer.surname'),
            'document_type' => $request->input('payer.documentType'),
            'document_number' => $request->input('payer.document'),
            'email' => $request->input('payer.email'),
            'mobile' => $request->input('payer.mobile'),
        ]);
    }
}
