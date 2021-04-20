<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tag1 = ['name' => 'PHP'];
        $tag2 = ['name' => 'Java'];
        $tag3 = ['name' => 'JavaScript'];
        $tag4 = ['name' => 'Laravel'];
        $tag5 = ['name' => 'Wordpress'];

        Tag::create($tag1);
        Tag::create($tag2);
        Tag::create($tag3);
        Tag::create($tag4);
        Tag::create($tag5);
    }
}
