
@extends('auth.admin.layout.header')
@section('title')
  Agency
@stop

@section('content')

<div class="show_table_details">
      <div class="button_area">
          <span >Agencies</span>
          <a href="{{route('create_agency')}}" >
              <button type="button" class="btn btn-success"><i class="bi bi-plus" style="font-size:20px;color:#fff" ></i> Add Agency</button>
          </a>
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
                  <th scope="col">Agents</th>
                  <th scope="col">Clients</th>
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
                             <span> {{$agence->contact_person}}</span>
                              <span>{{$agence->phone}}</span>
                          </div>
                      </td>

                      <td>
                            @if($agence->domains->isNotEmpty())
                                @foreach($agence->domains as $domain)
                                    <a href="{{ $domain->full_url }}" target="_blank">
                                    {{ $domain->full_url }}
                                   </a>
                                @endforeach
                            @else
                                No Domain
                            @endif
                        </td>
                      <td>
                          @php
                            $clients = ['10', '20', '30', '40', '50', '60', '70', '80', '90', '100'];
                            echo $clients[array_rand($clients)];
                          @endphp
                      </td>
                      <td>
                          @php
                            $clients = ['10', '20', '30', '40', '50', '60', '70', '80', '90', '100'];
                            echo $clients[array_rand($clients)];
                          @endphp
                      </td>
                      <td>
                          <span class="badge rounded-pill text-bg-success">Active </span>
                          <!-- <span class="badge rounded-pill text-bg-danger">Inactive </span> -->
                      </td>
                      <td>
                      <div style="display: flex; gap: 5px">
                          <button class="btn btn-info" style="color: white; padding: 0px 10px; border-radius: 3px" title="Edit Agency"><i class="fa fa-pen" style="font-size: 12px"></i></button>
                          <button class="btn btn-success" style="color: white; padding: 0px 10px; border-radius: 3px" title="View Agency"><i class="fa fa-eye" style="font-size: 12px"></i></button>
                          <button class="btn btn-danger" style="color: white; padding: 0px 10px; border-radius: 3px" title="Delete Agency"><i class="fa fa-trash" style="font-size: 12px"></i></button>

                      </div>
                      </td>
                  </tr>
              @endforeach
              </tbody>
          </table>

      </div>
</div>
@stop

