
@extends('auth.admin.layout.header')
@section('title')
  Agency
@stop

@section('content')

<div class="show_table_details">
      <div class="button_area"> 
      <a href="{{route('create_agency')}}" >   <button type="button" class="btn btn-dark action_button">
            <i class="bi bi-plus" style="font-size:20px;color:#fff" ></i> Add Service</button> </a>
      </div> 

        <table class="table ">
                <thead class="table-dark">
                  <tr>
                    {{-- <th scope="col">Id</th> --}}
                    <th scope="col">Name </th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact Person</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Domain</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>

                </thead>
          
          
                <tbody >
                @foreach($agencies as $agence)
                  <tr>  
                    <td>{{$agence->name}}</td>
                    <td>{{$agence->email}}</td>
                    <td>{{$agence->contact_person}}</td>
                    <td>{{$agence->phone}}</td>
                    <td></td>
                    <td>  
                    <span class="badge rounded-pill text-bg-success">Active </span>
                
                    <!-- <span class="badge rounded-pill text-bg-danger">Inactive </span> -->
                    </td> 
                    <td> <i class="bi bi-pencil-square service_edit" type="button" data-bs-toggle="offcanvas" data-bs-target="#edit_service" aria-controls="offcanvasRight" style="font-size:26px" ></i>
                        <i class="bi bi-eye-fill view_service" style="font-size:26px" ></i>
                        <i class="bi bi-trash delete_service" style="font-size:26px;color:#ff0000" ></i></td> 
                  </tr>
                @endforeach
                </tbody>
         </table>
</div> 






@stop

