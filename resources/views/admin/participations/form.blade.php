
<?php

if( $participation->id )
{
    $options = array(
        'method' => 'put',
        'url' => route('put.participation', $participation )
    );
}else{
    $options = array(
        'method' => 'post',
        'url' => route('post.participation')
    );
}
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
    <div class="col-lg-12">

        @include( 'admin/errors/errors' )

        {!! Form::model( $participation , $options ) !!}

        <div class="col-sm-6">


            <h3>Photo</h3>
            <div class="row">
                <div class="col-sm-6">
                    <a href="#" data-toggle="modal" data-target="#myModal">
                        {!! HTML::image( 'medias/images/' . $participation->media->file_name , null ,  ['class' => 'img-responsive' ] )  !!}
                    </a>
                </div>
            </div>



            <div class="form-group">
                <h3>Moderation</h3>
                <label>Valider la participation</label>
                <div class="radio">
                    <label>
                        {!! Form::radio('valid', 1 , null , array( 'class' => '' , 'rows' => '10' ) ) !!}
                        Oui
                    </label>
                </div>

                <div class="radio">
                    <label>
                        {!! Form::radio('valid', 0 , null , array( 'class' => '' , 'rows' => '10' ) ) !!}
                        Non
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-sm btn-success">Enregistrer</button>
            <a href="{{ route('moderat') }}" type="button" class="btn btn-sm btn-warning">Retour</a>
        </div>

        <div class="col-sm-6">

            <div class="form-group">
                <h3>Joueur</h3>
                <p>{{ $participation->user->name }} {{ $participation->user->lastname }}</p>
            </div>

            <div class="form-group">
                <h3>Nom du defi</h3>
                <p>{{ $participation->defi->name }}</p>
            </div>

            <div class="form-group">
                <h3>Points</h3>
                <p>{{ $participation->score }}</p>
            </div>

            <div class="form-group">
                <h3>Jouer le</h3>
                <p>{{ $participation->created_at }}</p>
            </div>

        </div>

        {!! Form::close() !!}

    </div>
</div>

<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                {!! HTML::image( 'medias/images/' . $participation->media->file_name , null ,  ['class' => 'img-responsive' ] )  !!}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /.row -->
@stop

@section('footer')


@stop