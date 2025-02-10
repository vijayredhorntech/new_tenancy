@extends('auth.admin.layout.header')
@section('title')
    Create Member
@stop

@section('content')

    <div class="show_table_details">
        <div class="button_area">
            <span>Create New Member</span>
        </div>
        <form action="{{ route('superadmin_staffstore') }}" method="POST" enctype="multipart/form-data">
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
                            style="font-weight: 500; color: var(--primary) ; font-size: 20px">Basic Details of Member</span>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="profile" class="form-label" style="font-weight: 500; color: black">Member
                                    Photo</label>
                                <input type="file" class="form-control" name="profile">
                                @error('profile')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="name" class="form-label" style="font-weight: 500; color: black">Member
                                    Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                       placeholder="Enter Member name.....">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="email" class="form-label"
                                       style="font-weight: 500; color: black">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                       placeholder="Memberemail@gmail.com.....">
                                @error('email')
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
                                            <option value="+91">+91</option>
                                            <option value="+92">+92</option>
                                            <option value="+93">+93</option>
                                            <option value="+94">+94</option>
                                            <option value="+95">+95</option>
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
 
       
                    </div>
                </div>
            </div>
            <div class="page-content">
                <div class="row" style="padding: 5px 0px;">
                    <div class="col-12 text-decoration-underline">
                        <span style="font-weight: 500; color: var(--primary) ; font-size: 20px">Address Details of Member</span>
                    </div>

                    <div class="row" style="margin-top: 10px">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="address" class="form-label" style="font-weight: 500; color: black">Address
                                    Line 1</label>
                                <textarea class="form-control" name="address" rows="2"
                                          placeholder="Address line 1.....">{{ old('address') }}</textarea>
                                @error('address')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="address" class="form-label" style="font-weight: 500; color: black">Address
                                    Line 2</label>
                                <textarea class="form-control" name="address" rows="2"
                                          placeholder="Address line 2.....">{{ old('address') }}</textarea>
                                @error('address')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="city" class="form-label"
                                       style="font-weight: 500; color: black">City</label>
                                <input class="form-control" name="city" rows="2" placeholder="City....."/>
                                @error('address')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="state" class="form-label"
                                       style="font-weight: 500; color: black">State</label>
                                <input class="form-control" name="state" rows="2" placeholder="State....."/>
                                @error('address')
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
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="country" class="form-label"
                                       style="font-weight: 500; color: black">Country</label>
                                <input class="form-control" name="country" rows="2" placeholder="Country....."/>
                                @error('country')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <!-- Create for service -->


           
 <!-- end for service  -->

           

          

            <div class="page-content">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-5">Create Member</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>

@stop
