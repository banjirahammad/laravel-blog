@extends('layouts.auth')

@section('title') Reset password page @endsection

@section('content')
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card overflow-hidden">
            <div class="bg-primary-subtle">
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-4">
                            <h5 class="text-primary">Reset Your Passwordd!</h5>
                            <p>Reset your password.</p>
                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="{{asset('backend')}}/images/profile-img.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="p-2">
                    <form class="form-horizontal" method="post" action="{{route('reset.password')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="password" class="form-label">Password <span class="text-danger font-size-12"><sup>*</sup></span> </label>
                            <div class="input-group auth-pass-inputgroup">
                                <input type="password" name="password" class="form-control" placeholder="Enter password" id="password">
                                <button class="btn btn-light password-addon" type="button"><i class="mdi mdi-eye-outline"></i></button>
                            </div>
                            <input type="hidden" name="token" value="{{$token}}">
                            @error('password')
                            <span class="text-danger font-size-12">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation"  class="form-label">Confirm Password <span class="text-danger font-size-12"><sup>*</sup></span> </label>
                            <div class="input-group auth-pass-inputgroup">
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Enter confirm password" id="password_confirmation" >
                                <button class="btn btn-light password-addon" type="button"><i class="mdi mdi-eye-outline"></i></button>
                            </div>
                            @error('password_confirmation')
                            <span class="text-danger font-size-12">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mt-3 d-grid">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">Reset Password</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="mt-5 text-center">
            <div>
                <p>Already have an account ?  <a href="{{route('auth.login')}}" class="fw-medium text-primary"> Login </a> </p>
            </div>
        </div>
    </div>
@endsection


