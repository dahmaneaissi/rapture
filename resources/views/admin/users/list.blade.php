@extends('admin/layouts/master')

@section('content')

    <section class="content-header">
        <h1>
            {{ trans('users.backend.list-title') }}
        </h1>
    </section>

    <section class="content">

        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-sm-10">

                        @if( Can( 'users.create' ) )
                            <a href="{{ route('users.create') }}" class="btn btn-success">
                                <i class="fa fa-plus"></i> Ajouter
                            </a>
                        @endif

                    </div>
                    <div class="col-sm-2">
                        @if( Can( 'users.search' ) )

                            {!! Form::open(['route' => 'users.search','method' => 'get']) !!}
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
            <div class="box-body">
                <table role="grid" class="table table-bordered table-striped dataTable">
                    <thead>
                    <tr>
                        <th>{!! sort_by('firstname' , 'Prénom') !!}</th>
                        <th>{!! sort_by('lastname' , 'Nom') !!}</th>
                        <th>{!! sort_by('email' , 'E-Mail') !!}</th>
                        <th>Roles</th>
                        <th>{!! sort_by('created_at' , 'Date & Heure') !!}</th>
                        <th>{{ trans('global.backend.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ( $items as $item )

                        <tr>
                            <td>{{ $item->firstname }}</td>
                            <td>{{ $item->lastname }}</td>
                            <td>{{ $item->email }}</td>
                            <th>
                                @foreach( $item->roles as $role )
                                        <span class="label label-primary">{{ $role->title }}</span>
                                    @endforeach
                            </th>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                            <td>

                                @if( Can( 'users.edit' ) )
                                    <a href="{{ route('users.edit' , array( $item ) ) }}" class="btn btn-xs btn-info">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                @endif

                                @if( Can( 'users.delete' ) )
                                    <a href="#" data-href="{{ route( 'users.delete', array( $item ) ) }}" data-toggle="modal" data-target="#sup"  class="btn btn-xs btn-danger">
                                        <i class="fa fa-close"></i>
                                    </a>
                                @endif

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
                        {{ trans('global.backend.total') }} {{ $items->total() }}
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

    @include('admin.alert.modal.confirmation')
@stop






