<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $title }}</title>

    <!-- Bootstrap Core CSS -->
    {!! Html::style('//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') !!}
    {!! Html::style('//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') !!}
    {!! Html::style('//cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') !!}

            <!-- Custom CSS -->
    {!! Html::style('dist/admin/css/AdminLTE.min.css') !!}
    {!! Html::style('dist/admin/css/skins/_all-skins.min.css') !!}

</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    @include('admin/global/header')

    <!-- Left side column. contains the sidebar -->
    @include('admin/global/main-sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    @include('admin/global/footer')

    <!-- Control Sidebar -->
    @include('admin/global/control-sidebar')

</div>
<!-- ./wrapper -->



{!! Html::script('//code.jquery.com/jquery-2.2.3.min.js') !!}
{!! Html::script('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js') !!}
{!! Html::script('dist/admin/js/app.min.js') !!}
{!! Html::script('dist/admin/js/demo.js') !!}

@yield('foot')


</body>
</html>
