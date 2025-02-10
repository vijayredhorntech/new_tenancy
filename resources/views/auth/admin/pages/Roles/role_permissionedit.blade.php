
@extends('auth.admin.layout.header')
@section('title')
  Role
@stop

@section('content')

<div class="show_table_details">
      <div class="button_area">
          <span >Roles with their permissions</span>
      </div>
    <div style="width: 100%; padding: 10px 0px">
           @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))

             <div class="alert alert-danger">
                 {{ session('error') }}
             </div>
         @endif
    </div>

    <form action="{{ route('superadmin_assignpermission') }}" method="POST" enctype="multipart/form-data">
            @csrf

           
    <div class="page-content" style="background-color: transparent; margin-top: 5px">
        <div class="row">
 
              <div class="col-md-8 col-12" style="padding: 0px; padding-right: 10px; padding-bottom: 10px">
                  <div style="background-color: white; padding: 10px; border-radius: 5px; overflow-x: auto" >
                      <div class="button_area" style="padding: 0px; padding-bottom: 5px">
                          <span >Roles</span>
                           </div>
                      <table class="custom_table">
                          <thead>
                          <tr>
                              <th scope="col">Sr. No</th>
                              <th scope="col">Role Name</th>
                              <!-- <th scope="col">Role Description</th> -->
                              <th scope="col">Permissions</th>
                              <th scope="col">Status</th>
                              <!-- <th scope="col">Action</th> -->
                          </tr>

                          </thead>
                          <!-- $role->name -->

                          <tbody >
                       
                              <tr>
                                  <td>1</td>
                                  <td style="font-weight: 500">{{$roles->name}}
                                    <input type="hidden" value="{{$roles->name}}" name="role_name">
                                  </td>

                                  <td>
                                      <button class="btn btn-success" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency">{{$roles->permissions->count()}} <i class="fa fa-lock-open" style="font-size: 12px; margin-left: 10px"></i></button>
                                      {{--                                  <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency">0 <i class="fa fa-lock" style="font-size: 12px; margin-left: 10px"></i></button>--}}
                                  </td>
                                  <td>
                                      <span class="badge rounded-pill text-bg-success">Active </span>
                                      <!-- <span class="badge rounded-pill text-bg-danger">Inactive </span> -->
                                  </td>
                                
                              </tr>
                   
                          </tbody>
                      </table>
                  </div>
              </div>
            <div class="col-md-4 col-12" style="padding: 0px">
                <div style="background-color: white; padding: 10px; border-radius: 5px">
                    <div class="button_area" style="padding: 0px; padding-bottom: 5px">
                        <span >Permissions</span>
                 
                    </div>

                    <table class="custom_table">
                        <thead>
                        <tr>
                            <th scope="col">Permissions</th>
                            <th scope="col">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody >
                        @forelse ($permissions as $permission)
                                <tr>
                                    <td>
                                        <span style="font-weight: 500">{{$permission->name}}</span>
                                    
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" 
                                                id="flexSwitchCheckChecked{{$permission->name}}" 
                                                name="permissions[]" 
                                                value="{{ $permission->name }}" 
                                                {{ $roles->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">No Permissions</td>
                                </tr>
                             @endforelse

                        </tbody>
                    </table>
                  
                </div>
            </div>
        </div>
      </div>

      <div class="page-content">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-5">Assign Permission</button>
                        </div>
                    </div>

                </div>
            </div>


</div>

</form>
@stop

