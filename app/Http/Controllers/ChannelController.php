<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\channel\ChannelsRequest;
use App\Http\Requests\channel\UpdateRequest;

class ChannelController extends Controller
{
    public function __construct()
        {
            $this->middleware('admin');
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        return view('channels.index')->with('channels',Channel::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('channels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChannelsRequest $request)
    {
           Channel::create([
               'title'=>$request->channel,
                'slug'=>str_slug($request->channel)                       
           ]);
           session()->flash('success', 'Channel created successfully');
          return redirect(route('channels.index'));
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Channel $channel)
    {
        return view('channels.create')->with('channel',$channel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Channel $channel)
    {
        $channel->update(
            [
                'title'=>$request->channel,
                'slug' => str_slug($request->channel) 
            ]
            );
            session()->flash('success', 'Update successfully');
        return redirect(route('channels.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channel $channel)
    {
     $channel->delete();   
     session()->flash('success', 'dleted successfully');
     return redirect(route('channels.index'));
    }
}
