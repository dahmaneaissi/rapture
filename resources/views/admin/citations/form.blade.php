
<?php

if( $citation->id )
{
    $options = array(
        'method' => 'put',
        'url' => route('put.citation', $citation )
    );
}else{
    $options = array(
        'method' => 'post',
        'url' => route('post.citation')
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
    <div class="col-lg-6">

        @include( 'admin/errors/errors' )

        {!! Form::model( $citation , $options ) !!}

            <div class="form-group">
                <label>Contenu</label>
                {!! Form::textarea('name', null , array('class' => 'form-control' , 'rows' => '10' ) ) !!}
                <p class="help-block">Example block-level help text here.</p>
            </div>

            <div class="form-group">
                <label>Description</label>
                {!! Form::textarea('desc', null , array('class' => 'form-control' , 'rows' => '15' ) ) !!}
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