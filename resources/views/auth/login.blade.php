
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administration</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    {!! Html::style('dist/admin/css/style.min.css') !!}

</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">
            Connectez-vous
        </p>

        <form action="/auth/login" method="post">
            {!! csrf_field() !!}
            <div class="form-group has-feedback">
                <input name="email" type="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input name="password" type="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="row">
                <div class="col-xs-8">

                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>


    </div>
    <!-- /.login-box-body -->
</div>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass:  'icheckbox_square-blue',
            radioClass:     'iradio_square-blue',
            increaseArea:   '20%' // optional
        });
    });
</script>

{!! Html::script('dist/admin/js/app.min.js') !!}
</body>
</html>
