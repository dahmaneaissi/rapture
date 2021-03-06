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
                                            'url' => route('permissions.update', $item )
                                    );
                                }else{
                                    $options = array(
                                            'method' => 'post',
                                            'url' => route('permissions.save')
                                    );
                                }

                            ?>

                            {!!  Form::model( isset( $item ) ? $item : null, $options ) !!}
                                <div class="box-body">
                                    <div class="form-group">
                                        {!! Form::label('title', 'Titre' ) !!}
                                        {!! Form::text('title', null , [ 'class' => 'form-control' ]) !!}
                                    </div>

                                    <div class="form-group">
                                        <label for="perm">Permissions disponibles</label>
                                        <select id="perm" name="slug" class="form-control select2" style="width: 100%" >
                                            <option value >Sélectionner une permission...</option>

                                            @if(  isset( $item->id ) )
                                                <option value="{{ $item->slug }}" selected="selected">{{ $item->slug }}</option>
                                            @endif

                                            @foreach( $availablePermissions as $availablePermission )
                                                <option value="{{ $availablePermission }}">{{ $availablePermission }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('description', 'Description' ) !!}
                                        {!! Form::textarea('description', null , [ 'class' => 'form-control' ]) !!}
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
