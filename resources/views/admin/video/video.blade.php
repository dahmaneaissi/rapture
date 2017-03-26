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

        <div id="player"></div>

    </div>
</div>
<!-- /.row -->
@stop


@section('footer')

<script type="text/javascript">

    // 2. This code loads the IFrame Player API code asynchronously.
    var tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // 3. This function creates an <iframe> (and YouTube player)
    //    after the API code downloads.
    var player;
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
            height: '360',
            width: '640',
            videoId: 'Q4BotUUxj3k',
            playerVars: {
                'autohide': 0,
                'controls': 0,
                'disablekb': 1,
                'rel': 0,
                'showinfo': 0,
                'fs': 0,
                'modestbranding' : 1,
                'enablejsapi': 1,
                'origin' : 'fbapp.dev'
            },
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
    }

    // 4. The API will call this function when the video player is ready.
    function onPlayerReady(event) {
        event.target.playVideo();
    }

    // 5. The API calls this function when the player's state changes.
    //    The function indicates that when playing a video (state=1),
    //    the player should play for six seconds and then stop.
    var done = false;
    function onPlayerStateChange(event) {
        /*if (event.data == YT.PlayerState.PLAYING && !done) {
            setTimeout(stopVideo, 6000);
            done = true;
        }*/
        if (event.data == YT.PlayerState.ENDED) {

            OnVideoEnd();

        }else{
            event.target.playVideo();
        }

    }
    function stopVideo() {
        player.stopVideo();
    }

    function OnVideoEnd()
    {
        window.location.href = '<?php echo route('EndVideo') ?>';
    }
</script>

@stop