<?php

namespace App\Http\Controllers;
set_time_limit(0);
use App\User;
use App\Reply;
use App\Channel;
use App\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Notification as IlluminateNotification;
use Illuminate\Pagination\Paginator;

class ForumController extends Controller
{
   public function index()
       {
    //    return view('forum',['discussions'=>Discussion::orderBy('created_at','desc')->paginate(2)]);   
     switch (request('filter')) {
         case 'me':
             $result = Discussion::where('user_id',Auth::id())->orderBy('created_at','desc')->paginate(4);
             break;

             case 'solved':
             $answered = array();
                 foreach (Discussion::all() as $d) {
                     if ($d->hasBestAnswer()) {
                         array_push($answered,$d);
                     }
                 }
                 $result = new Paginator($answered,4);
                 break;
             case 'unsolved':
             $unanswered = array();
                 foreach (Discussion::all() as $d) {
                     if (!$d->hasBestAnswer()) {
                         array_push($unanswered,$d);
                     }
                 }
                 $result = new Paginator($unanswered,4);
                 break;
         
         default:
             $result = Discussion::orderBy('created_at','desc')->paginate(3);
             break;
     }
     return view('forum')->with('discussions',$result);
    }

       public function reply($discussion_id,Request $request)
           {
               $d = Discussion::find($discussion_id);
   

            
           $reply =  Reply::create([
                   'user_id'=>Auth::id(),
                   'discussion_id'=>$discussion_id,
                   'content'=>$request->reply,                
                   
               ]);

               $reply->user->points += 25;
               $reply->user->save();
               session()->flash('success', 'reply to disscussion');

        $watchers = array();
        foreach ($d->watchers as $watcher) {
            array_push($watchers, User::find($watcher->user_id));
        }

        Notification::send($watchers, new \App\Notifications\NewReplyAdded($d));
        
  
              
               return redirect()->back();
           }
           public function channel($slug)
               {
                $channel = Channel::where('slug',$slug)->first();
        //    dd($channel->discussions);
                return view('channel')->with('discussions',$channel->discussions()->paginate(5));   
               }
}
