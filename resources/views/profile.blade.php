@extends('layouts.master')

@section('title')
Admin Profile - Azwaj
@stop

@section('breadcrumb')
 <div class="navbar-header">
            <button class="hamburger btn-link no-animation">
                <span class="hamburger-inner"></span>
            </button>
                         <ol class="breadcrumb hidden-xs">
                                    <li class="active">
                        <a href="{{route('home')}}"><i class="voyager-boat"></i> Dashboard</a>
                    </li>
                                                                                                                                                
                                                    <li>Profile</li>
                        
                                                </ol>                                               
                    </div>
@stop
@section('content')
    
                    <div style="background-size:cover; background-image: url({{asset('images/bg.jpg')}}); background-position: center center;position:absolute; top:0; left:0; width:100%; height:300px;"></div>
    <div style="height:160px; display:block; width:100%"></div>
    <div style="position:relative; z-index:9; text-align:center;">
    
    
    @if($admin->img_url == null)
        <img src="{{asset('images/default.png')}}"
             class="avatar"
             style="border-radius:50%; width:150px; height:150px; border:5px solid #fff;"
             alt="Admin avatar">
        @else
        <img src="{{asset('upload'.$admin->img_url)}}"
             class="avatar"
             style="border-radius:50%; width:150px; height:150px; border:5px solid #fff;"
             alt="Admin avatar">
        @endif
        <h4>{{$admin->name}}</h4>
        <div class="user-email text-muted">{{$admin->email}}</div>
        <p></p>
        <a href="{{route('admin.edit',['id'=>$admin->id])}}" class="btn btn-primary">Edit My Profile</a>
    </div>
            
@stop

@section('javascript')

   
@stop
