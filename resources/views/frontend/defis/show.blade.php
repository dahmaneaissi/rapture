@extends('frontend/layouts/master')

@section('content')


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ $defi->name }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>


    <div class="row">
        <div class="col-lg-6">

            <h2>{{  $defi->content }}</h2>

            @include( 'frontend/errors/errors' )

            {!! Form::model( $defi , [ 'method' => 'post' , 'files' => 'true' ] ) !!}

            <div class="form-group">
                <label>Nom</label>
                {!! Form::file('photo', array('class' => 'form-control' ) ) !!}
                <p class="help-block"></p>
            </div>

            <button type="submit" class="btn btn-sm btn-success">Envoyer</button>

            {!! Form::close() !!}

        </div>
    </div>
    <!-- /.row -->
@stop

@section('footer')


@stop
