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
                                        {!! Form::label('password', 'Mot de passe' ) !!}
                                        {!! Form::password('password' , [ 'class' => 'form-control' ]) !!}
                                    </div>

                                    {{--<div class="form-group">
                                        <label for="perm">Permissions disponibles</label>
                                        <select id="perm" name="slug" class="form-control select2" style="width: 100%" >
                                            <option value >Selectionnez une permission...</option>
                                            @foreach( $availablePermissions as $availablePermission )
                                                <option value="{{ $availablePermission }}">{{ $availablePermission }}</option>
                                            @endforeach
                                        </select>
                                    </div>--}}

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
