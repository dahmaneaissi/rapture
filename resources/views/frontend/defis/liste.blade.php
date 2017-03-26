@extends('frontend/layouts/master')

@section('content')
<div class="bg2">

    <!-- / Navigation -->
    @include('frontend/navigation/navigation')

    <div class="row intro">

        <div class="row profil">
            <div class="col-lg-offset-6 col-lg-6">

            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ $title }}</h1>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-6">

            @if( $allDefis->count() )
                @foreach( $allDefis as $defi )
                    <h2>
                        @if( $defisPlayedByUser->contains( $defi ) )
                            <i class="fa fa-lock"></i> {{ $defi->name }}
                        @else
                            <a href="{{ route("playDefi", $defi ) }}"><i class="fa fa-trophy"></i> {{ $defi->name }}</a>
                        @endif
                    </h2>
                @endforeach
            @endif

        </div>
    </div>
    <!-- /.row -->
</div>
@stop

@section('footer')


@stop
