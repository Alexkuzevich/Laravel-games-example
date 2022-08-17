<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $priceDota = Price::create([
           'price' => 0,
           'price_type' => 'normal price'
        ]);

        $priceCSgoNormal = Price::create([
            'price' => 1000,
            'price_type' => 'normal price'
        ]);

        $priceCSgoSale = Price::create([
            'price' => 700,
            'price_type' => 'sale price'
        ]);

        $priceME3Normal = Price::create([
            'price' => 4200,
            'price_type' => 'normal price'
        ]);

        $priceHFNormal = Price::create([
            'price' => 400,
            'price_type' => 'normal price'
        ]);


    }
}
