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
        <div class="col-sm-offset-2 col-sm-8">

            @if( $users->count() )
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Willaya</th>
                    <th>Score (Point)</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>200</td>
                </tr>
                </tbody>
            </table>
            @endif

        </div>
    </div>
    <!-- /.row -->
</div>
@stop

@section('footer')


@stop
