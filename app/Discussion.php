<?php

namespace App;

use App\Like;
use App\Reply;
use App\Channel;
use App\Watcher;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
  protected $fillable = ['title','content','channel_id','user_id','slug'];

    public function channel()
        {
         return $this->belongsTo(Channel::class);   
        }
        public function user()
            {
                return $this->belongsto(User::class);
            }


            public function replies()
                {
                 return $this->hasMany(Reply::class);   
                }
            public function watchers()
                {
                 return $this->hasMany(Watcher::class);   
                }

    public function is_being_watched_by_auth()
    { 
     
        $id=Auth::id();

        $watchers_ids = array();

        foreach ($this->watchers as $w) {

            array_push($watchers_ids,$w->user_id);
        }
        if (in_array($id,$watchers_ids)) {
            return true;
        }
        else {
            return false;
        }

    }

    public function hasBestAnswer()
        {

            $result = false;
            foreach ($this->replies as $reply) {
            
                if ($reply->best_answer) {

                $result = true;
                break;
            } 
           
           
        }
        return $result;
            }
            
   
}
