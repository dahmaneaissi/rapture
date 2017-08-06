@extends('admin/layouts/master')

@section('content')


    <section class="content-header">
        <h1>
            @if( isset( $item->id ) ) Modifier un item @else Ajouter un item @endif
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
                                if( isset( $item->id ) )
                                {
                                    $options = array(
                                            'method' => 'put',
                                            'url' => route('users.update', $item )
                                    );
                                }else{
                                    $options = array(
                                            'method' => 'post',
                                            'url' => route('users.save')
                                    );
                                }

                            ?>

                            {!!  Form::model( isset( $item ) ? $item : null, $options ) !!}
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
                                        {!! Form::label('email', 'E-Mail' ) !!}
                                        {!! Form::email('email', null , [ 'class' => 'form-control' ]) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('roles', 'Roles' ) !!}
                                        {!! Form::select('roles[]', $roles , isset( $item->roles ) ? $item->roles->pluck('id')->toArray() : null , [ 'class' => 'form-control select2' , 'multiple' => 'multiple' , 'data-placeholder' => 'Selectionnez un roles...' , 'styles' => 'width : 100%' ] ) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('password', 'Mot de passe' ) !!}
                                        {!! Form::password('password' , [ 'class' => 'form-control' ]) !!}
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
