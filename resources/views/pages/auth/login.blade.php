@extends('layouts.auth')

@section('title') Login page @endsection

@section('content')
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card overflow-hidden">
            <div class="bg-primary-subtle">
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-4">
                            <h5 class="text-primary">Welcome Blog Ship!</h5>
                            <p>Sign in to continue Blog Ship.</p>
                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="{{asset('backend')}}/images/profile-img.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="p-2">
                    <form class="form-horizontal" method="post" action="{{route('login')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger font-size-12"><sup>*</sup></span></label>
                            <input value="{{old('email')}}" name="email" type="text" class="form-control" id="email" placeholder="Enter your email">
                            @error('email')
                            <span class="text-danger  font-size-12">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password <span class="text-danger font-size-12"><sup>*</sup></span> </label>
                            <div class="input-group auth-pass-inputgroup">
                                <input type="password" name="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                <button class="btn btn-light password-addon" type="button"><i class="mdi mdi-eye-outline"></i></button>
                            </div>
                            @error('password')
                            <span class="text-danger font-size-12">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember_me" id="remember-check">
                            <label class="form-check-label" for="remember-check">
                                Remember me
                            </label>
                        </div>
                        <div class="mt-3 d-grid">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                        </div>

                        <div class="mt-4 text-center">
                            <a href="{{route('auth.forget.password')}}" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="mt-5 text-center">
            <div>
                <p>Don't have an account ? <a href="{{route('auth.registration')}}" class="fw-medium text-primary"> Signup now </a> </p>
            </div>
        </div>
    </div>
@endsection


