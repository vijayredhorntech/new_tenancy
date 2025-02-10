
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
    </div>


    <div class="page-content" style="background-color: transparent; margin-top: 5px">
        <div class="row">
              <div class="col-md-12 col-12" style="padding: 0px; padding-right: 10px; padding-bottom: 10px">
                  <div style="background-color: white; padding: 10px; border-radius: 5px; overflow-x: auto" >
                      <div class="button_area" style="padding: 0px; padding-bottom: 5px">
                          <span >Roles</span>
                         @canany(['role create', 'manage everything'])   
                          <a href="{{route('superadmin_rolecreate')}}" >
                              <button type="button" class="btn btn-success" style="padding: 2px 5px"><i class="bi bi-plus" style="font-size:20px;color:#fff" ></i> Add Role</button>
                          </a>
                        @endcanany 
                      </div>
                      <table class="custom_table">
                          <thead>
                          <tr>
                              <th scope="col">Sr. No</th>
                              <th scope="col">Role Name</th>
                              <!-- <th scope="col">Role Description</th> -->
                              <th scope="col">Permissions</th>
                              <th scope="col">Status</th>
                              <th scope="col">Action</th>
                          </tr>

                          </thead>


                          <tbody >
                          @foreach($roles as $role)
                              <tr>
                                  <td>{{$loop->iteration}}</td>
                                  <td style="font-weight: 500">{{$role->name}}</td>
                                  <td>
                                      <button class="btn btn-success" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency">{{$role->permissions->count()}}  <i class="fa fa-lock-open" style="font-size: 12px; margin-left: 10px"></i></button>
                                      
                                    </td>
                                  <td>
                                      <span class="badge rounded-pill text-bg-success">Active </span>
                                      <!-- <span class="badge rounded-pill text-bg-danger">Inactive </span> -->
                                  </td>
                                  <td>
                                      <div style="display: flex; gap: 5px">
                                    @canany(['role update', 'manage everything'])  
                                        <a href="#">  <button class="btn btn-info" style="color: white; padding: 0px 10px; border-radius: 3px" title="Edit Agency"><i class="fa fa-pen" style="font-size: 12px"></i></button></a>
                                     @endcanany 
                                    @canany(['role delete', 'manage everything'])  
                                        <a href="{{ route('superadmin_roledelete', ['id' => $role->id]) }}">  <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="Delete Agency"><i class="fa fa-trash" style="font-size: 12px"></i></button></a>
                                    @endcanany  
                                    @canany(['assign permission', 'manage everything'])  
                                        <a href="{{ route('superadmin_permissionassign', ['id' => $role->id]) }}"> <button class="btn btn-success" style="color: white; padding: 0px 10px; border-radius: 3px" title="Add Permission"><i class="fa fa-lock-open" style="font-size: 12px"></i></button>
                                         </a>
                                    @endcanany   
                                        </div>
                                  </td>
                              </tr>
                          @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
            <!-- <div class="col-md-4 col-12" style="padding: 0px">
                <div style="background-color: white; padding: 10px; border-radius: 5px">
                    <div class="button_area" style="padding: 0px; padding-bottom: 5px">
                        <span >Permissions</span>
                        <a href="{{route('superadmin_rolecreate')}}" >
                            <button type="button" class="btn btn-success" style="padding: 2px 5px"><i class="bi bi-plus" style="font-size:20px;color:#fff" ></i> Add Permission</button>
                        </a>
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
                                    <span style="font-weight: 500">{{$permission['name']}}</span>
                                </td>
                                <td>

                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" {{$permission['status']==='active'?'checked':''}}>
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
            </div> -->
        </div>
      </div>
</div>
@stop

