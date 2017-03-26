@extends('admin/layouts/master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Liste des participations <i class="fa fa-gamepad"></i></i></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">


    <div class="col-lg-12">

        @include('admin/flash/flash')

        <div class="dataTable_wrapper">
            @if ( count($participations) )

            <table class="table table-striped table-bordered " id="">
                <thead>
                <tr>
                    <th class="text-center" >#</th>
                    <th>Nom & Prénom</th>
                    <th>Défi</th>
                    <th>Points</th>
                    <th>Date & Heure</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ( $participations as $participation )

                    <tr @if(  $participation->moderat ) class="success" @else class="warning" @endif >
                        <td class="text-center" ><i class="fa fa-gamepad"></i></td>
                        <td>{{ $participation->user->name }} {{ $participation->user->lastname }}</td>
                        <td>{{ $participation->defi->name }}</td>
                        <td>
                            {{ $participation->score }}
                        </td>
                        <td>
                            {{ $participation->created_at }}
                        </td>
                        <td>
                            <a title="Modérer" href="{{ action( 'ParticipationController@getEdit', $participation->id ) }}"  class="btn btn-outline btn-info btn btn-primary btn-xs"><i class="fa fa-edit fa-fw"></i></a>
                            <a title="Supprimer" href="#" data-href="{{ action( 'ParticipationController@getDestroy', $participation->id ) }}" data-toggle="modal" data-target="#sup" class="btn btn-primary btn-xs btn btn-outline btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <div class="alert alert-warning">
                        Pas de participations !
                    </div>
                @endif

                </tbody>
            </table>
            {!! $participations->render() !!}
        </div>
        <!-- /.table-responsive -->

        <div class="modal fade" id="sup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                    </div>
                    <div class="modal-body">
                        Êtes vous sûr de vouloir supprimer cette participation
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <a class="btn btn-danger btn-ok">Supprimer</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

@stop

@section('footer')
<script type="text/javascript">
    $('#sup').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
</script>
@stop
