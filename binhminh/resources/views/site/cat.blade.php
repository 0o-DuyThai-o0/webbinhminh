@include('site.head')

<div class="the_dieu_huong">
    <div class="container">
        <b>
            <a href="./">trang chủ</a> -> <a href="./{{$cat->cat_alias}}"><?php echo $cat->name ?></a>  
        </b>
    </div>
</div>

<div class="tin_tuc_du_lich">
    <div class="container">
        <div class="name_ttdl">
            <h3>CATEGORY ARCHIVES: TIN TỨC DU LỊCH</h3>
        </div>

        <div class="tt_ttdl_ab">
            Tổng hợp về du lịch Đà Nẵng và những địa phương lân cận. Các địa điểm vui chơi thú vị và những lưu ý được chúng tôi cập nhật sẽ giúp bạn rất nhiều để chinh phục những nẻo đường Đà Nẵng.
        </div>

        @foreach($bat_ca_shbet as $lvhd)

            <div class="chua_the_a">
                <div class="row">
                    <a href="{{$lvhd->product_alias}}">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 border-right huhu">
                            <a href="{{$lvhd->product_alias}}" title="{{$lvhd->name}}">
                                <div class="all_the">
                                    <div class="the_anh_ttdl">
                                        <div class="dong_con_anh text-center">
                                            <b>29<br>
                                            Th10</b>
                                        </div>

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
                                                     <img src="<?php echo $img_xs->url;?>" alt="{{$lvhd->name}}" class="">
                                                 </a>
                                                 <?php } ?>
                                                 <?php } ?>
                                                 <?php } ?>
                                         </a>
                                    </div>
                                </div>  
                            </a>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 border-right huhu">
                            <a href="{{$lvhd->product_alias}}" title="{{$lvhd->name}}">
                                <div class="all_the">
                                    <div class="mota_ttdl">
                                        <div class="name_mota_tt">
                                            <b>
                                                {{$lvhd->name}}
                                            </b>
                                        </div>
            
                                        <div class="about_mota_tt">
                                            {{$lvhd->the_gioi_thieu}}	
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach

        <div class="menu_duoi_bo_tron">
            <div class="chua_chap">
                <a href="#" class="the_div_bo_tron">
                    <div class="vong_tron_duoi">
                        <i class="fa-solid fa-angle-left"></i>
                    </div>
                </a>

                <a href="#" class="the_div_bo_tron">
                    <div class="vong_tron_duoi">
                        1
                    </div>
                </a>

                <a href="#" class="the_div_bo_tron">
                    <div class="vong_tron_duoi">
                        2
                    </div>
                </a>

                <a href="#"  class="the_div_bo_tron">
                    <div class="vong_tron_duoi action">
                        3
                    </div>
                </a>

                <a href="#" class="the_div_bo_tron bodi">
                    <div class="vong_tron_duoi">
                        4
                    </div>
                </a>

                <a href="#" class="the_div_bo_tron bodi">
                    <div class="vong_tron_duoi">
                        5
                    </div>
                </a>

                <a href="#" class="the_div_bo_tron bodi">
                    <div class="vong_tron_duoi">
                        6
                    </div>
                </a>

                <a href="#" class="the_div_bo_tron">
                    <div class="vong_tron_duoi">
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

@include('site.footer')