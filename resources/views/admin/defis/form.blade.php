
<?php

if( $defi->id )
{
    $options = array(
        'method' => 'put',
        'url' => route('put.defi', $defi )
    );
}else{
    $options = array(
        'method' => 'post',
        'url' => route('post.defi')
    );
}

$options['files'] = 'true';
?>

@extends('admin/layouts/master')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ $title }}</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>


<div class="row">
    <div class="col-lg-6">

        @include( 'admin/errors/errors' )

        {!! Form::model( $defi , $options ) !!}

            <div class="form-group">
                <label>Nom</label>
                {!! Form::text('name', null , array('class' => 'form-control' , 'rows' => '10' ) ) !!}
                <p class="help-block"></p>
            </div>


            <div class="form-group">
                <label>Contenu</label>
                {!! Form::textarea('content', null , array('class' => 'form-control' , 'rows' => '15' ) ) !!}
            </div>

            @if( isset( $defi->media->file_name ) )
            <div class="class-group">
                {!! HTML::image( 'medias/images/' . $defi->media->file_name , null ,  ['class' => 'img-responsive' ] )  !!}
            </div>
            @endif

            <div class="form-group">
                <label>Illustration</label>
                {!! Form::file('photo', array('class' => 'form-control' ) ) !!}
                <p class="help-block"></p>
            </div>

            <div class="form-group">
                <label>Ordre d'affichage</label>
                {!! Form::text('order', null , array('class' => 'form-control' , 'rows' => '10' ) ) !!}
                <p class="help-block"></p>
            </div>

            <div class="form-group">
                <label>Status</label>
                <div class="radio">
                    <label>
                        {!! Form::radio('status', 1 , null , array( 'class' => '' , 'rows' => '10' ) ) !!}
                        Oui
                    </label>
                </div>

                <div class="radio">
                    <label>
                        {!! Form::radio('status', 0 , null , array( 'class' => '' , 'rows' => '10' ) ) !!}
                        Non
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-sm btn-success">Enregistrer</button>
            <button type="reset" class="btn btn-sm btn-warning">Reset</button>

        {!! Form::close() !!}

    </div>
</div>
<!-- /.row -->
@stop

@section('footer')


@stop