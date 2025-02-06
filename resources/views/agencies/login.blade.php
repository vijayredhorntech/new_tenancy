@extends('layouts.app')

@section('title', 'Sign In')

@section('content')
<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">
                                <div class="text-center">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                                        style="width: 185px;" alt="logo">
                                    <h4 class="mt-1 mb-5 pb-1">Sign In Agency</h4>
                                </div>

                                <form action="{{ route('agency_login') }}" method="POST">
                                    @csrf
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="email" id="form2Example11" class="form-control"
                                            placeholder="Email Address" name="email" required />
                                        <label class="form-label" for="form2Example11">Email Address</label>
                                            @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                             @enderror
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="password" id="form2Example22" class="form-control" 
                                            placeholder="Enter Password" name="password" required />
                                        <label class="form-label" for="form2Example22">Enter Password</label>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <input type="hidden" id="form2Example22" class="form-control" 
                                    name="domain" value="{{ $agency->domains[0]->domain_name }}" />
                                    
                                    <input type="hidden" id="form2Example22" class="form-control" 
                                    name="database" value="{{ $agency->database_name }}" />

                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <input type="submit" value="Login" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">
                                        <a class="text-muted" href="#!">Forgot password?</a>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <h4 class="mb-4">Attention is the new currency</h4>
                                <p class="small mb-0">The more effortless the writing looks, the more effort the writer actually put into the process.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
