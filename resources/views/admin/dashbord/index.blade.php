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
                <li>Je ferai la cuisine, tu parleras !</li>
                <li>Tu veux que je parle ? Avec des mots ? pourquoi crois tu qu’ils ont inventé les fleurs ?!</li>
            </ul>


        </div>

    </section>
@stop