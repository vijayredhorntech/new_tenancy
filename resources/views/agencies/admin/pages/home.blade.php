@php
    $route = env('APP_ENV') == 'live' ? config('live_path.admin') : config('path.admin');
 @endphp

@extends('admin.layout.header')
@section('title')
  HSAdmin
@stop

@php 
// $config=config('path.craousal');

$config = env('APP_ENV') == 'live' ? config('live_path.craousal') : config('path.craousal');

@endphp 
@section('content')

<div class="show_table_details">
<div class="card">
  <h5 class="card-header">Welcome to HS Group</h5>
  <div class="card-body">
    <h5 class="card-title">We are with you and waiting for your call</h5>
    <p class="card-text">Welcome to HSGroup, your one-stop destination for online services that cater to both your financial and creative needs.
        Whether you’re looking to file your Income Tax Return (ITR) quickly and securely or design custom T-shirts with your unique style, we’ve got you covered!Our platform offers seamless, user-friendly solutions to help you manage your taxes with ease while exploring your creativity with high-quality, personalized apparel. 
        Experience hassle-free ITR filing and professional T-shirt printing, all in one place, at the click of a button!</p>
        <div class="button_area">    
       <button type="button" class="btn btn-dark action_button" data-bs-toggle="modal" data-bs-target="#add_homecontent">
        <i class="bi bi-plus" style="font-size:20px;color:#fff" ></i> Add Content</button>
      </div> 
  </div>
</div>
</div> 


            



@stop

