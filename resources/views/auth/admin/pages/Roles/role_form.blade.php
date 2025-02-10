@extends('auth.admin.layout.header')
@section('title')
    Create Member
@stop

@section('content')

    <div class="show_table_details">
        <div class="button_area">
            <span>Create New Role</span>
        </div>
        <form action="{{ route('superadmin_rolestore') }}" method="POST" enctype="multipart/form-data">
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
                                <label for="email" class="form-label"
                                       style="font-weight: 500; color: black">Role Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                       placeholder="Enter Role Name"  >
                                @error('name')
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
                            <button type="submit" class="btn btn-primary px-5">Create Role</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>

@stop
