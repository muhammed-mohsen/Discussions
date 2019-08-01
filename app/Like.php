<?php

namespace App;

use App\Reply;
use App\Discussion;
use Illuminate\Database\Eloquent\Model;
use SocialNorm\User;

class Like extends Model
{
    protected $fillable = ['reply_id','user_id'];
 public function reply()
     {
       return  $this->belongsTo(Reply::class);
     }
    public function user()
    {
        return  $this->belongsTo(User::class);
    }
}
