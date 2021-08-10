<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Boris Dmitrovic">
    <meta name="keywords"
          content="intership, news, backend">
    <meta name="description"
          content="News backend project for intership">
    <meta name="robots" content="noindex,nofollow">
    <title>Admin - @yield('title')</title>
    @section('appendCSS')
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/')}}assets/back/plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="{{asset('/')}}assets/back/css/style.min.css" rel="stylesheet">

    @show
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ asset('/')}}assets/back/js/ajax.js"  type="text/javascript"> </script>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <![endif]-->
</head>

<body>

@include('components.back.preloader')

<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
     data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

    @include('components.back.header')

    @include('components.back.left_sidebar')

    <div class="page-wrapper" style="min-height: 250px;">

        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div id="result" class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->

            <!--        <div id="result"></div>-->

            @empty(!session('success'))
                <div class="alert alert-success">  <span class="glyphicon glyphicon-ok-sign"></span>    {{ session('success') }}</div>
            @endempty

            @yield('content')


        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        @include('components.back.footer')
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>

@include('components.back.script')
</body>

</html>



