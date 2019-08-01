<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Channel extends Model
{
   protected $fillable = ['title','slug'];

   public function discussions()
       {
        return $this->hasMany(Discussion::class);   
       }
       
        
    
}
