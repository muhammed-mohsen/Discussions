@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">Update a new discussion</div>

                <div class="panel-body">
                    <form action="{{route('discussion.update',$d->id)}}" method="post">
                    {{ csrf_field() }}
                  
                    <div class="form-group">
                     <label for="content">Ask a question</label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{$d->content}}</textarea>

                    </div>
                    <div class="form-group">
                       
                        <button type="submit" class="btn btn-success pull-right">
                            Update Discussion
                        </button>

                    </div>

                    
                    </form>
                </div>
          
</div>
@endsection
