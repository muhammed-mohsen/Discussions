<?php

use App\Discussion;
use Illuminate\Database\Seeder;

class DiscussionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t = 'helllo every body thanke you for your approvement';
        $t1 = 'helllo jvascripts thanke you for your apprtob';
        $t2 = 'helllo html thanke you for your approvement';
       
       Discussion::create([
          'title'=>$t,
          'content'=>'In nulla sint nostrud dolore amet cillum. Elit ex ea sint magna officia duis cupidatat ad ex do nostrud est in. Id aliquip commodo tempor sunt aliquip eu culpa irure ut cillum consectetur exercitation. Non in elit consectetur occaecat exercitation non voluptate laboris et labore enim nisi. Ad non laboris ea nisi labore voluptate irure ipsum reprehenderit dolor elit mollit anim et. Non fugiat in id sit nulla proident sunt.',
          'channel_id'=>1,
          'user_id'=>1,
          'slug'=>str_slug($t),
          
          ]);
        Discussion::create([
          'title'=>$t2,
          'content'=>'In nulla sint nostrud dolore amet cillum. Elit ex ea sint magna officia duis cupidatat ad ex do nostrud est in. Id aliquip commodo tempor sunt aliquip eu culpa irure ut cillum consectetur exercitation. Non in elit consectetur occaecat exercitation non voluptate laboris et labore enim nisi. Ad non laboris ea nisi labore voluptate irure ipsum reprehenderit dolor elit mollit anim et. Non fugiat in id sit nulla proident sunt.',
          'channel_id'=>1,
          'user_id'=>1,
          'slug'=>str_slug($t2),
          
          ]);
        Discussion::create([
          'title'=>$t1,
          'content'=>'In nulla sint nostrud dolore amet cillum. Elit ex ea sint magna officia duis cupidatat ad ex do nostrud est in. Id aliquip commodo tempor sunt aliquip eu culpa irure ut cillum consectetur exercitation. Non in elit consectetur occaecat exercitation non voluptate laboris et labore enim nisi. Ad non laboris ea nisi labore voluptate irure ipsum reprehenderit dolor elit mollit anim et. Non fugiat in id sit nulla proident sunt.',
          'channel_id'=>2,
          'user_id'=>2,
          'slug'=>str_slug($t1),
          
          ]);
    }
}
