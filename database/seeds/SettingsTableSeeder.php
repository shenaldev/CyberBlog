<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Setting::create([
            'option' => 'site_name',
            'value' => 'Cyber Blog'
        ]);

        Setting::create([
            'option' => 'description',
            'value' => 'Blog About Computer Programming And New Technology'
        ]);

        Setting::create([
            'option' => 'keywords',
            'value' => 'it,information technology,php,programming,java,binary'
        ]);

        Setting::create([
            'option' => 'logo',
            'value' => 'img/logo.svg'
        ]);

        Setting::create([
            'option' => 'email',
            'value' => 'admin@cyberblog.com'
        ]);

        Setting::create([
            'option' => 'facebook',
            'value' => '#'
        ]);

        Setting::create([
            'option' => 'twitter',
            'value' => '#'
        ]);

        Setting::create([
            'option' => 'instagram',
            'value' => '#'
        ]);

        Setting::create([
            'option' => 'reddit',
            'value' => '#'
        ]);

        Setting::create([
            'option' => 'post_limit',
            'value' => '20'
        ]);

        Setting::create([
            'option' => 'home_post_limit',
            'value' => '6'
        ]);

        Setting::create([
            'option' => 'guest_vote',
            'value' => '1'
        ]);

        Setting::create([
            'option' => 'guest_comments',
            'value' => '1'
        ]);

    }
}
