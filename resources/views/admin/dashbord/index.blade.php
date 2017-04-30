@extends('admin/layouts/master')

@section('content')

    <section class="content-header">
        <h1>
            {{ $title }}
            @if( !empty($subtitle ))
                <small>{{ $subtitle }}</small>
            @endif
        </h1>
    </section>

    <section class="content">

        <div class="callout callout-info">
            <h4>Reminder!</h4>

            <ul>
                <li>C’est moi le meilleur en italien donc c’est moi ton cavalier, Donovitz c’est le deuxième meilleur se sera ton cameraman italien et Omar c’est le troisième meilleur il fera l’assistant de Doni.</li>
                <li>Mais je cause pas italien !</li>
                <li>Ouais c’est ce que je dit t’es le troisième meilleur. Il suffit que tu fermes ta gueule ! Je serais toi je m’entrainerais tout de suite...</li>
            </ul>

        </div>

    </section>
@stop