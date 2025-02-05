@extends('auth.admin.layout.header')
@section('title')
    Create Agency
@stop

@section('content')

    <div class="show_table_details">
        <div class="button_area">
            <span>Create New Agency</span>
        </div>
        <form action="{{ route('agencies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="page-content">
                <div class="row" style="padding: 20px 0px;">
                    <div class="col-12 text-decoration-underline">
                        <span
                            style="font-weight: 500; color: var(--primary) ; font-size: 20px">Basic Details of Agency</span>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="logo" class="form-label" style="font-weight: 500; color: black">Agency
                                    Photo</label>
                                <input type="file" class="form-control" name="logo">
                                @error('logo')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="name" class="form-label" style="font-weight: 500; color: black">Agency
                                    Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                       placeholder="Enter agency name.....">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="email" class="form-label"
                                       style="font-weight: 500; color: black">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                       placeholder="agencyemail@gmail.com.....">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="phone" class="form-label" style="font-weight: 500; color: black">Phone
                                    Number</label>
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}"
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
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="contact_person" class="form-label" style="font-weight: 500; color: black">Contact
                                    Person</label>
                                <input type="text" class="form-control" name="contact_person"
                                       value="{{ old('contact_person') }}" placeholder="Contact person name.....">
                                @error('contact_person')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="contact_person" class="form-label" style="font-weight: 500; color: black">Contact
                                    Person Number</label>
                                <input type="text" class="form-control" name="contact_person"
                                       value="{{ old('contact_person') }}" placeholder="0123456789.....">
                                @error('contact_person')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="contact_person" class="form-label" style="font-weight: 500; color: black">VAT Number</label>
                                <input type="text" class="form-control" name="contact_person"
                                       value="{{ old('contact_person') }}" placeholder="CHS456S.....">
                                @error('contact_person')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-content">
                <div class="row" style="padding: 20px 0px;">
                    <div class="col-12 text-decoration-underline">
                        <span style="font-weight: 500; color: var(--primary) ; font-size: 20px">Address Details of Agency</span>
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
                                <label for="address" class="form-label"
                                       style="font-weight: 500; color: black">City</label>
                                <input class="form-control" name="address" rows="2" placeholder="City....."/>
                                @error('address')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="address" class="form-label"
                                       style="font-weight: 500; color: black">State</label>
                                <input class="form-control" name="address" rows="2" placeholder="State....."/>
                                @error('address')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="address" class="form-label" style="font-weight: 500; color: black">Zip
                                    Code</label>
                                <input class="form-control" name="address" rows="2" placeholder="Zip Code....."/>
                                @error('address')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="address" class="form-label"
                                       style="font-weight: 500; color: black">Country</label>
                                <input class="form-control" name="address" rows="2" placeholder="Country....."/>
                                @error('address')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-content">
                <div class="row" style="padding: 20px 0px;">
                    <div class="col-12 text-decoration-underline">
                        <span style="font-weight: 500; color: var(--primary) ; font-size: 20px">Account Details of Agency</span>
                    </div>

                    <div class="row" style="margin-top: 10px">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="domain" class="form-label" style="font-weight: 500; color: black">Domain
                                    Name</label>
                                <input type="text" class="form-control" name="domain" value="{{ old('domain') }}"
                                       placeholder="https://agency/dashboard.com">
                                @error('domain')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="logo" class="form-label" style="font-weight: 500; color: black">Database
                                    Name</label>
                                <input type="text" class="form-control" name="database" placeholder="Database name....">
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
                            <button type="submit" class="btn btn-primary px-5">Create Agency</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>

@stop
