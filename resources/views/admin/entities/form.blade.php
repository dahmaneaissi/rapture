@extends('admin/layouts/master')

@section('content')


    <section class="content-header">
        <h1>
            {{ $title }}
        </h1>
    </section>

    <section class="content">
        <div class="row">
                    <div class="col-md-6">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Informations</h3>
                            </div>

                            @include( 'admin/errors/errors' )

                            <?php
                                if( $entity->id )
                                {
                                    $options = array(
                                            'method' => 'put',
                                            'url' => route('entities.update', $entity )
                                    );
                                }else{
                                    $options = array(
                                            'method' => 'post',
                                            'url' => route('entities.save')
                                    );
                                }

                                $options['files'] = 'true';
                            ?>

                            {!!  Form::model( $entity , $options ) !!}
                                <div class="box-body">
                                    <div class="form-group">
                                        {!! Form::label('lastname', 'Nom' ) !!}
                                        {!! Form::text('lastname', null , [ 'class' => 'form-control' ]) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('firstname', 'Prénom' ) !!}
                                        {!! Form::text('firstname', null , [ 'class' => 'form-control' ]) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('facebook', 'Compte Facebook' ) !!}
                                        {!! Form::text('facebook', null , [ 'class' => 'form-control' ]) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('twitter', 'Compte Twitter' ) !!}
                                        {!! Form::text('twitter', null , [ 'class' => 'form-control' ]) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('instagram', 'Compte Instagram' ) !!}
                                        {!! Form::text('instagram', null , [ 'class' => 'form-control' ]) !!}
                                    </div>


                                    {!! Form::label('active', 'Active' ) !!}

                                        <div class="radio">
                                            <label>
                                                {!! Form::radio('active', '1', isset( $entity->active ) && $entity->active ? true : false ) !!}
                                                Oui
                                            </label>
                                            <label>
                                                {!! Form::radio('active', '0', isset( $entity->active ) && !$entity->active ? true : false ) !!}
                                                Nom
                                            </label>
                                        </div>

                                </div>

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>

                            {!! Form::close() !!}

                        </div>


                    </div>
                </div>
    </section>
@stop
