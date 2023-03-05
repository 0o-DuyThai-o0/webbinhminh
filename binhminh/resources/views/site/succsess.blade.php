@if (Session::has('message1'))
    <div class="alert alert-info" id="popup">{{ Session::get('message1') }}</div>
@endif
<script>
    setTimeout(function(){
        document.getElementById("popup").style.display = "none";
    }, 5000);
</script>