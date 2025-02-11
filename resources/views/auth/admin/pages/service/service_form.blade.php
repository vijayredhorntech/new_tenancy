@extends('auth.admin.layout.header')
@section('title')
    {{ 'Create Service' }}
@stop

@section('content')


  
    <div class="show_table_details">
        <div class="button_area">
        <span>{{ isset($service) ? 'Update Service' : 'Create New Service' }}</span>

        </div>
        <form action="{{ isset($service) ? route('serviceupdate_store', ['id' => $service->id]) : route('superadmin_ servicestore') }}" method="POST" enctype="multipart/form-data">
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
                            style="font-weight: 500; color: var(--primary) ; font-size: 20px">Basic Details of Service</span>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="logo" class="form-label" style="font-weight: 500; color: black">Serive Name
                                    </label>
                                <input type="text" class="form-control" name="service_name" value="{{ old('service_name', $service->name ?? '') }}" placeholder="Enter Service name.....">
                                @error('service_name')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
    

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="address" class="form-label" style="font-weight: 500; color: black">Description
                                    Line 1</label>
                                <textarea class="form-control" name="description" rows="2"
                                          placeholder="Description ....."> {{ old('description', isset($service->description) ?$service->description : '') }}
                                      </textarea>
                                @error('address')
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
                            <button type="submit" class="btn btn-primary px-5">{{ isset($service) ? 'Update Service' : 'Create Service' }} </button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>

@stop
