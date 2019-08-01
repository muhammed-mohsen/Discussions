<?php

use Illuminate\Database\Seeder;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       App\Channel::create([
           'title'=>'laravel', 'slug' => str_slug("laravel")
           
           ]);

        App\Channel::create([
            'title' => 'java','slug'=>str_slug("java")

        ]);
        App\Channel::create([
            'title' => 'HTML', 'slug' => str_slug("HTML")

        ]);
        App\Channel::create([
            'title' => 'CSS', 'slug' => str_slug("css")

        ]);
        App\Channel::create([
            'title' => 'Mesql', 'slug' => str_slug("Mysql")

        ]);
    }
}
