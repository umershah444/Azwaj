@extends('layouts.master')

@section('title')
Categories / Update - Azwaj
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
                        <a href="{{route('category.all')}}"> Categories</a>
                    </li>
                                                                                                                                                
                                                    <li>Edit</li>
                        
                                                </ol>                                                                   </ol>
                    </div>
@stop

@section('page_header')
 <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-categories"></i> Edit Categories
        </h1>
 </div>        
@stop

@section('content')
                  <div id="voyager-notifications"></div>
                    <div class="page-content container-fluid">
        <form class="form" role="form"
              action="{{route('category.update')}}"
              method="POST" enctype="multipart/form-data" autocomplete="off">
            <!-- PUT Method if we are editing -->
                  {{ csrf_field() }}

            <div class="row">
                <div class="col-md-8">
                    <div class="panel ">
                    <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-image"></i> Category Details</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <input type='hidden' name='id' value='{{$category->id}}'>  
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                       value="{{$category->title}}">
                                 @if ($errors->has('title'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="email">Description</label>
                                <textarea class='form-control' name='description' id='description' cols="3" rows="5" placeholder="Description">{{$category->description}}</textarea>
                                 @if ($errors->has('description'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password">Serial No</label>
                                                                <input type="integer" class="form-control" id="serial_no" name="serial_no" value="{{$category->serial_no}}" >
                            @if ($errors->has('serial_no'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('serial_no') }}</strong>
                                    </span>
                                @endif
                                <select class="form-control  select2 " 
                                         ><option selected="" disabled="">Category Serial Numbers</option>
                        @foreach($categories as $category)
                        <option  disabled="
                                ">{{$category->serial_no}} : {{$category->title}}</option>
                        @endforeach
                        
                </select>
                            </div>

                                                            <div class="form-group">
                                    <label for="default_role">Display in homepage</label>
                                    <select class="form-control select2" name="display_in_home">
                                        @if($category->display_in_home == 1 )
                                        <option value="1" selected="selected">Yes</option>
                                            <option value="0" >No</option>
                                            @else
                                             <option value="1" >Yes</option>
                                            <option value="0" selected="selected" >No</option>
                                            @endif
                                            
                                    </select>
                                     @if ($errors->has('display_in_home'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('display_in_home') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group">
                                    <label for="additional_roles">Status</label>
                                                                        <select
                    class="form-control  select2 "
                    name="status">
                               @if($category->status == 1 )
                                        <option value="1" selected="selected">Published</option>
                                            <option value="0" >Un Published</option>
                                            @else
                                             <option value="1" >Published</option>
                                            <option value="0" selected="selected" >Un Published</option>
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

                <div class="col-md-4">
                    <div class="panel panel panel-bordered panel-primary">
                      <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-image"></i> Category Image</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                                                    <img src="{{asset('upload'.$category->img_url)}}" style="width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;" />
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
                  
                  <div class="row">
                <div class="col-md-8">
                <div class="panel panel-bordered panel-info">
                    <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-image"></i>Locales</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                     <div class="panel-body">
                         
                         
                 <div class="input_fields_wrap" >
                      
                     <button type="button" class="add_field_button btn btn-success fileinput-button " style="width:200px;margin-left: 300px;">Add New Language</button><br><br>
                     
                     @foreach($category->categoryTranslations as $cT)
                     
                     @if($cT->locale !== 'en')
                     <div>
                         <div class="form-group">
                                    <label for="additional_roles">Locale</label>
                    <select class="form-control  select2 " name="locales[]"
                            ><option value="" selected disabled>None</option>
                        @foreach($locales as $locale)
                        @if($cT->locale == $locale->locale)
                        <option value="{{$locale->locale}}" selected>{{$locale->title}}</option>
                        @else
                        <option value="{{$locale->locale}}">{{$locale->title}}</option>
                        @endif
                        
                        @endforeach
                        
                </select>
                          </div>
                         
                      <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" class="form-control" id="title_trans" name="title_trans[]" placeholder="Title"
                                       value="{{$cT->title}}">
                                
                            </div>
                          <div class="form-group">
                                <label for="name">Description</label>
                                <input type="text" class="form-control" id="description_trans" name="description_trans[]" placeholder="Description"
                                       value="{{$cT->description}}">
                                 
                            </div>
                          
                          
                    
                    <a href="#" class="remove_field">Remove</a>

                    <br><br>
                   </div>
                     @endif
                     @endforeach
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
        $(document).ready(function () {
                            var table = $('#dataTable').DataTable({"order":[],"language":{"sEmptyTable":"No data available in table","sInfo":"Showing _START_ to _END_ of _TOTAL_ entries","sInfoEmpty":"Showing 0 to 0 of 0 entries","sInfoFiltered":"(filtered from _MAX_ total entries)","sInfoPostFix":"","sInfoThousands":",","sLengthMenu":"Show _MENU_ entries","sLoadingRecords":"Loading...","sProcessing":"Processing...","sSearch":"Search:","sZeroRecords":"No matching records found","oPaginate":{"sFirst":"First","sLast":"Last","sNext":"Next","sPrevious":"Previous"},"oAria":{"sSortAscending":": activate to sort column ascending","sSortDescending":": activate to sort column descending"}},"columnDefs":[{"targets":-1,"searchable":false,"orderable":false}]});
            
                        $('.select_all').on('click', function(e) {
                $('input[name="row_id"]').prop('checked', $(this).prop('checked'));
            });
        });


     
        
        $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
$(wrapper).append('<div><div class="form-group"><label for="additional_roles">Locale</label><select class="form-control  select2" name="locales[]"> <option value="" selected disabled>None</option>@foreach($locales as $locale)<option value="{{$locale->locale}}">{{$locale->title}}</option>@endforeach</select></div><div class="form-group"><label for="name">Title</label><input type="text" class="form-control" id="title_trans" name="title_trans[]" placeholder="Title" value=""></div><div class="form-group"><label for="name">Description</label><input type="text" class="form-control" id="description_trans" name="description_trans[]" placeholder="Title" value=""></div><a href="#" class="remove_field">Remove</a><br><br>'); //add input box
       $('.select2').select2();
		}
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    });
});
        
    </script>

    

@stop



