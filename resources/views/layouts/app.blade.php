<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/bootstrap.min.css')}}"/>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php 
         echo json_encode([
            'csrfToken' => csrf_token(),
        ]);
        ?>

    </script>  
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
     
   
     @if ($errors->count()>0) 
<ul class="list-group alert alert-danger ">

@foreach ($errors->all() as $error)

<li class="list-group-item ">

{{$error}}

</li>

@endforeach


</ul>
         <br>
   
    
     @endif


     <div class="container">
        <div class="col-md-4">
            
                 
               <a href="{{route('discussion.create')}}" class="form-control btn btn-primary">
                 Create a new disscussion
                </a>
                <br>
                <br>
                 
                 <div class="panel panel-default">
               
                    <div class="pannel-body">
                       <ul class="list-group">
            
                       <li class="list-group-item">
                        <a href="/forum" style="text-decoration:none ;">Home</a>
                       
                        </li>
                        <li class="list-group-item">
                     <a href="/forum?filter=me" style="text-decoration:none ;"> My Discussion</a>
                       </li>
                        <li class="list-group-item">
                     <a href="/forum?filter=solved" style="text-decoration:none ;"> Answered Discussion</a>
                       </li>
                        <li class="list-group-item">
                     <a href="/forum?filter=unsolved" style="text-decoration:none ;">Un Answered Discussion</a>
                       </li>
                        </ul>
                       
                        </div>
                </div>

                @if(Auth::check())
                 @if(Auth::user()->admin)
                 <div class="panel panel-default">
               
                    <div class="pannel-body">
                       <ul class="list-group">
            
                       <li class="list-group-item">
                        <a href="/channels" style="text-decoration:none ;">All Channels</a>
                       
                       </li>
                        </ul>
                       
                        </div>
                </div>
                @endif
            @endif
                 
            <div class="panel panel-default">
                <div class="panel-heading">
                    Channels
                    </div>
                    <div class="pannel-body">
                       <ul class="list-group">
                       @foreach($channels as $channel)
                       <li class="list-group-item">
                        <a href="{{route('channel',['slug'=>$channel->slug])}}" style="text-decoration:none">{{$channel->title}}</a>
                        </li>
                        @endforeach
                        </ul>
                       
                        </div>
                </div>
            </div>

             <div class="col-md-8">
            @yield('content')
            </div>
        
        
        </div>   
        
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
    
    @if(Session::has('success'))
 
     toastr.success('{{Session::get('success')}}')
     

    @endif
    
    </script>
</body>
</html>
