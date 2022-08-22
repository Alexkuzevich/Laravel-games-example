<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Price;
use App\Models\Product;
use App\Models\Publisher;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productDota = Product::create([
           'name' => 'Dota 2',
           'description' => 'Valve MOBA game',
           'slug' => '//example.com/products/dota-2',
            'preview_image' => 'https://avatars.dicebear.com/v2/initials/dota-2.svg',
            'video' => 'https://www.youtube.com/watch?v=-cSFPIwMEq4',
            'novelty' => false,
        ]);

        $priceDota = Price::create([
            'price' => 0,
            'price_type' => 'normal price'
        ]);

        $productCounterStrike = Product::create([
            'name' => 'Counter Strike',
            'description' => 'Valve FPS game',
            'slug' => '//example.com/products/counter-strike',
            'preview_image' => 'https://avatars.dicebear.com/v2/initials/counter-strike.svg',
            'video' => 'https://www.youtube.com/watch?v=edYCtaNueQY',
            'novelty' => false,
        ]);

        $priceCSgoNormal = Price::create([
            'price' => 1000,
            'price_type' => 'normal price'
        ]);

        $priceCSgoSale = Price::create([
            'price' => 700,
            'price_type' => 'sale price'
        ]);

        $productMassEffect = Product::create([
            'name' => 'Mass Effect 3',
            'description' => 'Third part of Mass Effect franchise',
            'slug' => '//example.com/products/mass-effect-3',
            'preview_image' => 'https://avatars.dicebear.com/v2/initials/mass-effect-3.svg',
            'video' => 'https://www.youtube.com/watch?v=AluTOOCVXVQ',
            'novelty' => false,
        ]);

        $priceME3Normal = Price::create([
            'price' => 4200,
            'price_type' => 'normal price'
        ]);

        $productMario = Product::create([
            'name' => 'Mario Bros',
            'description' => 'Classic Nintendo videogame',
            'slug' => '//example.com/products/mario',
            'preview_image' => 'https://avatars.dicebear.com/v2/initials/mario.svg',
            'video' => 'https://www.youtube.com/watch?v=UVsm4zsbaPg',
            'novelty' => false
        ]);

        $productHalfLife = Product::create([
            'name' => 'Half Life',
            'slug' => '//example.com/products/half-life',
            'preview_image' => 'https://avatars.dicebear.com/v2/initials/half-life.svg',
            'video' => 'https://www.youtube.com/watch?v=wtIp8jOo8_o',
            'novelty' => false,
            'position' => 999
        ]);

        $priceHFNormal = Price::create([
            'price' => 400,
            'price_type' => 'normal price'
        ]);

        $dota = Category::where('name', 'MOBA')->firstOrFail();
        $dotaNormalPrice = Price::where('price', 0)->firstOrFail();

        $cs = Category::where('name', 'FPS')->firstOrFail();
        $csNormalPrice = Price::where('price', 1000)->firstOrFail();
        $csSalePrice = Price::where('price', 700)->firstOrFail();

        $me3 = Category::where('name', 'fantasy')->firstOrFail();
        $me3NormalPrice = Price::where('price', 4200)->firstOrFail();

        $mario = Category::where('name', 'Science FPS')->firstOrFail();
        $marioNormalPrice = Price::where('price', 0)->firstOrFail();

        $hf = Category::where('name', 'Science FPS')->firstOrFail();
        $hfNormalPrice = Price::where('price', 400)->firstOrFail();

        $productDota->categories()->save($dota);
        $productCounterStrike->categories()->save($cs);
        $productMassEffect->categories()->save($me3);
        $productMario->categories()->save($mario);
        $productHalfLife->categories()->save($hf);

        $productDota->prices()->save($dotaNormalPrice);
        $productCounterStrike->prices()->save($csNormalPrice);
        $productCounterStrike->prices()->save($csSalePrice);
        $productMassEffect->prices()->save($me3NormalPrice);
        $productMario->prices()->save($marioNormalPrice);
        $productHalfLife->prices()->save($hfNormalPrice);

    }
}
