<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            PriceSeeder::class,
            ProductSeeder::class,
            PublisherSeeder::class
        ]);
    }
}
