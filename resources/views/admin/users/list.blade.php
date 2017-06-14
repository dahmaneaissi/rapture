@extends('admin/layouts/master')

@section('content')




    <section class="content-header">
        <h1>
            {{ $title }}
        </h1>
    </section>

    <section class="content">



        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $title }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table role="grid" class="table table-bordered table-striped dataTable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom & Prénom</th>
                        <th>Date de naissance</th>
                        <th>Age an(s)</th>
                        <th>E-Mail</th>
                        <th>Téléphone</th>
                        <th>Willaya</th>
                        <th>Date & Heure</th>
                        <th>Profil Facebook</th>
                        <th>Photo</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ( $items as $user )

                        <tr>
                            <td></td>
                            <td><i class="fa fa-user fa-fw"></i> {{ $user->name }} {{ $user->lastname }}</td>
                            <td>{{ $user->birthday }}</td>
                            <td>{{ $user->birthday }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->tel }}</td>
                            <td>{{  $user->willaya }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>

                                {{ $user->fb_profil }}
                            </td>
                            <td>


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
                        Total {{ $count }}
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
@stop






