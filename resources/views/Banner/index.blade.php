@extends('layouts.master')

@section('title')
Banners - Azwaj
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
                                                                                                                                                
                                                    <li>Banners</li>
                        
                                                </ol>                                                                   </ol>
                    </div>
@stop

@section('page_header')
                    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-images"></i> Banners
        </h1>
                    <a href="{{route('banner.add')}}" class="btn btn-success btn-add-new">
                <i class="voyager-plus"></i> <span>Add New</span>
            </a>
                         <a class="btn btn-danger" id="bulk_delete_btn"><i class="voyager-trash"></i> <span>Bulk Delete</span></a>


<div class="modal modal-danger fade" tabindex="-1" id="bulk_delete_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <i class="voyager-trash"></i> Are you sure you want to delete <span id="bulk_delete_count"></span> <span id="bulk_delete_display_name"></span>?
                </h4>
            </div>
            <div class="modal-body" id="bulk_delete_modal_body">
            </div>
            <div class="modal-footer">
                <form action="{{route('banner.bulkDelete')}}" id="bulk_delete_form" method="POST">
                   
                     {{ csrf_field() }}
                    <input type="hidden" name="ids" id="bulk_delete_input" value="">
                    <input type="submit" class="btn btn-danger pull-right delete-confirm"
                             value="Yes, Delete These categories">
                </form>
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">
                    Cancel
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
                 
<script>
window.onload = function () {
    // Bulk delete selectors
    var $bulkDeleteBtn = $('#bulk_delete_btn');
    var $bulkDeleteModal = $('#bulk_delete_modal');
    var $bulkDeleteCount = $('#bulk_delete_count');
    var $bulkDeleteDisplayName = $('#bulk_delete_display_name');
    var $bulkDeleteInput = $('#bulk_delete_input');
    // Reposition modal to prevent z-index issues
    $bulkDeleteModal.appendTo('body');
    // Bulk delete listener
    $bulkDeleteBtn.click(function () {
        var ids = [];
        var $checkedBoxes = $('#dataTable input[type=checkbox]:checked').not('.select_all');
        var count = $checkedBoxes.length;
        if (count) {
            // Reset input value
            $bulkDeleteInput.val('');
            // Deletion info
            var displayName = count > 1 ? 'Categories' : 'Category';
            displayName = displayName.toLowerCase();
            $bulkDeleteCount.html(count);
            $bulkDeleteDisplayName.html(displayName);
            // Gather IDs
            $.each($checkedBoxes, function () {
                var value = $(this).val();
                ids.push(value);
            })
            // Set input value
            $bulkDeleteInput.val(ids);
            // Show modal
            $bulkDeleteModal.modal('show');
        } else {
            // No row selected
            toastr.warning('You haven&#039;t selected anything to delete');
        }
    });
}
</script>


 </div>
@stop

@section('content')
                    <div class="page-content browse container-fluid">
    
        <div class="alerts">
            
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                                                <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                   <th>
                                                <input type="checkbox" class="select_all">
                                            </th>
                                          
                                            <th style="max-width: 100px">
                            Title </th>
                            <th>
                            Banner
                            </th>
                          
                             <th>
                            Status
                            </th>
                            <th>
                            Page
                            </th>
                            
                            <th>
                            Created At
                            </th>
                            
                           
                            <th class="actions text-right">Actions</th>
                            </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($allBanners as $banner)
                                 <tr><td>
                                  <input type="checkbox" name="row_id" id="checkbox_{{$banner->id}}" value="{{$banner->id}}">
                               </td>
                              
                               
                       <td style="max-width: 200px">
                           {{$banner->title}}
                       </td>
                      
                       <td>
                      <img src="{{asset('upload'.$banner->img_url)}}" style="width:100px;height: 70px">
                       </td>
                       
                      
                       @if($banner->status == true)
                       <td ><span class="grid-report-item  green">Published</span></td>
                       @else
                        <td ><span class="grid-report-item  red">Un Published</span></td>
                       @endif
                       
                       <td>
                           {{$banner->bannerPage->title}}
                       </td>
                       
                       <td>
                           {{$banner->created_at}}
                       </td>
                       
                       
                      
                       <td class="no-sort no-click" id="bread-actions">
                           <a href="javascript:;" title="Delete" class="btn btn-sm btn-danger pull-right delete"data-id="{{$banner->id}}" id="delete-{{$banner->id}}">
            <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Delete</span>
            <a href="{{route('banner.edit',['id'=>$banner->id])}}" title="Edit" class="btn btn-sm btn-primary pull-right edit">
            <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm">Edit</span>
        </a>
            <a href="{{route('banner.detail',['id'=>$banner->id])}}" title="View" class="btn btn-sm btn-warning pull-right view">
            <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm">View</span>
        </a>
                           </td>
                                    </tr>
                                    @endforeach
                           </tbody>
                            </table>
                        </div>
                    </div>
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
        $(document).ready(function () {
                            var table = $('#dataTable').DataTable({"order":[],"language":{"sEmptyTable":"No data available in table","sInfo":"Showing _START_ to _END_ of _TOTAL_ entries","sInfoEmpty":"Showing 0 to 0 of 0 entries","sInfoFiltered":"(filtered from _MAX_ total entries)","sInfoPostFix":"","sInfoThousands":",","sLengthMenu":"Show _MENU_ entries","sLoadingRecords":"Loading...","sProcessing":"Processing...","sSearch":"Search:","sZeroRecords":"No matching records found","oPaginate":{"sFirst":"First","sLast":"Last","sNext":"Next","sPrevious":"Previous"},"oAria":{"sSortAscending":": activate to sort column ascending","sSortDescending":": activate to sort column descending"}},"columnDefs":[{"targets":-1,"searchable":false,"orderable":false}]});
            
                        $('.select_all').on('click', function(e) {
                $('input[name="row_id"]').prop('checked', $(this).prop('checked'));
            });
        });


        var deleteFormAction;
        $('td').on('click', '.delete', function (e) {
            $('#delete_form')[0].action = {!! json_encode(url("/Banner/Delete/__id")) !!}.replace('__id', $(this).data('id'));
            $('#delete_modal').modal('show');
        });
        
        $('.select_all').on('click', function(e) {
                $('input[name="row_id"]').prop('checked', $(this).prop('checked'));
            });
        
        
    </script>

    

@stop

