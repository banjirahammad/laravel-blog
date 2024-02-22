@extends('layouts.auth')

@section('title') Forget password page @endsection

@section('content')
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card overflow-hidden">
            <div class="bg-primary-subtle">
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-4">
                            <h5 class="text-primary"> Reset Password</h5>
                            <p>Reset Password with email</p>
                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="{{asset('backend')}}/images/profile-img.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">

                <div class="p-2">
                    <div class="alert alert-success text-center mb-4 mt-3" role="alert">
                        @if(session()->has('success'))
                            {{session('success')}}
                        @else
                            Enter your Email and instructions will be sent to you!
                        @endif
                    </div>
                    <form class="form-horizontal" method="POST" action="{{route('forget.password')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger font-size-12"><sup>*</sup> </span> </label>
                            <input type="email" name="email" class="form-control" value="{{old('email')}}" id="email" placeholder="Enter your email">
                            @error('email')
                            <span class="text-danger  font-size-12">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="text-end">
                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
        <div class="mt-5 text-center">
            <p>Remember It ? <a href="{{route('auth.login')}}" class="fw-medium text-primary"> Login</a> </p>

        </div>

    </div>
@endsection


