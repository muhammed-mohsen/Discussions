<?php

namespace App\Http\Controllers;

use App\Discussion;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\discussions\CreateRequest;

class DiscussionsController extends Controller
{
    public function create()
        {
            return view('discuss');
        }
        public function store(CreateRequest $request)
            {
               
               $discussion= Discussion::create([
                    'content'=>$request->content,
                    'channel_id'=>$request->channel_id,
                    'title'=>$request->title,
                    'user_id'=>Auth::id(),
                    'slug'=>str_slug($request->title),       
                ]);
                session()->flash('success', 'created successfully');
                return redirect(route('discussion',$discussion->slug));
            }
            public function edit($slug)
                {
                    return view('edit')->with('d',Discussion::where('slug',$slug)->first());
                }
            public function show($slug)
                {
                 $discussion = Discussion::where('slug',$slug)->first();
             //    dd($discussion);
                 $best_answer = $discussion
                 ->replies()
                 ->where('best_answer',1)
                 ->first();
                 return view('discussions.show')->with('discussion',$discussion)->with('best',$best_answer);
                }
    public function update(Request $request ,Discussion $discussion)
    {


        // dd($discussion);
        $discussion->update([
            'content' => $request->content
        ]);
        session()->flash('success', 'updated successfully');
        return redirect()->route('discussion', ['slug' => $discussion->slug]);
    }
}
