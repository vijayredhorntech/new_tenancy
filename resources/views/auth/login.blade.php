@extends('layouts.app')

@section('title', 'Sign In')


@section('content')
    <div style="width: 100%; padding: 20px; height: 100vh; width: 100vw; overflow:hidden;  background: linear-gradient(rgba(0,0,0,0.68), rgba(0,0,0,0.5)), url({{asset('assets/images/backgroundImage2.jpg')}}); background-size: cover; background-position: center;">
      <div class="row" style="min-height: 100vh">
            <div class="col-12 h-100 loginFormLeftDiv p-12">
                <div class="loginFormDiv" >
                    <img src="{{asset('assets/images/logo.png')}}"  alt="Cloud Travels">
                    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-top: 20px">
                        <h2 style="color: #000; font-size: 25px; font-weight: 600">Welcome to Him soft</h2>
                        <p style="color: #000; font-size: 15px; font-weight: 500">Sign in to continue</p>
                    </div>
                    <form style="width: 100%" action="{{ route('superadmin_login') }}" method="POST">
                        @csrf
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form2Example11">Email Address</label>

                            <input type="email" id="form2Example11" class="form-control"
                                   placeholder="Enter email address....." name="email" required />
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form2Example22">Enter Password</label>

                            <input type="password" id="form2Example22" class="form-control"
                                   placeholder="Enter password....." name="password" required />
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-center pt-1 submitButtonDiv">
                            <input type="submit" value="Login" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">
                            <a class="text-muted" href="#!">Forgot password?</a>
                        </div>
                    </form>

                </div>
            </div>

      </div>
    </div>

@endsection
