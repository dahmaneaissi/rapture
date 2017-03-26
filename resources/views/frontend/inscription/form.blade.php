@extends('frontend/layouts/master')

@section('content')

<div class="bg2">

    <div class="row intro">

        <div class="row ">
            <div class="col-xs-offset-6 col-xs-6">

            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">

            </div>
        </div>

    </div>


    <div class="form row">
        <div class="col-xs-12">


            {!! Form::model( $user , ['method' => 'post' , 'url' => route('post.user') ,'files'=> true ] ) !!}

            <div class="formhead">

                <div class="row">

                    <div class="col-xs-6">
                        <div class="form-group @if ( $errors->has('lastname') ) has-error @endif">
                            <label>Nom</label>
                            {!! Form::text('lastname', null , array('class' => 'form-control') ) !!}
                            @if ( $errors->has('lastname') )
                                <p class="help-block"><i class="fa fa-warning"></i> {{ $errors->first('lastname') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group @if ( $errors->has('name') ) has-error @endif">
                            <label>Prénom</label>
                            {!! Form::text('name', null , array('class' => 'form-control' ) ) !!}
                            @if ( $errors->has('name') )
                                <p class="help-block"><i class="fa fa-warning"></i> {{ $errors->first('name') }}</p>
                            @endif
                        </div>
                    </div>

                </div>


                <div class="row">

                    <div class="col-xs-6">
                        <div class="form-group @if ( $errors->has('tel') ) has-error @endif">
                            <label>Date de naissance</label>
                            {!! Form::date('birthday', null , array('class' => 'form-control', 'placeholder' => 'aaaa-mm-jj' ) ) !!}
                            @if ( $errors->has('birthday') )
                            <p class="help-block"><i class="fa fa-warning"></i> {{ $errors->first('birthday') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group @if ( $errors->has('tel') ) has-error @endif">
                            <label>Téléphone</label>
                            {!! Form::text('tel', null , array('class' => 'form-control' ) ) !!}
                            @if ( $errors->has('tel') )
                            <p class="help-block"><i class="fa fa-warning"></i> {{ $errors->first('tel') }}</p>
                            @endif
                        </div>
                    </div>

                </div>


                <div class="row">

                    <div class="col-xs-6">
                        <div class="form-group @if ( $errors->has('email') ) has-error @endif">
                            <label>Adresse Mail</label>
                            {!! Form::text('email', null , array('class' => 'form-control' ) ) !!}
                            @if ( $errors->has('email') )
                            <p class="help-block"><i class="fa fa-warning"></i> {{ $errors->first('email') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group @if ( $errors->has('willaya') ) has-error @endif">
                            <label>Wilaya</label>
                            {!! Form::select('willaya', $willaya , null , array('class' => 'form-control' ) ) !!}
                            @if ( $errors->has('willaya') )
                            <p class="help-block"><i class="fa fa-warning"></i> {{ $errors->first('willaya') }}</p>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-xs-6">
                        <div class="form-group @if ( $errors->has('photo') ) has-error @endif">
                            <label>Photo</label>
                            {!! Form::file('photo', array('class' => 'form-control' ) ) !!}
                            @if ( $errors->has('photo') )
                            <p class="help-block"><i class="fa fa-warning"></i> {{ $errors->first('photo') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group @if ( $errors->has('fb_profil') ) has-error @endif">
                            <label>Lien Profil Facebook</label>
                            {!! Form::text('fb_profil', null , array('class' => 'form-control') ) !!}
                            @if ( $errors->has('fb_profil') )
                                <p class="help-block"><i class="fa fa-warning"></i> {{ $errors->first('fb_profil') }}</p>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-xs-6">
                        <div class="form-group @if ( $errors->has('conditions') ) has-error @endif">
                            <div class="checkbox">
                                <label class="conditions-label">
                                    {!! Form::checkbox('conditions', 1 , null , array( 'class' => '' ) ) !!}
                                    J'ai lu et j'accepte <a target="_blank" href="{{ str_replace( 'index.php/', '' , url( 'medias/pdf' ) )  }}/reglement-jeu-4-millions.pdf">le règlement du jeu</a>.

                            @if ( $errors->has('conditions') )
                            <p class="help-block"><i class="fa fa-warning"></i> {{ $errors->first('conditions') }}</p>
                            @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div style="margin-top: 20px" class="form-group">
                            <button type="submit" class="btn btn-sm btn-success">Envoyer</button>
                        </div>
                    </div>

                </div>

            </div>



            {!! Form::close() !!}

        </div>
    </div>
    <!-- /.row -->
</div>
@stop

@section('footer')


@stop
