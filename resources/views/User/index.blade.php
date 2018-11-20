@extends('layouts.master')

@section('title')
All Users - Azwaj
@stop

@section('breadcrumb')
 <div class="navbar-header">
            <button class="hamburger btn-link">
                <span class="hamburger-inner"></span>
            </button>
                        <ol class="breadcrumb hidden-xs">
                                    <li class="active">
                        <a href="{{route('home')}}"><i class="voyager-boat"></i> Dashboard</a>
                    </li>
                                                                                                                                                
                                                    <li>Users</li>
                        
                                                </ol>                                                                   </ol>
                    </div>
@stop

@section('page_header')
                    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-person"></i> Users
        </h1>
                    <!--a href="" class="btn btn-success btn-add-new">
                <i class="voyager-plus"></i> <span>Add New</span>
            </a-->
                 



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
                                             <th>
                            Avatar
                            </th>
                                            <th>
                            User Name </th>
                                            <th>
                            Age </th>
                                            <th>
                            Score </th>
                                            <th>
                            Location </th>
                            <th>
                             Premium 
                            </th>
                             <th>
                            Featured 
                            </th>
                           
                            
                            <th>
                            Status
                            </th>
                            <th>
                            Last Active
                            </th>
                            <th class="actions text-right">Actions</th>
                            </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($allUsers as $user)
                                 <tr><td>
                                  <input type="checkbox" name="row_id" id="checkbox_2" value="2">
                               </td>
                               <td>
                      <img src="{{asset('images/default.png')}}" style="width:100px">
                       </td>
                               
                       <td>
                           {{$user->username}}
                       </td>
                       <td>
                           {{$user->age}}
                       </td>
                       <td>
                           <b> {{$user->score}}</b>
                       </td>
                       <td>
                           {{$user->nearest_location}}, {{$user->city->title}}
                       </td>
                      
                            @if($user->premium_member == true)
                       <td ><span class="grid-report-item  blue">Yes</span></td>
                       @else
                        <td ><span class="grid-report-item  orange">No</span></td>
                       @endif
                       
                       @if($user->featured_member == true)
                       <td ><span class="grid-report-item  blue">Yes</span></td>
                       @else
                        <td ><span class="grid-report-item  orange">No</span></td>
                       @endif
                      
                      
                       @if($user->status == true)
                       <td ><span class="grid-report-item  green">Active</span></td>
                       @else
                        <td ><span class="grid-report-item  red">In Active</span></td>
                       @endif
                       <td>
                           {{$user->updated_at}}
                       </td>
                       <td class="no-sort no-click" id="bread-actions">
                           <a href="javascript:;" title="Delete" class="btn btn-sm btn-danger pull-right delete" data-id="{{$user->id}}" id="delete-{{$user->id}}">
            <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Delete</span>
            <!--a href="" title="Edit" class="btn btn-sm btn-primary pull-right edit">
            <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm">Edit</span>
        </a-->
            <a href="{{route('users.detail',['id'=>$user->id])}}" title="View" class="btn btn-sm btn-warning pull-right view">
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
                    <h4 class="modal-title"><i class="voyager-trash"></i> Are you sure you want to delete this user?</h4>
                </div>
                <div class="modal-footer">
                    <form action="#" id="delete_form" method="GET">
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
            $('#delete_form')[0].action = {!! json_encode(url("/User/Delete/__id")) !!}.replace('__id', $(this).data('id'));
            $('#delete_modal').modal('show');
        });
        
       
        
    </script>

    

@stop
