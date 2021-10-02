<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            [
                'name' => 'VISA DEBIT',
            ],
            [
                'name' => 'VISA CREDIT',
            ],
            [
                'name' => 'MASTERCARD DEBIT',
            ],
            [
                'name' => 'MASTERCARD CREDIT',
            ],
        ]);
    }
}
