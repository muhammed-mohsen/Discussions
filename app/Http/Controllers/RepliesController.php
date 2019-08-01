<?php

namespace App\Http\Controllers;

use App\Like;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepliesController extends Controller
{

   public function like($id)
       {
           Like::create([
               'reply_id'=>$id,
               'user_id'=>Auth::id(),
               
           ]);
           session()->flash('success', 'you like the reply');
           return redirect()->back();
       }
       public function unlike($id)
           {
               $like = Like::where('reply_id',$id)->where('user_id',Auth::id())->first();
               $like->delete();
               session()->flash('success', 'deleted successfully');
               return redirect()->back();
           }
           public function best_answer($id)
               {
                   $reply = Reply::find($id);
                   $reply->best_answer=1;
                   $reply->save();
                   $reply->user->points += 100;
                   $reply->user->save();
                   session()->flash('success', 'make best answer ');
                   return redirect()->back();
               }
    public function edit(Reply $reply)
    {
        return view('replies.edit')->with('r', $reply);
    }
    public function update(Request $request, Reply $reply)
    {



        $reply->update([
            'content' => $request->content
        ]);
        session()->flash('success', 'updated successfully');
        return redirect(route('discussion',['slug'=>$reply->discussion->slug]));
    }

}
