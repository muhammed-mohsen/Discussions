@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">Create a new discussion</div>

                <div class="panel-body">
                    <form action="{{route('discussion.store')}}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">

                    <label for="title">Title</label>
                    
                        <input type="text" name="title" class="form-control" value="{{old('title')}}">

                    </div>

                    <div class="form-group">
 
                        <label for="channel">Pick a channel</label>
                        <select name="channel_id" id="channel_id" class="form-control">
                            @foreach ($channels as $channel)
                                <option value="{{$channel->id}}">{{$channel->title}}</option>
                            @endforeach
                        </select>
                    
                    </div>
                    <div class="form-group">
                     <label for="content">Ask a question</label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{old('content')}}</textarea>

                    </div>
                    <div class="form-group">
                       
                        <button type="submit" class="btn btn-success pull-right">
                            Create Discussion
                        </button>

                    </div>

                    
                    </form>
                </div>
          
</div>
@endsection
