@if (Session::has('message1'))
    <div class="alert alert-info" id="popup">
    	 <img class="img-susccess" src="http://tamminhduong.com/wp-content/uploads/2017/01/dau-v.png" alt="">
    	{{ Session::get('message1') }}
	</div>
@endif
<script>
    setTimeout(function(){
        document.getElementById("popup").style.display = "none";
    }, 2000);
</script>