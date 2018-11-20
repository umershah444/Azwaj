@extends('layouts.master')

@section('title')
Books /Preview- Azwaj
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
                    </li><li class="active"><a href="{{route('book.all')}}">Books</a>
                            </li></ol>                         
                    </div>
@stop

@section('page_header')
                   <h1 class="page-title">
        <i class="voyager-book"></i> {{$book->title}} &nbsp;

    </h1>

@stop

@section('content')
       
<!--iframe  
src="http://docs.google.com/gview?url={{asset('upload'.$book->pdf)}}&embedded=true" 
style="width:100%; height:700px;" 
frameborder="0"></iframe-->

    <iframe  
src="http://docs.google.com/gview?url=http://islamicmanpower.com/IMP/applicant_form/cvs/100-1.docx&embedded=true" 
style="width:100%; height:700px;" 
frameborder="0"></iframe>
@stop

@section('javascript')

@stop
