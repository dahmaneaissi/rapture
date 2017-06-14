@extends('admin/layouts/master')

@section('content')




    <section class="content-header">
        <h1>
            {{ $title }}
        </h1>
    </section>

    <section class="content">


        @include('admin/flash/flash')

        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-sm-10">
                        <a href="{{ route('entities.create') }}" class="btn btn-success">
                            <i class="fa fa-plus"></i> Ajouter
                        </a>
                    </div>
                    <div class="col-sm-2">
                        {!! Form::open(['route' => 'entities.search','method' => 'get']) !!}

                        <div class="input-group input-group">
                            {!! Form::text('q' , null , array( 'class' => 'form-control' , 'placeholder' => 'Recherche...' ) ) !!}
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-info btn-flat">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
            <div class="box-body">
                <table role="grid" class="table table-bordered table-striped dataTable">
                    <thead>
                    <tr>
                        <th>Nom & Prénom</th>
                        <th>Compte Facebook</th>
                        <th>Compte Twitter</th>
                        <th>Compte Instagram</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ( $items as $item )

                        <tr>
                            <td>{{ $item->name }} {{ $item->lastname }}</td>
                            <td>{{ $item->facebook }}</td>
                            <td>{{ $item->twitter }}</td>
                            <td>{{ $item->instagram }}</td>
                            <td>

                                <i style="color: @if( $item->active ) #008d4c @else #dd4b39 @endif" class="fa fa-eye"></i>
                            </td>
                            <td>
                                <a href="{{ route('entities.edit' , array( $item ) ) }}" class="btn btn-xs btn-info">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" data-href="{{ route( 'entities.delete', array( $item ) ) }}" data-toggle="modal" data-target="#sup"  class="btn btn-xs btn-danger">
                                    <i class="fa fa-close"></i>
                                </a>

                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="row">
                    <div class="col-sm-5">

                    </div>
                    <div class="col-sm-7">
                        <div class="pull-right">
                            {!! $items->render() !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-footer-->
        </div>


    </section>

    <div class="modal fade" id="sup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                </div>
                <div class="modal-body">
                    Êtes vous sûr de vouloir supprimer cette entité
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
@stop


@section('foot')
    <script type="text/javascript">
        $('#sup').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    </script>
@stop