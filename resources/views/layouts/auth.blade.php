<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
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
                @yield('content')
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
