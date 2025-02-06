@php
    $route = env('APP_ENV') == 'live' ? config('live_path.admin') : config('path.admin');
 @endphp

@extends('admin.layout.header')
@section('title')
  HSAdmin
@stop

@section('content')

<div class="show_table_details">
<div class="button_area">    
    <input type="date" class="from-control "> <button type="button" class="btn btn-secondary">search</button>      
    <button type="button" class="btn btn-dark action_button" data-bs-toggle="modal" data-bs-target="#add_request"><i class="bi bi-plus" style="font-size:20px;color:#fff" ></i> Add Request</button>
</div> 

<table class="table ">
    <thead class="table-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name </th>
        <th scope="col">Person</th>
        <th scope="col">Date</th>
        <th scope="col">Price</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Utam Chef </td>
        <td>2</td>
        <td>10/12/2024</td>
        <td>650</td>
        <td>  <span class="badge rounded-pill text-bg-danger">Pending</span></td> 
        <td> <i class="bi bi-pencil-square" style="font-size:26px"></i> 
            <i class="bi bi-eye-fill" style="font-size:26px"></i>
            <i class="bi bi-trash" style="font-size:26px;color:#ff0000"></i></td> 

      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Utam Chef </td>
        <td>2</td>
        <td>10/12/2024</td>
        <td>650</td>
        <td>  <span class="badge rounded-pill text-bg-success">Paid</span></td> 
        <td> <i class="bi bi-pencil-square" style="font-size:26px"></i>
            <i class="bi bi-eye-fill" style="font-size:26px"></i>
             <i class="bi bi-trash" style="font-size:26px;color:#ff0000"></i></td> 

      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Utam Chef </td>
        <td>2</td>
        <td>10/12/2024</td>
        <td>650</td>
        <td>  <span class="badge rounded-pill text-bg-warning">Process</span></td>
        <td> <i class="bi bi-pencil-square" style="font-size:26px"></i> 
            <i class="bi bi-eye-fill" style="font-size:26px"></i>
            <i class="bi bi-trash" style="font-size:26px;color:#ff0000"></i></td> 

      </tr>
    </tbody>
  </table>
</div> 



@stop

