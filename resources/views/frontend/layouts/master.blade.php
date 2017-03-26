<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>4 millions de fans</title>

    <!-- Bootstrap Core CSS -->
    {!! HTML::style('assets/admin/css/bootstrap.min.css') !!}
    <!--{!! HTML::style('assets/admin/css/bootstrap-rtl.min.css') !!}-->

    <!-- Custom CSS -->
    {!! HTML::style('assets/admin/css/sb-admin-2.css') !!}
    <!--{!! HTML::style('assets/admin/css/sb-admin-rtl.css') !!}-->

    <!-- Custom Fonts -->
    {!! HTML::style('assets/admin/font-awesome/css/font-awesome.min.css') !!}

    {!! HTML::style('assets/frontend/css/style.css') !!}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <meta property="og:title" content="4 millions de fans"/>
    <meta property="og:description" content="4 millions de fans" />
</head>

<body>
<div  id="wrapper">

    <div class="fb-app">

    @yield('content')

    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- jQuery -->
{!! HTML::script('assets/admin/js/jquery.js') !!}
<!-- Bootstrap Core JavaScript -->
{!! HTML::script('assets/admin/js/bootstrap.min.js') !!}

{!! HTML::script('assets/admin/js/metisMenu.min.js') !!}
<!-- Custom Theme JavaScript -->
{!! HTML::script('assets/admin/js/sb-admin-2.js') !!}

@yield('footer')

</body>
</html>
