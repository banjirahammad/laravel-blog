<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Login pag" name="description" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend')}}/images/favicon.ico">
    <!-- Bootstrap Css -->
    <link href="{{asset('backend')}}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('backend')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('backend')}}/assets/libs/toastr/toastr.min.css">
    <!-- App Css-->
    <link href="{{asset('backend')}}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-primary-subtle">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Welcome Blog Ship!</h5>
                                    <p>Free Register to continue Blog Ship.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{asset('backend')}}/images/profile-img.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="p-2">
                            <form class="form-horizontal" method="post" action="{{route('registration')}}">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name <span class="text-danger font-size-12"><sup>*</sup></span></label>
                                    <input value="{{old('name')}}" name="name" type="text" class="form-control" id="name" placeholder="Enter your name">
                                    @error('name')
                                    <span class="text-danger  font-size-12">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email <span class="text-danger font-size-12"><sup>*</sup></span></label>
                                    <input value="{{old('email')}}" name="email" type="email" class="form-control" id="email" placeholder="Enter your email">
                                    @error('email')
                                    <span class="text-danger  font-size-12">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="user_name" class="form-label">Username <span class="text-danger font-size-12"><sup>*</sup></span></label>
                                    <input value="{{old('user_name')}}" name="user_name" type="text" class="form-control" id="user_name" placeholder="Enter your username">
                                    @error('user_name')
                                    <span class="text-danger  font-size-12">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="mobile" class="form-label">Mobile </label>
                                    <input value="{{old('mobile')}}" name="mobile" type="text" class="form-control" id="mobile" placeholder="Enter your username">
                                    @error('mobile')
                                    <span class="text-danger  font-size-12">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password <span class="text-danger font-size-12"><sup>*</sup></span> </label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" name="password" class="form-control" placeholder="Enter password" id="Password">
                                        <button class="btn btn-light password-addon" type="button"><i class="mdi mdi-eye-outline"></i></button>
                                    </div>
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
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Register</button>
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
        </div>
    </div>
</div>
<!-- end account-pages -->

<!-- JAVASCRIPT -->
<script src="{{asset('backend')}}/assets/js/jquery.min.js"></script>
<script src="{{asset('backend')}}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('backend')}}/assets/libs/toastr/toastr.min.js"></script>
<script src="{{asset('backend')}}/assets/js/toastr.config.js"></script>
<script>
    $(".password-addon").click(function (){
        $(this).siblings('input').attr('type')=='password'?$(this).siblings('input').attr('type','text'):$(this).siblings('input').attr('type','password')
    });

    @if(Session::has('success'))
    toastr.success("{{session('success')}}")
    @endif
    @if(Session::has('error'))
    toastr.error("{{session('error')}}")
    @endif
    @if(Session::has('warning'))
    toastr.warning("{{session('warning')}}")
    @endif
    @if(Session::has('info'))
    toastr.info("{{session('info')}}")
    @endif
</script>
</body>
</html>
