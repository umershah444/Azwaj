@extends('layouts.master')

@section('title')
All Users - Azwaj
@stop

@section('css')
<link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
@stop

@section('breadcrumb')
 <div class="navbar-header">
            <button class="hamburger btn-link">
                <span class="hamburger-inner"></span>
            </button>
                      <ol class="breadcrumb hidden-xs">
                                    <li class="active">
                        <a href="{{route('home')}}"><i class="voyager-boat"></i> Dashboard</a>
                    </li><li class="active"><a href="{{route('users.all')}}">Users</a>
                            </li></ol>                         
                    </div>
@stop

@section('page_header')
                   <h1 class="page-title">
        <i class="voyager-person"></i> Viewing User &nbsp;

                    <a href="" class="btn btn-info">
                <span class="glyphicon glyphicon-pencil"></span>&nbsp;
                Edit
            </a>
                            <a href="javascript:;" title="Delete" class="btn btn-danger delete" data-id="2" id="delete-2">
                <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Delete</span>
            </a>
        
        <a href="{{route('users.all')}}" class="btn btn-warning">
            <span class="glyphicon glyphicon-list"></span>&nbsp;
            Return to List
        </a>
    </h1>
<div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> Are you sure you want to delete this user?</h4>
                </div>
                <div class="modal-footer">
                    <form action="" id="delete_form" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="RwTuyHwNe2gfs3IbhxH4UeG6OMOFxBXLCpHKTtrE">
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="Yes, Delete it! user">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('content')
                    <div class="page-content browse container-fluid">
    
        <div class="alerts">
    </div>
                        <div class="form-horizontal">
    
<div id="product-edit" class="nav-tabs-custom">
    <ul class="nav-tabs nav">
        <li class="active">
            <a data-tab-name="tab-info" data-toggle="tab" href="#tab-info">Information</a></li>
        
        <li><a data-tab-name="tab-pictures" data-toggle="tab" href="#tab-pictures">Pictures</a></li>
        <li class=""><a data-tab-name="tab-product-attributes" data-toggle="tab" href="#tab-product-attributes">Payment</a></li>
         <li class=""><a data-tab-name="tab-product-reviews" data-toggle="tab" href="#tab-product-reviews">Contribution</a></li>
        </ul>
    <div class="tab-content">
        <div class="active tab-pane" id="tab-info">



<div class="raw clearfix">
<div class="col-md-7">
<div class="panel-group">
    
<div class="panel panel-default">
<div class="panel-heading">
Personal information
</div>
<div class="panel-body">



<div>
<div class="form-group">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="Name">Name</label></div>
</div>
<div class="col-md-8">
    <div class='input-group input-group-required' style="margin-top: 6px">{{$user->name}}</div>
</div>
</div>
<div class="form-group">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="ShortDescription">Age</label></div>

</div>
<div class="col-md-8">
   <div class='input-group input-group-required' style="margin-top: 6px">{{$user->age}}</div>

</div>
</div>
<div class="form-group">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="FullDescription">Gender</label></div>
</div>
<div class="col-md-8">

   <div class='input-group input-group-required' style="margin-top: 6px">{{$user->gender}}</div>

</div>
</div>
</div>
<div class="form-group">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="Sku">Nationality</label></div>
</div>
<div class="col-md-8">
   <div class='input-group input-group-required' style="margin-top: 6px">{{$user->nationality}}</div>

</div>
</div>

    <div class="form-group">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="Published">Cast</label></div>
</div>
<div class="col-md-8">
   <div class='input-group input-group-required' style="margin-top: 6px">{{$user->cast}}</div>


                       
</div>
</div>
<div class="form-group">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="ProductTags">Native Language</label></div>
</div>
 
<div class="col-md-8">
    
    <div class='input-group input-group-required' style="margin-top: 6px">{{$user->native_language}}</div>


</div>
 
</div>
    
    <div class="form-group">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="ProductTags">Second Language</label></div>
</div>
 
<div class="col-md-8">
    
    <div class='input-group input-group-required' style="margin-top: 6px">{{$user->native_language}}</div>


