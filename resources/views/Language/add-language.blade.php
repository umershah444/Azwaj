@extends('layouts.master')

@section('title')
Categories / Add - Azwaj
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
                      <li class="active">
                        <a href="{{route('language.all')}}"> Languages</a>
                    </li>
                                                                                                                                                
                                                    <li>Create</li>
                        
                                                </ol>                                                                   </ol>
                    </div>
@stop

@section('page_header')
 <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-list"></i> Languages
        </h1>
 </div>        
@stop

@section('content')
                  <div id="voyager-notifications"></div>
                    <div class="page-content container-fluid">
        <form class="form" role="form"
              action="{{route('language.insert')}}"
              method="POST" enctype="multipart/form-data" autocomplete="off">
            <!-- PUT Method if we are editing -->
                  {{ csrf_field() }}

            <div class="row">
                <div class="col-md-8">
                    <div class="panel ">
                    <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-image"></i> Language Details</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                       value="{{old('title')}}">
                                 @if ($errors->has('title'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="name">Locale</label>
                                <input type="text" class="form-control" id="title" name="locale" placeholder="Locale"
                                       value="{{old('locale')}}">
                                 @if ($errors->has('locale'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('locale') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password">Serial No</label>
                                                                <input type="integer" class="form-control" id="serial_no" name="serial_no" value="{{old('serial_no')}}" >
                            @if ($errors->has('serial_no'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('serial_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                                <div class="form-group">
                                    <label for="additional_roles">Status</label>
                                                                        <select
                    class="form-control  select2 "
                    name="status">
                               @if(old('status') == 1 )
                                        <option value="1" selected="selected">Active</option>
                                            <option value="0" >InActive</option>
                                            @else
                                             <option value="1" >Active</option>
                                            <option value="0" selected="selected" >InActive</option>
                                            @endif
                </select>
                                     @if ($errors->has('status'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                                </div>
                                                                          
                        </div>
                    </div>
                </div>

                
                
                </div>
                <div class="row">
                <div class="col-md-8">
                <div class="panel panel-bordered panel-info">
                    <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-image"></i>Locales</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                     <div class="panel-body" style='display:none'>
                 <div class="input_fields_wrap" >
                      
                     <button type="button" class="add_field_button btn btn-success fileinput-button " style="width:200px;margin-left: 300px;">Add New Language</button><br><br>
                      <div>
                           <div class="form-group">
                                    <label for="additional_roles">Locale</label>
                    <select class="form-control  select2 " name="locales[]"
                            ><option value="" selected disabled>None</option>
                        @foreach($locales as $locale)
                        <option value="{{$locale->locale}}">{{$locale->title}}</option>
                        @endforeach
                        
                </select>
                          </div>
                      <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" class="form-control" id="title_trans" name="title_trans[]" placeholder="Title"
                                       value="{{old('title')}}">
                                
                            </div>
                     
                         
                    
                    <a href="#" class="remove_field">Remove</a>

                    <br><br>
                   </div>
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
            </div>
        </div>
    </div>
</div>
@stop

@section('javascript')

       <script>
       
        
        
        $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
$(wrapper).append('<div><div class="form-group"><label for="additional_roles">Locale</label><select class="form-control  select2" name="locales[]"> <option value="" selected disabled>None</option>@foreach($locales as $locale)<option value="{{$locale->locale}}">{{$locale->title}}</option>@endforeach</select></div><div class="form-group"><label for="name">Title</label><input type="text" class="form-control" id="title_trans" name="title_trans[]" placeholder="Title" value=""></div><a href="#" class="remove_field">Remove</a>'); //add input box
        $('.select2').select2();}
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    });
});
        
    </script>

    

@stop



