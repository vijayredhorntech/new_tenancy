    
@extends('auth.admin.layout.header')
@section('title')
  Agency
@stop

@section('content')

<div class="show_table_details">
      <div class="button_area">
          <span >Service</span>
          <a href="{{route('superadmin_servicecreate')}}" >
              <button type="button" class="btn btn-success"><i class="bi bi-plus" style="font-size:20px;color:#fff" ></i> Add Serice</button>
          </a>
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
                  <th scope="col">Service Name </th>
                  <th scope="col">Icone</th>
                  <th scope="col">Description</th>
                  <th scope="col">Action</th>
              </tr>

              </thead>


              <tbody >
         
              @if(isset($services) && $services->isNotEmpty())
                 @foreach($services as $service)
                 <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$service->name}}</td>
                      <td>{!! $service->icon !!}</td>
                      <td>{{$service->description}}</td>              
                      <td>
                      <div style="display: flex; gap: 5px">
                          <a href="{{ route('superadmin_serviceupdate', ['id' => $service->id]) }}">
                            <button class="btn btn-info" style="color: white; padding: 0px 10px; border-radius: 3px" title="Edit Agency"><i class="fa fa-pen" style="font-size: 12px"></i></button></a> 
                          <button class="btn btn-success" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency"><i class="fa fa-eye" style="font-size: 12px"></i></button>
                          <a href="{{ route('superadmin_servicedelete', ['id' => $service->id]) }}"> <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="Delete Agency"><i class="fa fa-trash" style="font-size: 12px"></i></button></a>

                      </div>
                      </td>
                  </tr>
                 @endforeach
                             
                    @endif
               
          
              </tbody>
          </table>

      </div>
</div>
@stop

