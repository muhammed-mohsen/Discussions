<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeders::class);
        $this->call(ChannelSeeder::class);
        $this->call(DiscussionSeeder::class);
        $this->call(RepliesSeeder::class);
   
    }
}
