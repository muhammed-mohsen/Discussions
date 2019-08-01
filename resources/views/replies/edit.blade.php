@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">Update reply</div>

                <div class="panel-body">
                    <form action="{{route('reply.update',$r->id)}}" method="post">
                    {{ csrf_field() }}
                  
                    <div class="form-group">
                     <label for="content"> change reply</label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{$r->content}}</textarea>

                    </div>
                    <div class="form-group">
                       
                        <button type="submit" class="btn btn-success pull-right">
                            Update Reply
                        </button>

                    </div>

                    
                    </form>
                </div>
          
</div>
@endsection
