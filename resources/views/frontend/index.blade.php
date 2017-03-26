@extends('frontend/layouts/master')

@section('content')
<div class="start">

    <!-- / Navigation -->
    @include('frontend/navigation/navigation')


    <div class="row">
        <div class="col-lg-12">
            <a class="link-start" target="_self" href="{{ $loginUrl }}">Participer</a>
        </div>
    </div>
    <!-- /.row -->
</div>

@stop

@section('footer')


@stop
