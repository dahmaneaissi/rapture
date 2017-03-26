@extends('admin/layouts/master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Liste des citations</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">


    <div class="col-lg-12">
        @include('admin/flash/flash')
        <p>
            <a href="{{ action('Admin\CitationController@getCreate') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> &nbsp;
                Ajouter une citation
            </a>
        </p>

        <div class="dataTable_wrapper">
            @if ( $citations->count() )
            <table class="table table-striped table-bordered " id="">
                <thead>
                <tr>
                    <th>Extrait</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>


                    @foreach ( $citations as $citation )
                    <tr>
                        <td>{{ str_limit( $citation->name , $limit = 50 , $end = '...') }}</td>
                        <td>
                            <a href="{{ action( 'Admin\CitationController@getEdit', $citation ) }}"  class="btn btn-outline btn-info"><i class="fa fa-edit fa-fw"></i></a>
                            <a href="#" data-href="{{ action( 'Admin\CitationController@getDestroy', $citation ) }}" data-toggle="modal" data-target="#sup" class="btn btn-outline btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <div class="alert alert-warning">
                        Pas de citations !
                    </div>
                @endif

                </tbody>
            </table>

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
                        Êtes vous sûr de vouloir supprimer cette citation
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
