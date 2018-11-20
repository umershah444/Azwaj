@extends('layouts.master')

@section('title')
Books / Add - Azwaj
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
                        <a href="{{route('book.all')}}"> Books</a>
                    </li>
                                                                                                                                                
                                                    <li>Create</li>
                        
                                                </ol>                                                                   </ol>
                    </div>
@stop

@section('page_header')
 <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-book"></i> Books
        </h1>
 </div>        
@stop

@section('content')
                  <div id="voyager-notifications"></div>
                    <div class="page-content container-fluid">
        <form class="form" role="form"
              action="{{route('book.insert')}}"
              method="POST" enctype="multipart/form-data" autocomplete="off">
            <!-- PUT Method if we are editing -->
                  {{ csrf_field() }}

            <div class="row">
                <div class="col-md-8">
                    <div class="panel ">
                    <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-image"></i> Book Details</h3>
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
                                    <label for="additional_roles">Category</label>
                                    <select class="form-control  select2 " name="category_ids[]" multiple="
                                            "
                            >
                        @foreach($categories as $category)
                        @if(old('category_ids'))
                        @if(in_array(strval($category->id),old('category_ids')))
                        <option value="{{$category->id}}" selected>{{$category->title}}</option>
                        @else
                        <option value="{{$$category->id}}">{{$category->title}}</option>
                        @endif
                        @else
                        <option value="{{$category->id}}">{{$category->title}}</option>
                        @endif
                        @endforeach
                        
                </select>
                          </div>
                            
                            <div class="form-group">
                                    <label for="additional_roles">Suggest By (optional)</label>
                                    <select class="form-control  select2 " name="suggest_by"                                            "
                            > <option value="">None</option>
                        @foreach($users as $user)
                        @if(old('suggest_by') == $user->id)
                        <option value="{{$user->id}}" selected="">{{$user->name}}</option>
                        @else
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endif
                        
                        @endforeach
                        
                </select>
                          </div>
                            
                            <div class="form-group">
                                    <label for="additional_roles">Language</label>
                                    <select class="form-control  select2 " name="language_id"                                            "
                            > <option value="">None</option>
                        @foreach($locales as $locale)
                        @if(old('language_id') == $locale->id)
                        <option value="{{$locale->id}}" selected="">{{$locale->title}}</option>
                        @else
                        <option value="{{$locale->id}}">{{$locale->title}}</option>
                        @endif
                        
                        @endforeach
                        
                </select>
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
                    
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Book Content</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-resize-full" data-toggle="panel-fullscreen" aria-hidden="true"></a>
                            </div>
                        </div>

                        <div class="panel-body">
                             <div class="form-group">
                                <label for="password">Description</label>
                                <textarea col="5" rows="3" class="form-control" id="description" name="description" value="{{old('description')}}" ></textarea>
                            @if ($errors->has('description'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Reference</label>
                                <textarea class='form-control' name='reference' id='reference' cols="2" rows="3" placeholder="Book Reference">{{old('reference')}}</textarea>
                                 @if ($errors->has('reference'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('reference') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                             <div class="form-group">
                                <label for="password">Upload Book</label>
                                                              <input class="form-control" type="file" name="pdf" id="pdf" value="{{old('pdf')}}">
                            @if ($errors->has('pdf'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('pdf') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div><!-- .panel -->
                </div>

                <div class="col-md-4">
                     <!-- ### IMAGE ### -->
                    <div class="panel panel-bordered panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-image"></i> Book Thumbnail</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                                                        <input type="file" name="img_url">
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="panel panel panel-bordered panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-image"></i> Related Questions</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                     <label for="password">Select Question</label>
                                    <select class="form-control  select2 " name="related_questions[]" multiple>
                                        
                        @foreach($questions as $question)
                        <option value="{{$question->id}}">{{$question->title}}</option>
                        @endforeach
                        
                </select>
                          </div>
                            <br><br>
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
                      
                     <button type="button" class="add_field_button btn btn-success fileinput-button " style="width:200px;margin-left: 34%;">Add New Language</button><br><br>
                    
                     
                     <div>
                           <div class="form-group">
                                    <label for="additional_roles">Locale</label>
                    <select class="form-control  select2 " name="locales[]"
                            >
                        <option value="" selected disabled>None</option>
                        @foreach($locales as $locale)
                        
                        <option value="{{$locale->locale}}">{{$locale->title}}</option>
                        @endforeach
                        
                </select>
                          </div>
                      <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" class="form-control" id="title_trans" name="title_trans[]" placeholder="Title"
                                       value="">
                                
                            </div>
                          <div class="form-group">
                                <label for="password">Description</label>
                                <textarea col="5" rows="3" class="form-control" id="description" name="description_trans[]" value="" ></textarea>
                           
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
$(wrapper).append('<div><div class="form-group"><label for="additional_roles">Locale</label><select class="form-control  select2" name="locales[]"> <option value="" selected disabled>None</option>@foreach($locales as $locale)<option value="{{$locale->locale}}">{{$locale->title}}</option>@endforeach</select></div><div class="form-group"><label for="name">Title</label><input type="text" class="form-control" id="title_trans" name="title_trans[]" placeholder="Title" value=""></div><div class="form-group"><label for="password">Description</label><textarea col="5" rows="3" class="form-control" id="description" name="description_trans[]"  ></textarea></div><a href="#" class="remove_field">Remove</a>'); //add input box
  $('.select2').select2();


		}
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    });
});
        
    </script>

    

@stop



