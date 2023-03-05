@if (Session::has('message2'))
    <div class="alert alert-info" id="popup">{{ Session::get('message2') }}</div>
@endif
<script>
    setTimeout(function(){
        document.getElementById("popup").style.display = "none";
    }, 1000);
</script>