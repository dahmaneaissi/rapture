@extends('frontend/layouts/master')

@section('content')

<div class="bg2">

    <div class="row intro">

        <div class="row profil">
            <div class="col-xs-offset-6 col-xs-6">

            </div>
        </div>


        <div class="row" style="margin-top: 50px">
            <div class="col-xs-offset-1 col-xs-10">
                <div class="alert alert-success">
                    <strong><i class="fa fa-check"></i></strong> {{ $msg }}
                </div>
            </div>
        </div>

    </div>


    <div class="form row">
        <div class="col-xs-12">


        </div>
    </div>
    <!-- /.row -->
</div>
@stop

@section('footer')


@stop
