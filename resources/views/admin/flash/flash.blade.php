@if ( Session::has('message') )

    <div class="callout callout-{{ Session::get('class') }}">
        <p>{{ Session::get('message') }}</p>
    </div>

    <script type="text/javascript">
        setTimeout(function(){
            $(".callout").slideUp(600);
        }, 3000);
    </script>

@endif