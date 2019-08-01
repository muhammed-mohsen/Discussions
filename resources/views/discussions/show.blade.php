@extends('layouts.app')

@section('content')

 <div class="panel panel-default">
                <div class="panel-heading">
                   
                   <img src="{{$discussion->user->avatar}}" width="50px" height="50px"  alt="{{$discussion->title}}" class="rounded-circle">&nbsp;&nbsp;
                   <span>{{$discussion->user->name}} <b>({{$discussion->user->points}})</b></span> 
                    @if ($discussion->hasBestAnswer())
                    <span class="btn  pull-right btn-success btn-xs">closed</span>
                  @else 
                   <span class="btn btn pull-right btn-danger btn-xs">open</span> 
               
                  @endif
                  @if (!$discussion->hasBestAnswer())
                      @if (Auth::id() == $discussion->user->id)
                   <a href="{{route('discussion.edit',$discussion->slug)}}" class="btn btn-info pull-right btn-xs " style="margin-right:8px;">Edit</a>                      
                  @endif
                 @endif
                 
                   @if ($discussion->is_being_watched_by_auth())
                     <a href="{{route('discussion.unwatch',$discussion->id)}}" class="btn btn-default pull-right btn-xs " style="margin-right:8px;">unwatch</a> 
                   @else
                   
                   <a href="{{route('discussion.watch',$discussion->id)}}" class="btn btn-default pull-right btn-xs"  style="margin-right:8px;">watch</a>

                   @endif
                </div>

                <div class="panel-body">
                    <h4 class="text-center">
                        {{$discussion->title}}
                    </h4>
                    <p class="text-center">
                        {{$discussion->content}}
                    </p>
                 </div>
                 @if ($best)
                 
                 <div class="text-center" style="padding:40px;">
                   <h3>BEST ANSWER</h3>
                   <div class="panel panel-success">
                     <div class="panel-heading">
                    <img src="{{$best->user->avatar}}" width="50px" height="50px"  alt="{{$best->title}}" class="rounded-circle">&nbsp;&nbsp;
                   <span>{{$best->user->name}} <b>({{$best->user->points}})</b></span> 
                     </div>
                     <div class="panel-body">
                       {{$best->content}}
                     </div>
                   </div>
                 </div>


                 @endif




                <div class="panel-footer">
                    <p>
                    {{$discussion->replies->count()}} Replies
                </p>
                </div>                    
  </div>
<style>
img{
    border-radius:50%
}
</style>
  @foreach ($discussion->replies as $r)
      <div class="panel panel-default">
                <div class="panel-heading">
                   
                   <img src="{{$r->user->avatar}}" width="50px" height="50px"  alt="{{$r->title}}" class="rounded-circle">&nbsp;&nbsp;
                   <span>{{$r->user->name}} <b>({{$r->user->points}})</b></span> 
                   @if (!$best)
 
                   @if (Auth::id()==$discussion->user->id)
                  <a href="{{route('discussion.best.asnwer',$r->id)}}" class="btn btn-xs btn-info pull-right">Mark as best answer</a>    
                   @endif
 
                   @endif
                   @if(!$r->discussion->hasBestAnswer())
                    @if (Auth::id()==$r->user_id)
                  <a href="{{route('reply.edit',$r->id)}}" class="btn btn-xs btn-info pull-right" style="margin-right:8px;">Edit</a>    
                   @endif
                      
                   @endif
                  </div>

                <div class="panel-body">
                    <p>
                        {{$r->content}}
                </p>
                 
                </div>
                 <div class="panel-footer">

        @if ($r->is_liked_by_auth_user())
        <a href="{{route('reply.unlike',$r->id)}}" class="btn btn-danger btn-xs">Unlike <span class="badge">{{$r->likes->count()}}</span></a>
        @else
        
        <a href="{{route('reply.like',$r->id)}}" class="btn btn-primary btn-xs">Like <span class="badge">{{$r->likes->count()}}</span></a>

        @endif


    </div>
                               
  </div>
  @endforeach
  
      <div class="panel panel-default">
     <div class="panel-body">
@if(Auth::check())
        <form action="{{route('discussion.reply',$discussion->id)}}" method="post">
    {{ csrf_field() }}
     <div class="form-group">
         <label for="reply">Leave a reply...</label>
         <textarea name="reply" id="reply" cols="30" rows="10" class="form-control">{{old('reply')}}</textarea>
     </div>

     <button class="btn pull-right">Leave a reply</button>

    </form>
    @else
  
    <div class="text-center">
      <h2>Sign in to leave a reply</h2>
    </div>

  @endif
    </div>

  </div>

            
              
@endsection
