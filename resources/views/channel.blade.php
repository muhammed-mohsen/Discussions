@extends('layouts.app')

@section('content')
<style>
img {
  border-radius: 50%;
}
</style>
    
@foreach ($discussions  as $discussion)
    
 <div class="panel panel-default">
                <div class="panel-heading">
                   
                   <img src="{{$discussion->user->avatar}}" width="50px" height="50px"  alt="{{$discussion->title}}" class="rounded-circle">&nbsp;&nbsp;
                   <span>{{$discussion->user->name}},<b>{{$discussion->created_at->diffForHumans()}}</b></span> 
                      @if ($discussion->hasBestAnswer())
                    <span class="btn  pull-right btn-success btn-xs">closed</span>
                  @else 
                   <span class="btn btn pull-right btn-danger btn-xs">open</span> 
                  
                  @endif
                   
                   <a href="{{route('discussion',['slug'=>$discussion->slug,]
                   )}}" class="btn btn-default pull-right btn-xs" style="margin-right:8px;">View</a>
                </div>

                <div class="panel-body">
                    <h4 class="text-center">
                        {{$discussion->title}}
                    </h4>
                    <p class="text-center">
                        {{str_limit($discussion->content,50)}}
                    </p>
                </div>
                <div class="panel-footer">
                    {{$discussion->replies->count()}} Replies
                </div>
            </div>
            @endforeach
  <div class="text-center">
                                       {{$discussions->links()}}
                </div>
            
                
           
@endsection
