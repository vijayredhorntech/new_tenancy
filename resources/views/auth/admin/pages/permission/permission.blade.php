    
@extends('auth.admin.layout.header')
@section('title')
  Permission
@stop

@section('content')

<div class="show_table_details">
      <div class="button_area">
          <span >Permission</span>
          @canany(['permission create', 'manage everything'])
          <a href="{{route('superadmin_permissioncreate')}}" >
              <button type="button" class="btn btn-success"><i class="bi bi-plus" style="font-size:20px;color:#fff" ></i> Add Permission</button>
          </a>
          @endcan
      </div>
        <div style="width: 100%; padding: 10px 0px">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>



      <div class="page-content">
          <table class="custom_table">
              <thead>
              <tr>
                  <th scope="col">Sr. No</th>
                  <th scope="col">Permission Name </th>
                  <th scope="col">Action</th>
              </tr>

              </thead>


              <tbody >
         
              @if(isset($permissions) && $permissions->isNotEmpty())
                 @foreach($permissions as $permission)
                 <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$permission->name}}</td>         
                      <td>
                      <div style="display: flex; gap: 5px">
                            @canany(['permission update', 'manage everything'])
                            <a href="#">
                            <button class="btn btn-info" style="color: white; padding: 0px 10px; border-radius: 3px" title="Edit Agency"><i class="fa fa-pen" style="font-size: 12px"></i></button></a> 
                            @endcan
                            <button class="btn btn-success" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency"><i class="fa fa-eye" style="font-size: 12px"></i></button>
                            @canany(['permission delete', 'manage everything'])
                                <a href="{{ route('superadmin_permissiondelete', ['id' => $permission->id]) }}"> <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="Delete Agency"><i class="fa fa-trash" style="font-size: 12px"></i></button></a>
                            @endcan
                      </div>
                      </td>
                  </tr>
                 @endforeach
           @endif
               
          
              </tbody>
          </table>
 
          <!-- Pagination Links -->
          <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                        Showing {{ $permissions->firstItem() }} to {{ $permissions->lastItem() }} 
                        of {{ $permissions->total() }} results (Page {{ $permissions->currentPage() }} of {{ $permissions->lastPage() }})
                    </div>
   
                    <div>
                        {{ $permissions->links() }}
                    </div>
          </div>


      </div>
</div>
@stop

