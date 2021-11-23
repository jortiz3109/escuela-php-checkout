<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('payment_methods')->insert([
            [
                'name' => 'VISA DEBIT',
                'logo' => 'https://seeklogo.com/images/V/visa-electron-logo-71BEC57E8F-seeklogo.com.png',
                'category' => PaymentMethod::DEBIT_CATEGORY,
            ],
            [
                'name' => 'VISA CREDIT',
                'logo' => 'https://logos-marcas.com/wp-content/uploads/2020/04/Visa-Emblema.png',
                'category' => PaymentMethod::CREDIT_CATEGORY,
            ],
            [
                'name' => 'MASTERCARD DEBIT',
                'logo' => 'https://1000marcas.net/wp-content/uploads/2020/07/Maestro-logo-1.png',
                'category' => PaymentMethod::DEBIT_CATEGORY,
            ],
            [
                'name' => 'MASTERCARD CREDIT',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/0/04/Mastercard-logo.png',
                'category' => PaymentMethod::CREDIT_CATEGORY,
            ],
        ]);
    }
}
