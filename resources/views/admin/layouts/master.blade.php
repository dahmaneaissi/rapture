<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ !empty($title) ? $title : '' }}</title>

    {!! Html::style('dist/admin/css/style.min.css') !!}


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

</div>
<!-- ./wrapper -->


{!! Html::script('dist/admin/js/app.min.js') !!}

@yield('foot')


</body>
</html>
