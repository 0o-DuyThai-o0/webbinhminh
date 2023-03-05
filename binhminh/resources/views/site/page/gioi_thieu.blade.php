@include('site.head')
@include('site.slide')
 <div class="bg_img_2_cat">
 	 <div class="container">
 	 	 <div class="row">
 	 	 	 <div class="gioithieu_content">
 	 	 	 	 @foreach($gioi_thieu as $gt)
	             <div class="content_gt">
	             	 <?php echo $gt->content; ?>
	             </div>
 	 	 	 	 @endforeach
 	 	 	 </div>
 	 	 </div>
 	 </div>
 </div>
@include('site.footer')