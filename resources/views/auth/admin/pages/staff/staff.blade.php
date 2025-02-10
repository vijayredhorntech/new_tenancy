
@extends('auth.admin.layout.header')
@section('title')
  Agency
@stop

@section('content')

<div class="show_table_details">
      <div class="button_area">
          <span >Staff</span>
          @canany(['staff create', 'manage all'])
          <a href="{{route('superadmin_staffcreate')}}" >
              <button type="button" class="btn btn-success"><i class="bi bi-plus" style="font-size:20px;color:#fff" ></i> Add Staff</button>
          </a>
          @endcanany 
      </div>
    <div style="width: 100%; padding: 10px 0px">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    </div>

      <div class="page-content">
          <table class="custom_table">
              <thead>
              <tr>
                  <th scope="col">Sr. No</th>
                  <th scope="col">Name </th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Role</th>
                  <th scope="col">Login time</th>
                  <!-- <th scope="col">Agents</th>
                  <th scope="col">Clients</th> -->
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
              </tr>

              </thead>


              <tbody >
              @foreach($users as $user)
                  <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->phone}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->phone}}</td>
                      <td>
                          <span class="badge rounded-pill text-bg-success">Active </span>
                          <!-- <span class="badge rounded-pill text-bg-danger">Inactive </span> -->
                      </td>
                      <td>
                      <div style="display: flex; gap: 5px">
                          @canany(['staff update', 'manage all'])
                          <button class="btn btn-info" style="color: white; padding: 0px 10px; border-radius: 3px" title="Edit Agency"><i class="fa fa-pen" style="font-size: 12px"></i></button>
                          @endcanany
                          @canany(['view staffdetails', 'manage all'])
                          <a href="{{route('superadmin_staffDetails')}}" class="btn btn-success" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency"><i class="fa fa-eye" style="font-size: 12px"></i></a>
                          @endcanany
                          @canany(['staff delete', 'manage all'])
                          <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="Delete Agency"><i class="fa fa-trash" style="font-size: 12px"></i></button>
                          @endcanany    
                      </div>
                      </td>
                  </tr>
              @endforeach
              </tbody>
          </table>

      </div>
</div>
@stop

