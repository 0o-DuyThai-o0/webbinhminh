@include('site.head')
    <div class="the_dieu_huong">
        <div class="container">
            <b>
                <a href="./">trang chủ</a> -> <a href="./{{$cat->cat_alias}}"><?php echo $cat->name ?></a> -> <a href="./{{$product->product_alias}}"><?php echo $product->name ?></a>
            </b>
        </div>
    </div>

    <div class="the_dmbv">
        <div class="container">
			<div class="ahihihi">
				<h3 class="entry-title"><?php echo $product->name; ?></h3>	
				<div class="box_noidung" style="padding-top:20px;">
                    <div class="thebaiviet" style="display: flex">
                    </div>
                    <?php echo $product->content; ?>  
                     @include('site.comment')
                </div>
            </div>
        </div>
    </div>

    <div class="sanphamlienquan">
        <div class="container">
            <b>Bài viết liên quan</b>
        </div>
    </div>
    
    @foreach($san_pham_lien_quan as $lvhd)
        <div class="container">
            <li>
                <a href="{{$lvhd->product_alias}}"><?php echo $lvhd->name;?></a>
            </li>   
        </div>
    @endforeach
  
    

@include('site.footer')
