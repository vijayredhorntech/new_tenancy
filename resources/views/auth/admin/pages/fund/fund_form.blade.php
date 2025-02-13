@extends('auth.admin.layout.header')
@section('title')
    {{ 'Add Fund' }}
@stop

@section('content')


  
    <div class="show_table_details">
        <div class="button_area">
        <span>Add Fund</span>

        </div>
        <form action="{{route('agencies.fund.store') }}"  method="POST" enctype="multipart/form-data">
            @csrf
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))

             <div class="alert alert-danger">
                 {{ session('error') }}
             </div>
         @endif
            <div class="page-content">
                <div class="row" style="padding: 5px 0px;">
                    <div class="col-12 text-decoration-underline">
                        <span
                            style="font-weight: 500; color: var(--primary) ; font-size: 20px">Agency Detials</span>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="logo" class="form-label" style="font-weight: 500; color: black">Agency Name
                                    </label>
                                    <input type="hidden" name="id" value="{{$agency->id}}">
                                <input type="text" class="form-control" name="agency_name" readonly="" value="{{$agency->name}}">
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="logo" class="form-label" style="font-weight: 500; color: black">Domain Name
                                    </label>
                                <input type="text" class="form-control" name="domain_name" readonly="" value="{{$agency->domains->full_url}}">
                            </div>
                        </div>
    

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="logo" class="form-label" style="font-weight: 500; color: black">Email id
                                    </label>
                                <input type="text" class="form-control" name="emailid" readonly="" value="{{$agency->email}}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="logo" class="form-label" style="font-weight: 500; color: black">Phone Number
                                    </label>
                                <input type="text" class="form-control" name="phonenumber" readonly="" value="{{$agency->phone}}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="logo" class="form-label" style="font-weight: 500; color: black">Contact Persion
                                    </label>
                                <input type="text" class="form-control" name="contactperson" readonly="" value="{{$agency->contact_person}}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="logo" class="form-label" style="font-weight: 500; color: black">Contact Phone number
                                    </label>
                                <input type="text" class="form-control" name="contactphonenumber" readonly="" value="{{$agency->contact_phone}}">
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="address" class="form-label" style="font-weight: 500; color: black">Address 
                                    Line </label>
                                <textarea class="form-control" name="description" rows="3"
                                          placeholder="Description ....." readonly=""> 
                                          {{$agency->address}},{{$agency->country}}
                                         
                                      </textarea>
                                @error('address')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>


                                         
                    </div>
                </div>
            </div>
  
          <!-- fund -->
          <div class="page-content">
                <div class="row" style="padding: 5px 0px;">
                    <div class="col-12 text-decoration-underline">
                        <span
                            style="font-weight: 500; color: var(--primary) ; font-size: 20px"> Ammount Detials</span>
                    </div>
                    <div class="row" style="margin-top: 10px">
                       
                    <div class="col-md-3">
                            <div class="mb-3">
                                <label for="logo" class="form-label" style="font-weight: 500; color: black">Avaivable balance
                                    </label>
                                <input type="text" class="form-control" name="avaibablebalance" readonly="" value="{{ $agency->balance ? $agency->balance->balance : 0 }}">
                            </div>
                        </div>

                        <!-- balance -->
                       <div class="col-md-3">
                            <div class="mb-3">
                                <label for="ammount" class="form-label" style="font-weight: 500; color: black">Add balance
                                    </label>
                                <input type="text" class="form-control" name="add_ammount" value="{{ old('add_ammount') }}" placeholder="Enter Ampount.....">
                                @error('service_name')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
    

                        
                                         
                    </div>
                </div>
            </div>
          <!-- endfund -->
            <div class="page-content">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-5">Add Balance </button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>

@stop
