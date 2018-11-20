@extends('layouts.master')

@section('title')
Admin Profile /Edit - Azwaj
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

@section('page_header')
           <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-person"></i> Edit Person
        </h1>
 </div>        
@stop


@section('content')
 <div class="page-content container-fluid">
        <form class="form-edit-add" role="form"
              action="{{route('admin.update')}}"
              method="POST" enctype="multipart/form-data" autocomplete="off">
            <!-- PUT Method if we are editing -->
             {{ csrf_field() }}

            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-bordered">
                    
                        <input type='hidden' name='id' value='{{$admin->id}}'>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                       value="{{$admin->name}}">
                                @if ($errors->has('name'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail"
                                       value="{{$admin->email}}">
                                @if ($errors->has('email'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                                                    <br>
                                    <small>Leave empty to keep the same</small>
                               <input type="password" class="form-control" id="password" name="password" value="" autocomplete="new-password">
                            @if ($errors->has('password'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <br>
                            <br>

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="panel panel panel-bordered panel-warning">
                        <div class="panel-body">
                            <div class="form-group">
                                @if($admin->img_url == null)
                                
                              <img src="{{asset('images/default.png')}}" style="width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;" />
                              @else
                               <img src="{{asset('upload'.$admin->img_url)}}" style="width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;" />
                             
                              @endif
                              <input type="file" data-name="avatar" name="img_url">
                           @if ($errors->has('img_url'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('img_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary pull-right save">
                Save
            </button>
        </form>

       
    </div>
         
@stop

@section('javascript')

   
@stop
