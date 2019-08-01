<?php

use Illuminate\Database\Seeder;

class UsersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
        'name'=>'admin',
        'password'=>bcrypt('admin'),
        'email'=>'admin@udemy.com',
        'admin'=>1,
        'avatar' => asset('/avatar/download.png')
        ]);
        App\User::create([
            'name' => 'hello',
            'avatar'=>asset('/avatar/profile.png'),
            'password' => bcrypt('hello'),
            'email' => 'hello@udemy.com',
            'admin' => 0,
        ]);
        
       
    }
}
