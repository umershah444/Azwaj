@extends('layouts.master')

@section('title')
Questionnaire / Add - Azwaj
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
                        <a href="{{route('questionnaire.all')}}"> Questionnaires</a>
                    </li>
                                                                                                                                                
                                                    <li>Create</li>
                        
                                                </ol>                                                                   </ol>
                    </div>
@stop

@section('page_header')
 <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-bar-chart"></i> Questionnaires
        </h1>
 </div>        
@stop

@section('content')
                  <div id="voyager-notifications"></div>
                    <div class="page-content container-fluid">
        <form class="form" role="form"
              action="{{route('questionnaire.insert')}}"
              method="POST" enctype="multipart/form-data" autocomplete="off">
            <!-- PUT Method if we are editing -->
                  {{ csrf_field() }}

            <div class="row">
                <div class="col-md-8">
                    <div class="panel ">
                    <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-image"></i> Questionnaire Details</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">Title</label>
                                <textarea class="form-control" cols="5" rows="4" id="title" name="title" placeholder="Title"></textarea>
                                
                                 @if ($errors->has('title'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <br>

                            <div class="form-group">
                                    <label for="additional_roles">Gender</label>
                    <select class="form-control  select2 " name="gender_id"
                            >
                        @foreach($genders as $gender)
                        <option value="{{$gender->id}}">{{$gender->title}}</option>
                        @endforeach
                        
                </select>
                          </div>
                            <br>

                            <div class="form-group">
                                <label for="password">Serial No</label>
                                                                <input type="integer" class="form-control" id="serial_no" name="serial_no" value="{{old('serial_no')}}" >
                            @if ($errors->has('serial_no'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('serial_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <br>

                                
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
                            <br><br>
                                                                          
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="panel panel panel-bordered panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-image"></i> Related Articles</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                     <label for="password">Select Articles</label>
                                    <select class="form-control  select2 " name="related_articles[]" multiple>
                                        
                        @foreach($articles as $article)
                        <option value="{{$article->id}}">{{$article->title}}</option>
                        @endforeach
                        
                </select>
                          </div>
                            <br><br>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="panel panel panel-bordered panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-image"></i> Related Books</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                    <label for="password">Select Books</label>
                                    <select class="form-control  select2 " name="related_books[]" multiple>
                                       
                        @foreach($books as $book)
                        <option value="{{$book->id}}">{{$book->title}}</option>
                        @endforeach
                        
                </select>
                          </div>
                        </div>
                        <br><br>
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
                               <textarea class="form-control" cols="5" rows="4" id="title_trans" name="title_trans[]" placeholder="Title"></textarea>
                               
                                
                            </div>
                          
                    <a href="#" class="remove_field">Remove</a>

                    <br><br>
                   </div>
                  </div>
                     </div>
                    </div>
                </div>
                    <div class="col-md-4">
                    <div class="panel panel panel-bordered panel-dark">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-image"></i> Related Videos</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                                   <label for="password">Select Videos</label>
                                    <select class="form-control  select2 " placeholder="Select Videos" name="related_videos[]" multiple>
                                        
                        @foreach($videos as $video)
                        <option value="{{$video->id}}">{{$video->title}}</option>
                        @endforeach
                        
                </select>
                          </div>
                        </div>
                        <br><br>
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
$(wrapper).append('<div><div class="form-group"><label for="additional_roles">Locale</label><select class="form-control  select2" name="locales[]"> <option value="" selected disabled>None</option>@foreach($locales as $locale)<option value="{{$locale->locale}}">{{$locale->title}}</option>@endforeach</select></div><div class="form-group"><label for="name">Title</label> <textarea class="form-control" cols="5" rows="4" id="title_trans" name="title_trans" placeholder="Title"></textarea></div><a href="#" class="remove_field">Remove</a>'); //add input box
        $('.select2').select2();
		}
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    });
});
        
    </script>

    

@stop



