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
                                            'url' => route('roles.update', $item )
                                    );
                                }else{
                                    $options = array(
                                            'method' => 'post',
                                            'url' => route('roles.save')
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
                                        {!! Form::label('slug', 'Slug' ) !!}
                                        {!! Form::text('slug', null , [ 'class' => 'form-control' ]) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('description', 'Description' ) !!}
                                        {!! Form::textarea('description', null , [ 'class' => 'form-control' ]) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('permissions', 'Permissions' ) !!}
                                        {!! Form::select('permissions[]', $permissions , isset( $item->permissions ) ? $item->permissions->pluck('id')->toArray() : null , [ 'class' => 'form-control select2' , 'multiple' => 'multiple' , 'data-placeholder' => 'Selectionnez un roles...' , 'styles' => 'width : 100%' ] ) !!}
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
