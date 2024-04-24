<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = ['Beef', 'Breakfast', 'Chicken', 'Food', 'Potato', 'Rice', 'Stew'];

        foreach ($tags as $tagName) {
            Tag::create(['name' => $tagName]);
        }
    }
}
