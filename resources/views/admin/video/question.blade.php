@extends('admin/layouts/master')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{ $title }}</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>


<div class="row">
    <div class="col-lg-6">

        <div class="alert alert-success">
            Redirection vers la question <strong>OK!</strong>
        </div>
        <h2>Ceci est une question ?</h2>
        <div class="radio">
            <label>
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                Réponse 1
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                Réponse 2
            </label>
        </div>


    </div>
</div>
<!-- /.row -->
@stop


@section('footer')


@stop