
		<div class="row">
                    @foreach(db::table('product')->get() as $lvhd)
					<?php if($_GET["key_search"] == $lvhd->name){ ?>
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-8 huhu">
						<div class="acl">
                            <div class="the_anh">
                                <a href="{{$lvhd->product_alias}}">
                                   <?php          
                                           $img_xs = json_decode($lvhd->image_list);
                                           if($img_xs == null){
                                           ?>
                                        <img src="https://bizweb.dktcdn.net/100/057/112/themes/74363/assets/no-image.jpg?1556185055601" alt="">
                                        <?php }else{
                                           if(isset($img_xs)==true) {
                                                 foreach ($img_xs as $img_x) {
                                                 
                                           ?>
                                        <a href="{{$lvhd->product_alias}}" title="{{$lvhd->name}}">
                                            <img src="<?php echo $img_x->url;?>" alt="{{$lvhd->name}}" class="" style="max-width:100%">
                                        </a>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php } ?>
                                </a>
                            </div>
						</div>
					</div>
						<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 huhu">
                            <div class="ttanh">
                                <div class="link_trang">
                                    <a href="{{url($lvhd->product_alias)}}">{{$lvhd->name}}</a>
                                </div>
        
                                <div class="time_trang">
                                    <div class="icon_lich">
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </div>
        
                                    <div class="thong_tin_time">
                                        {{$lvhd->created_at}}
                                    </div>
                                </div>
                            </div>  
						</div>
					<?php } ?>
                     @endforeach

               </div>  