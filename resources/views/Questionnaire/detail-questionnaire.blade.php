@extends('layouts.master')

@section('title')
Questionnaire / Detail - Azwaj
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
                    </li><li class="active"><a href="{{route('questionnaire.all')}}">Questionnaire</a>
                            </li></ol>                         
                    </div>
@stop

@section('page_header')
                   <h1 class="page-title">
        <i class="voyager-bar-chart"></i> Viewing Questionnaire &nbsp;

                    <a href="{{route('questionnaire.edit',['id'=>$questionnaire->id])}}" class="btn btn-info">
                <span class="glyphicon glyphicon-pencil"></span>&nbsp;
                Edit
            </a>
                            <a href="javascript:;" title="Delete" class="btn btn-danger delete" data-id="{{$questionnaire->id}}" id="delete-{{$questionnaire->id}}">
                <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Delete</span>
            </a>
        
        <a href="{{route('questionnaire.all')}}" class="btn btn-warning">
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
                                              <p>{{$questionnaire->title}}</p>
                                                    </div><!-- panel-body -->
                                                    <hr style="margin:0;">
                                                                    
                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Gender</h3>
                        </div>

                        <div class="panel-body" style="padding-top:0;">
                                        <p>{{$questionnaire->gender->title}}</p>
                                                    </div><!-- panel-body -->
                                                    
                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Related Videos</h3>
                        </div>

                        <div class="panel-body" style="padding-top:0;">
                            <ul>
                               @if($questionnaire->relatedVideos)
                                @foreach($questionnaire->relatedVideos as $rV)
                                <li><a target="_blank" href="{{route('video.detail',['id'=>$rV->video->id])}}">{{$rV->video->title}}</a></li>
                                @endforeach
                                @endif
                                
                            </ul>
                                       
                                                    </div><!-- panel-body -->
                                                    <hr style="margin:0;">
               <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Related Articles</h3>
                        </div>

                        <div class="panel-body" style="padding-top:0;">
                            <ul>
                                @if($questionnaire->relatedArticles)
                                @foreach($questionnaire->relatedArticles as $rA)
                                <li><a target="_blank" href="{{route('article.detail',['id'=>$rA->article->id])}}">{{$rA->article->title}}</a></li>
                                @endforeach
                                @endif
                                
                            </ul>
                                       
                                                    </div><!-- panel-body -->
                                                    <hr style="margin:0;">
                     <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Related Books</h3>
                        </div>

                        <div class="panel-body" style="padding-top:0;">
                            <ul>
                                @if($questionnaire->relatedBooks)
                                @foreach($questionnaire->relatedBooks as $rB)
                                <li><a target="_blank" href="{{route('book.detail',['id'=>$rB->book->id])}}">{{$rB->book->title}}</a></li>
                                @endforeach
                                @endif
                                
                            </ul>
                                       
                                                    </div><!-- panel-body -->
                                                    
                                                    <hr style="margin:0;">
                                                                    
                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Serial no</h3>
                        </div>

                        <div class="panel-body" style="padding-top:0;">
                                                        <p>{{$questionnaire->serial_no}}</p>
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
                                    
                                    
                                </tr>
                                @foreach($questionnaire->questionnaireTranslations as $qT)
                                <tr> <td>{{$qT->locale}}</td>
                                    <td>{{$qT->title}}</td>
                                   
                                   
                                        </tr>
                                        @endforeach
                            </table>
                                                    </div><!-- panel-body -->                            
                                                    
                                                                    
                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Status</h3>
                        </div>

                        <div class="panel-body" style="padding-top:0;">
                          @if($questionnaire->status == 1 )
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
                                                            {{$questionnaire->created_at}}
                        </div>
                                                                   <hr style="margin:0;">
             
                                                                    
                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Updated At</h3>
                        </div>

                        <div class="panel-body" style="padding-top:0;">
                                                            {{$questionnaire->updated_at}}
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
            $('#delete_form')[0].action = {!! json_encode(url("/Questionnaire/Delete/__id")) !!}.replace('__id', $(this).data('id'));
            $('#delete_modal').modal('show');
        });
        </script>
@stop
