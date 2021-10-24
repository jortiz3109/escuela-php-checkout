<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('currencies')->insert([
            [
                'name' => 'US dollar',
                'minor_unit' => 2,
                'alphabetic_code' => 'USD',
                'numeric_code' => '840',
                'symbol' => '$'
            ],
            [
                'name' => 'Colombian peso',
                'minor_unit' => 2,
                'alphabetic_code' => 'COP',
                'numeric_code' => '170',
                'symbol' => '$'
            ],
            [
                'name' => 'Chilean peso',
                'minor_unit' => 0,
                'alphabetic_code' => 'CLP',
                'numeric_code' => '152',
                'symbol' => '$'
            ],
            [
                'name' => 'Brazilian real',
                'minor_unit' => 2,
                'alphabetic_code' => 'BRL',
                'numeric_code' => '986',
                'symbol' => 'R$'
            ],
            [
                'name' => 'Costa Rican colon',
                'minor_unit' => 2,
                'alphabetic_code' => 'CRC',
                'numeric_code' => '188',
                'symbol' => '₡'
            ],
        ]);
    }
}
