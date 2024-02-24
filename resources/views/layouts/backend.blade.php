<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend')}}/images/favicon.ico">
    <!-- Bootstrap Css -->
    <link href="{{asset('backend')}}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('backend')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('backend')}}/assets/libs/toastr/toastr.min.css">
    @yield('style')
    <!-- App Css-->
    <link href="{{asset('backend')}}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body data-sidebar="dark">
    {{--<body data-topbar="dark">--}}
    {{--<body data-sidebar="colored">--}}

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('partials.backend.header')

        @include('partials.backend.left_sidebar')


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    @yield('main')

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('partials.backend.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{asset('backend')}}/assets/js/jquery.min.js"></script>
    <script src="{{asset('backend')}}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('backend')}}/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{asset('backend')}}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{asset('backend')}}/assets/libs/node-waves/waves.min.js"></script>
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
    @stack('script')
    <!-- App js -->
    <script src="{{asset('backend')}}/assets/js/app.js"></script>

</body>

</html>
