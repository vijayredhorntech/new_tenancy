
@extends('auth.admin.layout.header')
@section('title')
  Agency
@stop

@section('content')


<div class="show_table_details">
      <div class="button_area">
          <span >Agencies</span>
          @canany(['agency create', 'manage everything'])
          <a href="{{route('create_agency')}}" >
              <button type="button" class="btn btn-success"><i class="bi bi-plus" style="font-size:20px;color:#fff" ></i> Add Agency</button>
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
                  <th scope="col">Contact Person</th>
                  <th scope="col">Domain</th>
                  <th scope="col">Total Service</th>
                  <th scope="col">Total Balance</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
              </tr>

              </thead>


              <tbody >
              @foreach($agencies as $agence)
                  <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$agence->name}}</td>
                      <td>{{$agence->email}}</td>
                      <td>{{$agence->phone}}</td>
                      <td>
                      <div style="display: flex; flex-direction: column">
                        <span>{{ $agence->contact_person ?? 'N/A' }}</span>
                        <span>{{ $agence->phone ?? 'N/A' }}</span>
                    </div>
                                    
                        </td>
                                
                      <td>
                            {{$agence->domains->full_url}}
                        </td>
                      <td>{{ $agence->userAssignments ? $agence->userAssignments->count() : 0 }}
                                 </td>
                      <td>
                         {{ $agence->balance ? '£ ' . $agence->balance->balance : '0' }}


                      </td>
                      <td>
                          <span class="badge rounded-pill text-bg-success">Active </span>
                          <!-- <span class="badge rounded-pill text-bg-danger">Inactive </span> -->
                      </td>
                      <td>
                      <div style="display: flex; gap: 5px">
                        @canany(['agency update', 'manage everything'])
                            <a href="{{route('agencies.edit',['id' => $agence->id])}}"> <button class="btn btn-info" style="color: white; padding: 0px 10px; border-radius: 3px" title="Edit Agency"><i class="fa fa-pen" style="font-size: 12px"></i></button> </a>
                        @endcanany 
                        <button class="btn btn-success" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency"><i class="fa fa-eye" style="font-size: 12px"></i></button>
                        @canany(['agency delete', 'manage everything'])
                       <a href="{{ route('agencies.delete', ['id' => $agence->id]) }}">
                         <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="Delete Agency"><i class="fa fa-trash" style="font-size: 12px"></i></button>
                      </a>
                       @endcanany 

                       <a href="{{ route('agencies.fund', ['id' => $agence->id]) }}">
                         <button class="btn btn-primary" style="color: white; padding: 0px 10px; border-radius: 3px" title="Add Fund Agency"><i class="fas fa-money-bill-wave" style="font-size: 12px"></i></button>
                      </a>


                      </div>
                      </td>
                  </tr>
              @endforeach
              </tbody>
          </table>

      </div>
</div>
@stop

