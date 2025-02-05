@extends('auth.admin.layout.header')
@section('title')
  Agency
@stop



@section('content')

        <div class="container mt-5">
            <h2>Create Agency</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('agencies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Agency Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>
                            @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="domain" class="form-label">Domain Name</label>
                            <input type="text" class="form-control" name="domain" value="{{ old('domain') }}" required>
                            @error('domain') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="contact_person" class="form-label">Contact Person</label>
                            <input type="text" class="form-control" name="contact_person" value="{{ old('contact_person') }}" >
                            @error('contact_person') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="contact_phone" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" name="contact_phone" value="{{ old('contact_phone') }}" required>
                            @error('contact_phone') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="logo" class="form-label">Database</label>
                            <input type="text" class="form-control" name="database" required>
                            @error('logo') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" name="address" rows="3" >{{ old('address') }}</textarea>
                            @error('address') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control" name="country" value="{{ old('country') }}" required>
                            @error('country') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" class="form-control" name="logo">
                            @error('logo') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary px-5">Create Agency</button>
                </div>
            </form>
        </div>



@stop
