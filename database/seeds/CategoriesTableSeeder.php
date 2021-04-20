<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Category;
use App\IndexCategory;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cat1 = [
            'img' => 'img/category/php.png',
            'name' => 'PHP',
            'slug' => Str::slug('PHP')
        ];

        $cat2 = [
            'img' => 'img/category/java.png',
            'name' => 'Java',
            'slug' => Str::slug('Java')
        ];

        $cat3 = [
            'img' => 'img/category/js.jpg',
            'name' => 'JavaScript',
            'slug' => Str::slug('JavaScript')
        ];

        $cat4 = [
            'img' => 'img/category/laravel.png',
            'name' => 'Laravel',
            'slug' => Str::slug('Laravel')
        ];

        $cat5 = [
            'img' => 'img/category/wordpress.jpg',
            'name' => 'Wordpress',
            'slug' => Str::slug('Wordpress')
        ];

        $category1 = Category::create($cat1);
        $category2 = Category::create($cat2);
        $category3 = Category::create($cat3);
        $category4 = Category::create($cat4);
        $category5 = Category::create($cat5);

        IndexCategory::create([
            'category_id' => $category1->id,
            'in_home' => 1
        ]);

        IndexCategory::create([
            'category_id' => $category2->id,
            'in_home' => 0
        ]);

        IndexCategory::create([
            'category_id' => $category3->id,
            'in_home' => 1
        ]);

        IndexCategory::create([
            'category_id' => $category4->id,
            'in_home' => 0
        ]);

        IndexCategory::create([
            'category_id' => $category5->id,
            'in_home' => 1
        ]);

    }
}
