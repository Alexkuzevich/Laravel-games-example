<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categoryMultiplayer = Category::create([
            'name' => 'Multiplayer game',
            'slug' => '://example.com/category/mp',
            'image' => 'https://avatars.dicebear.com/v2/initials/mp.svg',
        ]);

        $categoryFps = Category::create([
            'name' => 'FPS',
            'slug' => '://example.com/category/fps',
            'image' => 'https://avatars.dicebear.com/v2/initials/fps.svg',
        ]);

        $categoryMoba = Category::create([
            'name' => 'MOBA',
            'slug' => '://example.com/category/moba',
            'image' => 'https://avatars.dicebear.com/v2/initials/moba.svg',
            'parent_id' => 1
        ]);

        $categoryScienceShooter = Category::create([
            'name' => 'Science FPS',
            'slug' => '://example.com/category/science-fps',
            'image' => 'https://avatars.dicebear.com/v2/initials/science-fps.svg',
            'parent_id' => 2
        ]);

        $categoryFantasy = Category::create([
            'name' => 'Fantasy',
            'slug' => '://example.com/category/fantasy',
            'image' => 'https://avatars.dicebear.com/v2/initials/fantasy.svg',
        ]);
    }
}