</div>
 
</div>


<div class="form-group " >
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="DisplayOrder">Email</label></div>
</div>
<div class="col-md-8">
   
 <div class='input-group input-group-required' style="margin-top: 6px">{{$user->email}}</div>
</div>
</div>

<div class="form-group">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="AllowCustomerReviews">Phone Number</label></div>
</div>
<div class="col-md-8">
   
 <div class='input-group input-group-required' style="margin-top: 6px">{{$user->number}}</div>

</div>
</div>
    
    <div class="form-group ">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="Published">Published</label></div>
</div>
<div class="col-md-8">
    @if ($user->id == 1)
     <label class="btn btn-primary">
   Yes
  </label>
    @else
    <label class="btn btn-danger">
    No
  </label>
    @endif

                       
</div>
</div>
</div>
</div>
    
<div class="panel panel-default " id="group-giftcard">
<div class="panel-heading">
Living Condition
</div>
<div class="panel-body">
    
<div class="form-group">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="IsGiftCard">Religious Affiliation</label></div>
</div>
<div class="col-md-8">
   
 <div class='input-group input-group-required' style="margin-top: 6px">{{$user->relegious_affilation}}</div>

</div>
</div>
    
    <div class="form-group">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="IsGiftCard">Sectarion</label></div>
</div>
<div class="col-md-8">
   
 <div class='input-group input-group-required' style="margin-top: 6px">{{$user->sectarion}}</div>

</div>
</div>
    
    <div class="form-group">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="IsGiftCard">Accept Polygamy</label></div>
</div>
<div class="col-md-8">
    @if ($user->accept_polygamy == 1)
     <label class="btn btn-primary">
   Yes
  </label>
    @else
    <label class="btn btn-danger">
    No
  </label>
    @endif
</div>
</div>
    
     <div class="form-group">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="IsGiftCard">Seeking For</label></div>
</div>
<div class="col-md-8">
   
 <div class='input-group input-group-required' style="margin-top: 6px">{{$user->seeking_for}}</div>

</div>
</div>
    
     <div class="form-group">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="IsGiftCard">Partner Age Limit</label></div>
</div>
<div class="col-md-8">
   
 <div class='input-group input-group-required' style="margin-top: 6px">{{$user->partner_age_limit}}</div>

</div>
</div>
    
     <div class="form-group">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="IsGiftCard">Living Situation</label></div>
</div>
<div class="col-md-8">
   
 <div class='input-group input-group-required' style="margin-top: 6px">{{$user->living_suitation}}</div>

</div>
</div>
    
     <div class="form-group">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="IsGiftCard">Siblings</label></div>
</div>
<div class="col-md-8">
   
 <div class='input-group input-group-required' style="margin-top: 6px">{{$user->siblings}}</div>

</div>
</div>
    
    <div class="form-group">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="IsGiftCard">Diet</label></div>
</div>
<div class="col-md-8">
   
 <div class='input-group input-group-required' style="margin-top: 6px">{{$user->siblings}}</div>

</div>
</div>
    
     <div class="form-group advanced-setting">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="Published">Smoking</label></div>
</div>
<div class="col-md-8">
    @if ($user->smoking == 1)
     <label class="btn btn-primary">
   Yes
  </label>
    @else
    <label class="btn btn-danger">
    No
  </label>
    @endif

                       
</div>
</div>
    
     <div class="form-group advanced-setting">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="Published">Drinking</label></div>
</div>
<div class="col-md-8">
    @if ($user->drinking == 1)
     <label class="btn btn-primary">
   Yes
  </label>
    @else
    <label class="btn btn-danger">
    No
  </label>
    @endif

                       
</div>
</div>

 <div class="form-group advanced-setting">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="Published">Willing to Relocate</label></div>
</div>
<div class="col-md-8">
    @if ($user->willing_to_relocate == 1)
     <label class="btn btn-primary">
   Yes
  </label>
    @else
    <label class="btn btn-danger">
    No
  </label>
    @endif

                       
