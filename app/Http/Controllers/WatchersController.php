<?php

namespace App\Http\Controllers;

use App\Watcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchersController extends Controller
{

    public function watch($id)
        {
         Watcher::create([
             'discussion_id'=>$id,
             'user_id'=>Auth::id(),
             
         ]);
         session()->flash('success', 'created successfully');
         return redirect()->back();
        }
    public function unwatch($id)
        {
         $watcher=Watcher::where('discussion_id',$id)->where('user_id',Auth::id());
         $watcher->delete();
         session()->flash('success', 'you are no longer watching  successfully');
         return redirect()->back();
        }


}
