@if ( Session::has('message') )

<div class="alert alert-{{ Session::get('class') }}">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    {{ Session::get('message') }}
</div>

<script type="text/javascript">
    setTimeout(function(){
        $(".alert").slideUp(600);
    }, 3000);
</script>

@endif