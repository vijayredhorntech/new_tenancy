@extends('auth.admin.layout.header')
@section('title')
    Update Agency
@stop

@section('content')




    <div class="show_table_details">
        <div class="button_area">
            <span>Update Agency</span>
        </div>
        <form action="{{ route('agencies.editstore') }}" method="POST" enctype="multipart/form-data">
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
                            style="font-weight: 500; color: var(--primary) ; font-size: 20px">Basic Details of Agency</span>
                    </div>
                    <input type="hidden" name="id" value="{{ old('id', $edit_agency->id ?? '') }}">


                    <div class="row" style="margin-top: 10px">
                     
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="name" class="form-label" style="font-weight: 500; color: black">Agency
                                    Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $edit_agency->name ?? '')  }}"
                                       placeholder="Enter agency name.....">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="email" class="form-label"
                                       style="font-weight: 500; color: black">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email', $edit_agency->email ?? '')  }}"
                                       placeholder="agencyemail@gmail.com.....">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="phone" class="form-label" style="font-weight: 500; color: black">Phone
                                    Number</label>
                                <input type="text" class="form-control" name="phone" value="{{ old('phone', $edit_agency->phone ?? '')  }}"
                                       placeholder="01781 200705.....">
                                @error('phone')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="contact_phone" class="form-label"
                                               style="font-weight: 500; color: black">Code</label>
                                               <select type="text" class="form-control" name="contact_phone">
                                            
                                               @foreach($countries as $country)
                                                        <option value="{{ $country['dial_code'] }}">
                                                            {{ $country['flag'] }} {{ $country['name'] }} ({{ $country['dial_code'] }})
                                                        </option>
                                                    @endforeach

                                               </select>
              
                                        @error('contact_phone')
                                        <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="mb-3">
                                        <label for="contact_phone" class="form-label"
                                               style="font-weight: 500; color: black">Mobile Number</label>
                                        <input type="text" class="form-control" name="contact_phone"
                                               value="{{ old('contact_phone') }}" placeholder="0123456789....">
                                        @error('contact_phone')
                                        <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="contact_person" class="form-label" style="font-weight: 500; color: black">Contact
                                    Person</label>
                                <input type="text" class="form-control" name="contact_person"
                                       value="{{ old('contact_person', $edit_agency->contact_person ?? '')  }}" placeholder="Contact person name.....">
                                @error('contact_person')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="phone_number" class="form-label" style="font-weight: 500; color: black">Contact
                                    Person Number</label>
                                <input type="text" class="form-control" name="phone_number"
                                       value="{{ old('phone_number', $edit_agency->contact_phone ?? '')  }}" placeholder="0123456789.....">
                                @error('phone_number')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="vat_number" class="form-label" style="font-weight: 500; color: black">VAT Number</label>
                                <input type="text" class="form-control" name="vat_number"
                                       value="{{ old('vat_number') }}" placeholder="CHS456S.....">
                                @error('vat_number')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-content">
                <div class="row" style="padding: 5px 0px;">
                    <div class="col-12 text-decoration-underline">
                        <span style="font-weight: 500; color: var(--primary) ; font-size: 20px">Address Details of Agency</span>
                    </div>

                    <div class="row" style="margin-top: 10px">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="address" class="form-label" style="font-weight: 500; color: black">Address
                                    Line 1</label>
                                <textarea class="form-control" name="address" rows="2"
                                          placeholder="Address line 1.....">{{ old('address', isset($edit_agency->address) ? $edit_agency->address : '') }}</textarea>
                                @error('address')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="address" class="form-label" style="font-weight: 500; color: black">Address
                                    Line 2</label>
                                <textarea class="form-control" name="address2" rows="2"
                                          placeholder="Address line 2.....">{{ old('address2') }}</textarea>
                                @error('address2')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="city" class="form-label"
                                       style="font-weight: 500; color: black">City</label>
                                <input class="form-control" name="city" rows="2" placeholder="City....."/>
                                @error('city')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="state" class="form-label"
                                       style="font-weight: 500; color: black">State</label>
                                <input class="form-control" name="state" rows="2" placeholder="State....."/>
                                @error('state')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="zipcode" class="form-label" style="font-weight: 500; color: black">Zip
                                    Code</label>
                                <input class="form-control" name="zipcode" rows="2" placeholder="Zip Code....."/>
                                @error('address')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <!-- country -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="country" class="form-label"
                                       style="font-weight: 500; color: black">Country</label>
                                <input class="form-control" name="country" rows="2" placeholder="Country....." value="{{ old('country', $edit_agency->country ?? '')  }}"/>
                                @error('country')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <!-- Create for service -->


           <div class="page-content">
                <div class="row" style="padding: 5px 0px;">
                    <div class="col-12 text-decoration-underline">
                        <span style="font-weight: 500; color: var(--primary); font-size: 20px">Select Services</span>
                    </div>

                    <!-- Service Checkboxes -->
                    <div class="row" style="margin-top: 10px;">
                    @if(isset($services) && $services->isNotEmpty())
                        @foreach($services as $service)
                            <div class="col-6 col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="services[]" value="{{ $service->id }}" 
                                        id="service_{{ $service->id }}" 
                                        @if($edit_agency->userAssignments->contains('service_id', $service->id)) checked @endif>
                                    <label class="form-check-label" for="service_{{ $service->id }}" style="font-weight: 500; color: black;">
                                        {{ $service->name }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No services available</p>
                    @endif
                          

                </div>
            </div>
      </div>
 <!-- end for service  -->

           

            <div class="page-content style " style="display:none">
                <div class="row" style="padding: 5px 0px;">
                    <div class="col-12 text-decoration-underline">
                        <span style="font-weight: 500; color: var(--primary) ; font-size: 20px">Account Details of Agency</span>
                    </div>

                    <div class="row" style="margin-top: 10px">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="domain" class="form-label" style="font-weight: 500; color: black">Domain
                                    Name</label>
                                <input type="text" class="form-control" name="domain" value="{{ old('domain') }}"
                                       placeholder="https://agency/dashboard.com">
                                @error('domain')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="logo" class="form-label" style="font-weight: 500; color: black">Database
                                    Name</label>
                                <input type="text" class="form-control" name="database" placeholder="Database name...." value="{{ old('domain') }}" >
                                @error('database')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="logo" class="form-label" style="font-weight: 500; color: black">Login Password</label>
                                <input type="text" class="form-control" name="login_password" placeholder="klLK*(%&(5654652   ....">
                                @error('logo')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="page-content">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-5">Update Agency</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>

@stop
