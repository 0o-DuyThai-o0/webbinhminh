@include('site.head')
@include('site.slide')
<div class="baogia">
	 <div class="container">
	 	 <div class="row">
	 	 	 <div class="noidung_baogia">
	 	 	 	 @foreach($baogia as $bg)
	 	 	 	    <h3 class="text-center name_baogia"> {{ $bg->name}}</h3>
	 	 	 	    <h4 class="excerpt_bg"> <?php  echo $bg->excerpt; ?></h4>
	 	 	 	    <div class="content">
	 	 	 	    	 <?php echo $bg->content; ?>
	 	 	 	    </div>
	 	 	 	 @endforeach
	 	 	 </div>
	 	 </div>
	 </div>
</div>
@include('site.footer')