</div>
</div>
    
    
</div>
</div>

</div>
   </div>
    
    <div class="col-md-5">
<div class="panel-group">


<div class="panel panel-default no-margin" id="group-inventory">
<div class="panel-heading">
Professional Information
</div>
<div class="panel-body">

<div class="form-group" id="pnlStockQuantity">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="StockQuantity">Hafiz Quran</label></div>
</div>
<div class="col-md-8">
 @if ($user->hafiz_quran == 1)
     <label class="btn btn-primary">
   Yes
  </label>
    @else
    <label class="btn btn-danger">
    No
  </label>
    @endif</div>
</div>


    <div class="form-group" id="pnlStockQuantity">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="StockQuantity">Education</label></div>
</div>
<div class="col-md-8">
 <div class='input-group input-group-required' style="margin-top: 6px">{{$user->education}}</div>

</div>
    </div>
    
    <div class="form-group" id="pnlStockQuantity">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="StockQuantity">Profession</label></div>
</div>
<div class="col-md-8">
 <div class='input-group input-group-required' style="margin-top: 6px">{{$user->profession}}</div>

</div>
    </div>
    
    <div class="form-group" id="pnlStockQuantity">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="StockQuantity">Income </label></div>
</div>
<div class="col-md-8">
 <div class='input-group input-group-required' style="margin-top: 6px">{{$user->income}}</div>

</div>
    </div>
        
</div>
</div>
    <br><br>
    
    <div class="panel panel-default">
<div class="panel-heading">
Apperance
</div>
<div class="panel-body">
   
<div class="form-group" id="pnlStockQuantity">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="StockQuantity">Height</label></div>
</div>
<div class="col-md-8">
 <div class='input-group input-group-required' style="margin-top: 6px">{{$user->height}}"</div>

</div>
    </div>
    
    <div class="form-group" id="pnlStockQuantity">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="StockQuantity">Weight </label></div>
</div>
<div class="col-md-8">
 <div class='input-group input-group-required' style="margin-top: 6px">{{$user->weight}} kg</div>

</div>
    </div>
    
    <div class="form-group" id="pnlStockQuantity">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="StockQuantity">Body Type </label></div>
</div>
<div class="col-md-8">
 <div class='input-group input-group-required' style="margin-top: 6px">{{$user->body_type}}</div>

</div>
    </div>
    
    <div class="form-group" id="pnlStockQuantity">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="StockQuantity">Disabilities </label></div>
</div>
<div class="col-md-8">
 <div class='input-group input-group-required' style="margin-top: 6px">{{$user->disabilities}}</div>

</div>
    </div>
    
    <div class="form-group" id="pnlStockQuantity">
<div class="col-md-4">
<div class="label-wrapper"><label class="control-label" for="StockQuantity">Complexion</label></div>
</div>
<div class="col-md-8">
 <div class='input-group input-group-required' style="margin-top: 6px">{{$user->complexion}}</div>

</div>
    </div>
    

</div>
</div>

 



</div>
</div>
    
    
</div></div>
   
                
   <div class="tab-pane" id="tab-pictures">
<div class="panel-group">
<div class="panel panel-default">
    <div class="panel-heading">
Pictures
</div>
<div class="panel-body">
    <div class="form-group">
    
    </div>
    

</div>
</div>
</div>
   
   </div>
            <div class="tab-pane" id="tab-product-attributes">
<div class="panel-group">
<div class="panel panel-default">
    <div class="panel-heading">
Payment
</div>
<div class="panel-body">
    <div class="form-group">
    
    </div>
    

</div>
</div>

</div></div>
            
             <div class="tab-pane" id="tab-product-reviews">
<div class="panel-group">
<div class="panel panel-default">
    <div class="panel-heading">
Contribution
</div>
<div class="panel-body">
    <div class="form-group">
    
    </div>
    

</div>
</div>

</div></div>
         </div>
    </div>
    </div>
                         

    
</div>
       
   
  
@stop

@section('javascript')
 
@stop
