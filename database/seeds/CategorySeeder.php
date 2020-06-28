<?php

use App\Category;
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
        //
        $categories = [
            ['name'=>'Nilfgaard'],
            ['name'=>'Northern Realms'],
            ['name'=>'Scoitael'],
            ['name'=>'Monsters'],
            ['name'=>'Skellige'],
            ['name'=>'Syndicate'],
            ['name'=>'Neutral']
        ];

        foreach ($categories as $category){
            Category::create($category);
        }

        // factory(Category::class, 6)->create();
    }
}
