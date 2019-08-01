@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">{{isset($channel)?'Update':'Create'}}</div>

                <div class="panel-body">
                 <form action="{{isset($channel)?route('channels.update',$channel->id):route('channels.store')}}" method="POST">
                {{ csrf_field()}}
                @if (isset($channel))
                    {{method_field('put')}}
                @endif
                <div class="form-group">
                   
                    <input type="text" name="channel" value="{{isset($channel)?$channel->title:''}}" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                           {{isset($channel)?'Update Channel':'Save Channel'}}
                        </button>
                    </div>
                </div>
                
                </form>
                </div>
         
</div>
@endsection
