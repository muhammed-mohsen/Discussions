<?php

use Illuminate\Database\Seeder;
use App\Reply;

class RepliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Reply::create([
           'user_id'=>1,
           'discussion_id'=>1,
           'content'=>'Nisi officia dolore excepteur exercitation velit elit ipsum tempor reprehenderit sunt tempor do sunt proident. Laborum reprehenderit ex sit commodo laboris amet eiusmod dolore. Consectetur adipisicing dolore voluptate irure consequat non amet magna aliqua cillum qui elit incididunt. Pariatur irure voluptate duis veniam anim nisi quis ut aliquip nisi quis tempor. Nisi velit minim consequat aliqua tempor ad magna.',
           
       ]);
        Reply::create([
            'user_id' => 2,
            'discussion_id' => 1,
            'content' => 'Nisi officia dolore excepteur exercitation velit elit ipsum tempor reprehenderit sunt tempor do sunt proident. Laborum reprehenderit ex sit commodo laboris amet eiusmod dolore. Consectetur adipisicing dolore voluptate irure consequat non amet magna aliqua cillum qui elit incididunt. Pariatur irure voluptate duis veniam anim nisi quis ut aliquip nisi quis tempor. Nisi velit minim consequat aliqua tempor ad magna.',

        ]);
        Reply::create([
            'user_id' => 2,
            'discussion_id' => 2,
            'content' => 'Nisi officia dolore excepteur exercitation velit elit ipsum tempor reprehenderit sunt tempor do sunt proident. Laborum reprehenderit ex sit commodo laboris amet eiusmod dolore. Consectetur adipisicing dolore voluptate irure consequat non amet magna aliqua cillum qui elit incididunt. Pariatur irure voluptate duis veniam anim nisi quis ut aliquip nisi quis tempor. Nisi velit minim consequat aliqua tempor ad magna.',

        ]);
    }
}
