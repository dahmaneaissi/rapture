@extends('admin/layouts/master')

@section('content')

    <section class="content-header">
        <h1>
            {{ trans('permissions.backend.list-title') }}
        </h1>

    </section>

    <section class="content">

        @include('admin/flash/flash')

        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-sm-10">

                        @if( Can( 'permissions.create' ) )
                            <a href="{{ route('permissions.create') }}" class="btn btn-success">
                                <i class="fa fa-plus"></i> Ajouter
                            </a>
                        @endif

                    </div>
                    <div class="col-sm-2">
                        @if( Can( 'permissions.search' ) )

                            {!! Form::open(['route' => 'permissions.search','method' => 'get']) !!}
                            <div class="input-group input-group">
                                {!! Form::text('q' , null , array( 'class' => 'form-control' , 'placeholder' => 'Recherche...' ) ) !!}
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-info btn-flat">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            {!! Form::close() !!}

                        @endif
                    </div>
                </div>

            </div>

            @if( count( $items ) )
                <div class="box-body">


                    <table role="grid" class="table table-bordered table-striped dataTable">
                        <thead>
                        <tr>
                            <th>{!! sort_by('title' , 'Titre' )  !!}</th>
                            <th>{!! sort_by('slug' , 'Slug' )  !!}</th>
                            <th>{!! sort_by('description' , 'Description' )  !!}</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ( $items as $item )

                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>{{ $item->description }} </td>

                                <td>

                                    @if( Can( 'permissions.edit' ) )
                                        <a href="{{ route('permissions.edit' , array( $item ) ) }}" class="btn btn-xs btn-info">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    @endif

                                    @if( Can( 'permissions.delete' ) )
                                        <a href="#" data-href="{{ route( 'permissions.delete', array( $item ) ) }}" data-toggle="modal" data-target="#sup"  class="btn btn-xs btn-danger">
                                            <i class="fa fa-close"></i>
                                        </a>
                                    @endif

                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>

                </div>


                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-5">
                            {{ trans('global.backend.total') }} {{ $items->total() }}
                        </div>
                        <div class="col-sm-7">
                            <div class="pull-right">
                                {!! $items->appends( Request::except('page'))->render() !!}
                            </div>
                        </div>
                    </div>
                </div>

            @else
                <div class="alert alert-warning">
                    Aucun resultat trouvé !
                </div>
            @endif
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