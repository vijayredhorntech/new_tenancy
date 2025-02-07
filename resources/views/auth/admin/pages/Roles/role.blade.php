
@extends('auth.admin.layout.header')
@section('title')
  Role
@stop

@section('content')

<div class="show_table_details">
      <div class="button_area">
          <span >Roles with their permissions</span>
          <a href="{{route('superadmin_rolecreate')}}" >
              <button type="button" class="btn btn-success"><i class="bi bi-plus" style="font-size:20px;color:#fff" ></i> Add Role</button>
          </a>
      </div>
    <div style="width: 100%; padding: 10px 0px">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    </div>


    <div class="page-content">
        <div class="row">
              <div class="col-md-8 col-12">
                  <div class="button_area" style="padding: 0px">
                      <span>Roles</span>
                  </div>
                  <table class="custom_table">
                      <thead>
                      <tr>
                          <th scope="col">Sr. No</th>
                          <th scope="col">Role Name</th>
                          <th scope="col">Role Description</th>
                          <th scope="col">Permissions</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                      </tr>

                      </thead>


                      <tbody >
                      @foreach($users as $user)
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td style="font-weight: 500">{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>
                                  <button class="btn btn-success" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency">4 <i class="fa fa-lock-open" style="font-size: 12px; margin-left: 10px"></i></button>
{{--                                  <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency">0 <i class="fa fa-lock" style="font-size: 12px; margin-left: 10px"></i></button>--}}
                              </td>
                              <td>
                                  <span class="badge rounded-pill text-bg-success">Active </span>
                                  <!-- <span class="badge rounded-pill text-bg-danger">Inactive </span> -->
                              </td>
                              <td>
                                  <div style="display: flex; gap: 5px">
                                      <button class="btn btn-info" style="color: white; padding: 0px 10px; border-radius: 3px" title="Edit Agency"><i class="fa fa-pen" style="font-size: 12px"></i></button>
                                      <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="Delete Agency"><i class="fa fa-trash" style="font-size: 12px"></i></button>

                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td style="font-weight: 500">{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>
                                  <button class="btn btn-success" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency">4 <i class="fa fa-lock-open" style="font-size: 12px; margin-left: 10px"></i></button>
                                  {{--                                  <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency">0 <i class="fa fa-lock" style="font-size: 12px; margin-left: 10px"></i></button>--}}
                              </td>
                              <td>
                                  <span class="badge rounded-pill text-bg-success">Active </span>
                                  <!-- <span class="badge rounded-pill text-bg-danger">Inactive </span> -->
                              </td>
                              <td>
                                  <div style="display: flex; gap: 5px">
                                      <button class="btn btn-info" style="color: white; padding: 0px 10px; border-radius: 3px" title="Edit Agency"><i class="fa fa-pen" style="font-size: 12px"></i></button>
                                      <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="Delete Agency"><i class="fa fa-trash" style="font-size: 12px"></i></button>

                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td style="font-weight: 500">{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>
                                  <button class="btn btn-success" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency">4 <i class="fa fa-lock-open" style="font-size: 12px; margin-left: 10px"></i></button>
                                  {{--                                  <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency">0 <i class="fa fa-lock" style="font-size: 12px; margin-left: 10px"></i></button>--}}
                              </td>
                              <td>
                                  <span class="badge rounded-pill text-bg-success">Active </span>
                                  <!-- <span class="badge rounded-pill text-bg-danger">Inactive </span> -->
                              </td>
                              <td>
                                  <div style="display: flex; gap: 5px">
                                      <button class="btn btn-info" style="color: white; padding: 0px 10px; border-radius: 3px" title="Edit Agency"><i class="fa fa-pen" style="font-size: 12px"></i></button>
                                      <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="Delete Agency"><i class="fa fa-trash" style="font-size: 12px"></i></button>

                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td style="font-weight: 500">{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>
                                  <button class="btn btn-success" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency">4 <i class="fa fa-lock-open" style="font-size: 12px; margin-left: 10px"></i></button>
                                  {{--                                  <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency">0 <i class="fa fa-lock" style="font-size: 12px; margin-left: 10px"></i></button>--}}
                              </td>
                              <td>
                                  <span class="badge rounded-pill text-bg-success">Active </span>
                                  <!-- <span class="badge rounded-pill text-bg-danger">Inactive </span> -->
                              </td>
                              <td>
                                  <div style="display: flex; gap: 5px">
                                      <button class="btn btn-info" style="color: white; padding: 0px 10px; border-radius: 3px" title="Edit Agency"><i class="fa fa-pen" style="font-size: 12px"></i></button>
                                      <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="Delete Agency"><i class="fa fa-trash" style="font-size: 12px"></i></button>

                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td style="font-weight: 500">{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>
                                  <button class="btn btn-success" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency">4 <i class="fa fa-lock-open" style="font-size: 12px; margin-left: 10px"></i></button>
                                  {{--                                  <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency">0 <i class="fa fa-lock" style="font-size: 12px; margin-left: 10px"></i></button>--}}
                              </td>
                              <td>
                                  <span class="badge rounded-pill text-bg-success">Active </span>
                                  <!-- <span class="badge rounded-pill text-bg-danger">Inactive </span> -->
                              </td>
                              <td>
                                  <div style="display: flex; gap: 5px">
                                      <button class="btn btn-info" style="color: white; padding: 0px 10px; border-radius: 3px" title="Edit Agency"><i class="fa fa-pen" style="font-size: 12px"></i></button>
                                      <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="Delete Agency"><i class="fa fa-trash" style="font-size: 12px"></i></button>

                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td style="font-weight: 500">{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>
                                  <button class="btn btn-success" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency">4 <i class="fa fa-lock-open" style="font-size: 12px; margin-left: 10px"></i></button>
                                  {{--                                  <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency">0 <i class="fa fa-lock" style="font-size: 12px; margin-left: 10px"></i></button>--}}
                              </td>
                              <td>
                                  <span class="badge rounded-pill text-bg-success">Active </span>
                                  <!-- <span class="badge rounded-pill text-bg-danger">Inactive </span> -->
                              </td>
                              <td>
                                  <div style="display: flex; gap: 5px">
                                      <button class="btn btn-info" style="color: white; padding: 0px 10px; border-radius: 3px" title="Edit Agency"><i class="fa fa-pen" style="font-size: 12px"></i></button>
                                      <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="Delete Agency"><i class="fa fa-trash" style="font-size: 12px"></i></button>

                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td style="font-weight: 500">{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>
                                  <button class="btn btn-success" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency">4 <i class="fa fa-lock-open" style="font-size: 12px; margin-left: 10px"></i></button>
                                  {{--                                  <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency">0 <i class="fa fa-lock" style="font-size: 12px; margin-left: 10px"></i></button>--}}
                              </td>
                              <td>
                                  <span class="badge rounded-pill text-bg-success">Active </span>
                                  <!-- <span class="badge rounded-pill text-bg-danger">Inactive </span> -->
                              </td>
                              <td>
                                  <div style="display: flex; gap: 5px">
                                      <button class="btn btn-info" style="color: white; padding: 0px 10px; border-radius: 3px" title="Edit Agency"><i class="fa fa-pen" style="font-size: 12px"></i></button>
                                      <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="Delete Agency"><i class="fa fa-trash" style="font-size: 12px"></i></button>

                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td style="font-weight: 500">{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>
                                  <button class="btn btn-success" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency">4 <i class="fa fa-lock-open" style="font-size: 12px; margin-left: 10px"></i></button>
                                  {{--                                  <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency">0 <i class="fa fa-lock" style="font-size: 12px; margin-left: 10px"></i></button>--}}
                              </td>
                              <td>
                                  <span class="badge rounded-pill text-bg-success">Active </span>
                                  <!-- <span class="badge rounded-pill text-bg-danger">Inactive </span> -->
                              </td>
                              <td>
                                  <div style="display: flex; gap: 5px">
                                      <button class="btn btn-info" style="color: white; padding: 0px 10px; border-radius: 3px" title="Edit Agency"><i class="fa fa-pen" style="font-size: 12px"></i></button>
                                      <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="Delete Agency"><i class="fa fa-trash" style="font-size: 12px"></i></button>

                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td style="font-weight: 500">{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>
                                  <button class="btn btn-success" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency">4 <i class="fa fa-lock-open" style="font-size: 12px; margin-left: 10px"></i></button>
                                  {{--                                  <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency">0 <i class="fa fa-lock" style="font-size: 12px; margin-left: 10px"></i></button>--}}
                              </td>
                              <td>
                                  <span class="badge rounded-pill text-bg-success">Active </span>
                                  <!-- <span class="badge rounded-pill text-bg-danger">Inactive </span> -->
                              </td>
                              <td>
                                  <div style="display: flex; gap: 5px">
                                      <button class="btn btn-info" style="color: white; padding: 0px 10px; border-radius: 3px" title="Edit Agency"><i class="fa fa-pen" style="font-size: 12px"></i></button>
                                      <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="Delete Agency"><i class="fa fa-trash" style="font-size: 12px"></i></button>

                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td style="font-weight: 500">{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>
                                  <button class="btn btn-success" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency">4 <i class="fa fa-lock-open" style="font-size: 12px; margin-left: 10px"></i></button>
                                  {{--                                  <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency">0 <i class="fa fa-lock" style="font-size: 12px; margin-left: 10px"></i></button>--}}
                              </td>
                              <td>
                                  <span class="badge rounded-pill text-bg-success">Active </span>
                                  <!-- <span class="badge rounded-pill text-bg-danger">Inactive </span> -->
                              </td>
                              <td>
                                  <div style="display: flex; gap: 5px">
                                      <button class="btn btn-info" style="color: white; padding: 0px 10px; border-radius: 3px" title="Edit Agency"><i class="fa fa-pen" style="font-size: 12px"></i></button>
                                      <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="Delete Agency"><i class="fa fa-trash" style="font-size: 12px"></i></button>

                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td style="font-weight: 500">{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>
                                  <button class="btn btn-success" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency">4 <i class="fa fa-lock-open" style="font-size: 12px; margin-left: 10px"></i></button>
                                  {{--                                  <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency">0 <i class="fa fa-lock" style="font-size: 12px; margin-left: 10px"></i></button>--}}
                              </td>
                              <td>
                                  <span class="badge rounded-pill text-bg-success">Active </span>
                                  <!-- <span class="badge rounded-pill text-bg-danger">Inactive </span> -->
                              </td>
                              <td>
                                  <div style="display: flex; gap: 5px">
                                      <button class="btn btn-info" style="color: white; padding: 0px 10px; border-radius: 3px" title="Edit Agency"><i class="fa fa-pen" style="font-size: 12px"></i></button>
                                      <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="Delete Agency"><i class="fa fa-trash" style="font-size: 12px"></i></button>

                                  </div>
                              </td>
                          </tr>

                      @endforeach
                      </tbody>
                  </table>
              </div>
            <div class="col-md-4 col-12">
                <div class="button_area" style="padding: 0px">
                    <span>Permissions</span>
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

                    @php
                       $permissions = [
                            [ 'name' => 'Create Users',
                             'status' => 'active'],
                            [ 'name' => 'Edit Users',
                                'status' => 'inactive'],
                                [ 'name' => 'Delete Users',
                                'status' => 'active'],
                                [ 'name' => 'View Users',
                                'status' => 'active'],
                                [ 'name' => 'Create Roles',
                                'status' => 'active'],
]
                    @endphp


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
        </div>





      </div>
</div>
@stop

