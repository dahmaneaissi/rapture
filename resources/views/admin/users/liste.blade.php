@extends('admin/layouts/master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Participants <i class="fa fa-users fa-fw"></i> {{ $users->total()  }}</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">


    <div class="col-lg-12">
        @include('admin/flash/flash')

        <div class="dataTable_wrapper">

            @if ( count( $users ) )


            <table class="table table-striped table-bordered " id="">
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
                <?php $classement = ( $users->currentPage() - 1) * $users->perPage() ;?>
                    @foreach ( $users as $user )
                    <?php $classement ++ ?>
                    <tr>
                        <td>{{ $classement }}</td>
                        <td><i class="fa fa-user fa-fw"></i> {{ $user->name }} {{ $user->lastname }}</td>
                        <td>{{ $user->birthday }}</td>
                        <td>{{ getAge( $user->birthday ) }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->tel }}</td>
                        <td>{{ getWillaya( $user->willaya ) }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            {{--<a target="_blank" href="{{ $user->fb_profil }}"><i class="fa fa-facebook"></i></a>--}}
                            {{ $user->fb_profil }}
                        </td>
                        <td>
                            {{--<a href="#" data-href="{{ str_replace( 'index.php' , '' , URL::to('/')  ) . '/medias/images/' . $user->medias->file_name }}" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></a>--}}
                            {{ str_replace( 'index.php' , '' , URL::to('/')  ) . '/medias/images/' . $user->medias->file_name }}
                        </td>
                    </tr>

                    @endforeach
                @else
                    <div class="alert alert-warning">
                        Pas de résultats !
                    </div>
                @endif

                </tbody>
            </table>

                {!! $users->render() !!}
        </div>
        <!-- /.table-responsive -->

        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <img class="img img-responsive">
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

@stop

@section('footer')
<script type="text/javascript">
    $('#myModal').on('show.bs.modal', function(e) {
        $(this).find('.img').attr('src', $(e.relatedTarget).data('href') );
    });
</script>
@stop
