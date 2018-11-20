@extends('layouts.master')

@section('title')
Videos / Details - Azwaj
@stop

@section('css')

@stop

@section('breadcrumb')
 <div class="navbar-header">
            <button class="hamburger btn-link no-animation">
                <span class="hamburger-inner"></span>
            </button>
                      <ol class="breadcrumb hidden-xs">
                                    <li class="active">
                        <a href="{{route('home')}}"><i class="voyager-boat"></i> Dashboard</a>
                    </li><li class="active"><a href="{{route('video.all')}}">Videos</a>
                            </li></ol>                         
                    </div>
@stop

@section('page_header')
                   <h1 class="page-title">
        <i class="voyager-categories"></i> Viewing Video &nbsp;

                    <a href="{{route('video.edit',['id'=>$video->id])}}" class="btn btn-info">
                <span class="glyphicon glyphicon-pencil"></span>&nbsp;
                Edit
            </a>
                            <a href="javascript:;" title="Delete" class="btn btn-danger delete" data-id="{{$video->id}}" id="delete-{{$video->id}}">
                <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Delete</span>
            </a>
        
        <a href="{{route('video.all')}}" class="btn btn-warning">
            <span class="glyphicon glyphicon-list"></span>&nbsp;
            Return to List
        </a>
    </h1>

@stop

@section('content')
       
  <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered" style="padding-bottom:5px;">
                    <!-- form start -->
                                            
                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Title</h3>
                        </div>

                        <div class="panel-body" style="padding-top:0;">
                                              <p>{{$video->title}}</p>
                                                    </div><!-- panel-body -->
                                                    <hr style="margin:0;">
                                                                    
                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Description</h3>
                        </div>

                        <div class="panel-body" style="padding-top:0;">
                                        <p>{{$video->description}}</p>
                                                    </div><!-- panel-body -->
                                                    
                                                                               <hr style="margin:0;">
                                                                    
                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Video Link </h3>
                        </div>

                        <div class="panel-body "  style="padding-top:0;">
                            <div class='row'>
                                <div class='col-md-5'>
                                 <p>{{$video->link}}</p>
                                   
                                 <b style="font-weight: 700" >Video Thumbnail</b>
                                 <img  style="width:300px;height:266px;" 
                                     src="{{asset('upload'.$video->img_url)}}">
                                                   
                                
                            </div>
                                <div class='col-md-7'>
                                    <iframe width="520" height="320" src="{{$video->link}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>
                            </div>
                                       
                                                    </div><!-- panel-body -->
                       
                                                    
                                                                               <hr style="margin:0;">
                                                                    
                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body" style="padding-top:0;">
                            <ul>
                                @foreach($video->videoCategories as $vC)
                                <li>{{$vC->category->title}}</li>
                                @endforeach
                                
                            </ul>
                                       
                                                    </div><!-- panel-body -->
                                                    <hr style="margin:0;">
                                                    <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Suggest By</h3>
                        </div>

                        <div class="panel-body" style="padding-top:0;">
                            @if($video->videoSuggestBy)
                                                        <p>{{$video->videoSuggestBy->name}}</p>
                                                        @else 
                                                        <p> None</p>
                                                        @endif
                                                    </div><!-- panel-body -->
                                                       <hr style="margin:0;">
                                                                    
                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Questions</h3>
                        </div>

                        <div class="panel-body" style="padding-top:0;">
                            <ul>
                                @foreach($video->relatedQuestions as $aC)
                                <li>{{$aC->question->title}}</li>
                                @endforeach
                                
                            </ul>
                                       
                                                    </div><!-- panel-body -->
                                                    
                                                      <hr style="margin:0;">
                                                    <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Language</h3>
                        </div>

                        <div class="panel-body" style="padding-top:0;">
                            @if($video->videoLanguage)
                                                        <p>{{$video->videoLanguage->title}}</p>
                                                        @else 
                                                        <p> None</p>
                                                        @endif
                                                    </div><!-- panel-body -->
                                                    <hr style="margin:0;">
                                                                    
                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Serial no</h3>
                        </div>

                        <div class="panel-body" style="padding-top:0;">
                                                        <p>{{$video->serial_no}}</p>
                                                    </div><!-- panel-body -->
                                                    <hr style="margin:0;">
                       
                                                    
                                                    
                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Locales</h3>
                        </div>

                        <div class="panel-body" style="padding-top:0;">
                            <table class="Table">
                                <tr >
                                    <th><b>Locale</b></th>
                                    <th><b>Title</b></th>
                                    <th><b>Description</b></th>
                                    
                                </tr>
                                @foreach($video->videoTranslations as $vT)
                                <tr> <td>{{$vT->locale}}</td>
                                    <td>{{$vT->title}}</td>
                                    <td>{{$vT->description}}</td>
                                   
                                        </tr>
                                        @endforeach
                            </table>
                                                    </div><!-- panel-body -->                            
                                                    
                                                                    
                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Status</h3>
                        </div>

                        <div class="panel-body" style="padding-top:0;">
                          @if($video->status == 1 )
                         <p>Published</p>
                         @else
                         <p>Un Published</p>
                         @endif
                                                    </div><!-- panel-body -->
                       
                                                           
                                                    <hr style="margin:0;">
             
                                                                    
                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Created At</h3>
                        </div>

                        <div class="panel-body" style="padding-top:0;">
                                                            {{$video->created_at}}
                        </div>
                                                                   <hr style="margin:0;">
             
                                                                    
                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Updated At</h3>
                        </div>

                        <div class="panel-body" style="padding-top:0;">
                                                            {{$video->updated_at}}
                                                    </div><!-- panel-body -->
                                                   
                        

                       
                </div>
            </div>
        </div>
    </div>



<div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> Are you sure you want to delete this category?</h4>
                </div>
                <div class="modal-footer">
                    <form action="" id="delete_form" method="GET">
                        <input type="submit" class="btn btn-danger pull-right delete-confirm" value="Yes, Delete it!">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('javascript')
<script>
 var deleteFormAction;
        $('.delete').on('click', function (e) {
            $('#delete_form')[0].action = {!! json_encode(url("/Video/Delete/__id")) !!}.replace('__id', $(this).data('id'));
            $('#delete_modal').modal('show');
        });
        </script>
@stop
