<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Publisher;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publisherValve = Publisher::create([
            'name' => 'Valve',
            'image' => 'https://avatars.dicebear.com/v2/initials/valve.svg',
        ]);

        $publisherBlizzard = Publisher::create([
            'name' => 'Blizzard',
            'image' => 'https://avatars.dicebear.com/v2/initials/blizzard.svg',
        ]);

        $publisherUbisoft = Publisher::create([
            'name' => 'Ubisoft',
            'image' => 'https://avatars.dicebear.com/v2/initials/ubisoft.svg'
        ]);

        $publisherEA = Publisher::create([
            'name' => 'EA Games',
            'image' => 'https://avatars.dicebear.com/v2/initials/ea.svg'
        ]);

        $valveGames = ['Dota 2', 'Counter Strike', 'Half Life'];
        $blizzardGames = ['WOW', 'Diablo 3', 'Overwatch'];
        $ubisoftGames = ['Assassin\'s Creed', 'Far Cry 6'];
        $eaGames = ['Mass Effect 3'];

        foreach ($valveGames as $game) {
            $tempProduct = Product::where('name', $game)->firstOrFail();
            $publisherValve->products()->save($tempProduct);
        }
//        foreach ($blizzardGames as $game) {
//            $tempProduct = Product::where('name', $game)->firstOrFail();
//            $publisherBlizzard->products()->save($tempProduct);
//        }
//        foreach ($ubisoftGames as $game) {
//            $tempProduct = Product::where('name', $game)->firstOrFail();
//            $publisherUbisoft->products()->save($tempProduct);
//        }
        foreach ($eaGames as $game) {
            $tempProduct = Product::where('name', $game)->firstOrFail();
            $publisherEA->products()->save($tempProduct);
        }
    }
}
