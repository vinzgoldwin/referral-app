<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = [
            ['code' => 'THB', 'name' => 'Thai Baht'],
            ['code' => 'MYR', 'name' => 'Ringgit Malaysia'],
            ['code' => 'VND', 'name' => 'Vietnam Dong'],
            ['code' => 'USDT', 'name' => 'Tether'],
        ];

        foreach ($currencies as $currency) {
            Currency::create($currency);
        }
    }
}
