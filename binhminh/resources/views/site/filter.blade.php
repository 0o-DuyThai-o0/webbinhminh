@include('site.head')
  <!--Heading Banner Area Start-->
    <div class="heading-banner-area pt-30">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-banner">
                       <div class="breadcrumb">
                          <a href="/"> Trang chủ / </a>
                         <a href="/<?php 
                              if(App\Cat::find($cat->id)){
                                 echo App\Cat::find($cat->id)->cat_alias; 
                              }
                           ?>">
                            <?php 
                              if(App\Cat::find($cat->id)){
                                 echo App\Cat::find($cat->id)->name; 
                              }
                           ?>
                         </a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-list-grid-view-area mt-20">
        <div class="container">
            <div class="row">
              <section class="main_container collection margin-bottom-30 col-md-9 col-lg-9 col-lg-push-3 col-md-push-3">  
                 <div class="text-sm-left inline-block"> 
                    <h1 class="title-head margin-top-0">
                       <?php 
                              if(App\Cat::find($cat->id)){
                                 echo App\Cat::find($cat->id)->name; 
                              }
                           ?>
                    </h1>
                    <div class="tt hidden-sm hidden-xs">
                      <span class="hidden-sm hidden-xs">(Tất cả <?php echo $count_prodcut_cat;?> sản phẩm)</span>
                    </div>
                  </div>
                <div class="category-products products">
                  <section class="products-view products-view-grid collection_reponsive"> 
                    <div class="sortPagiBar">
              <div class="srt">
                <div class="wr_sort col-sm-12">
                  <div class="text-sm-right">
                    <div id="sort-by" class="sorby_xxx">
                       {!! Form::open(array('method' => 'POST','name'=>'myForm_cat','action' => array('Site\SanphamController@orderby_cat_get',$cat->cat_alias,$cat->id ))) !!}
                          <select id="" class="form-control" data-default-sort="manual" name="orderby" onchange="submitform_cat();">
                            <option value="a">Mặc định</option> 
                            <option value="b">Giá: Thấp tới Cao</option>
                            <option value="c">Giá: Cao tới Thấp</option>
                            <option value="d">Ngày: Mới tới Cũ</option>
                            <option value="e">Ngày: Cũ tới Mới</option>
                          </select>
                      {!! Form::close() !!}
                      <script type="text/javascript">
                              function submitform_cat()
                              {
                                document.myForm_cat.submit();
                              }
                    </script>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                    <div class="row row-noGutter-2">
                      @foreach($products as $list_bv)
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                          <div class="product-col">
                            <div class="product-box">                             
                              <div class="product-thumbnail">
                                <div class="sale-flash new">Mới</div>
                                <?php          
                                      $img_xs = json_decode($list_bv->image_list);
                                      if($img_xs == null){
                                      ?>
                                      <img src="https://bizweb.dktcdn.net/100/057/112/themes/74363/assets/no-image.jpg?1556185055601" alt="">
                                    <?php }else{
                                      if(isset($img_xs)==true) {
                                            foreach ($img_xs as $img_x) {
                                            
                                    ?>
                                     <a href="/{{$list_bv->product_alias}}" class="image_link display_flex" data-images="<?php echo $img_x->url;?>"><img class="img-responsive" src="<?php echo $img_x->url;?>"  alt=""> </a>
                                  <?php } ?>
                                  <?php } ?>
                                  <?php } ?>
                              <!--   <div class="product-action-grid clearfix">
                                    <div action="" method="post" class="variants form-nut-grid" data-id="product-actions-8903158" enctype="multipart/form-data">
                                        <div style="display: inline-flex;">
                                            <input class="hidden" type="hidden" name="variantId" value="14813495" />
                                            <button class="btn-cart button_wh_40 left-to index-mua-ngay" title="Chọn sản phẩm"  type="button" onclick="window.location.href='{{$list_bv->product_alias}}'" >
                                                Mua ngay
                                            </button>
                                            {!! Form::open(array('method' => 'POST','id'=>'header-search','action' => array('Site\SanphamController@post_session_don_hang' ))) !!}
                                            <input type="hidden" name="produc_id_cart" value="{{$list_bv->id}}">
                                            <input class="text_number" type="hidden" name="so_luong" id="french-hens" value="1">
                                            <button type="submit" class="index-gio-hang"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                                            
                                            {!! Form::close() !!}
                                            <a title="Yêu thích" class="button_wh_40 btn_35_h iWishAdd iwishAddWrapper" href="javascript:;" data-customer-id="0" data-product="8903158" data-variant="14813495" style="margin: 0 0 0 5px; border: 0;"><i class="fa fa-heart-o index-yeu-thich"></i></a>
                                            <a  title="Bỏ thích" class="button_wh_40 btn_35_h iWishAdded iwishAddWrapper iWishHidden" href="javascript:;" data-customer-id="0" data-product="8903158" data-variant="14813495"><i class="fa fa-heart"></i></a>
                                        </div>
                                    </div>
                                </div> -->
                              </div>
                              <div class="product-info effect a-left">
                              <!--   <div class="action_image">
                                  <div class="owl_image_thumb_item hidden-md hidden-sm hidden-xs">
                                    <ul class="product_image_list owl-carousel not-aweowl">
                                      <?php
                                        $img_xs=json_decode($list_bv->image_lien_quan,1);
                                        if($img_xs == null ){


                                        ?>
                                        <div> không có ảnh </div>
                                        <?php } else {
                                        if ($img_xs == true){
                                        ?>
                                        <?php foreach ($img_xs as $key => $value) { ?>
                                        <li class="item item_image" data-image="<?php echo $value['url'];?>">
                                            <img src="<?php echo $value['url'];?>">
                                        </li>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php } ?>
                                    </ul>
                                  </div>
                                </div> -->
                                <div class="info_hhh hover_effect_content">
                                  <h3 class="product-name product-name-hover"><a class="text2line" href="/{{$list_bv->product_alias}}" title="Converse 1970s vàng cao cổ">{{$list_bv->name}}</a></h3>
                                 <div style='color:red;font-weight:bold'>
                                      <span class="price product-price" style="float: left;">
                                          {{ number_format($list_bv->price,0, ',', '.') }}&nbsp;  ₫                                              
                                      </span>
                                      <span style="float: right;"><a class="lien-he-sp" href="/lien-he">Liên Hệ</a></span>
                                  </div>
                                </div>
                              </div>
                            </div>      
                          </div>
                        </div>
                      @endforeach      
                    </div>
                    <div class="text-left">
                      <nav class="clearfix">
                       <?php
                        if(count($products)==0) {
                          echo "<h2 class='text-center'>Không có bài viết nào </h2>";
                        }
                        $products->setPath('/filter-san-pham/'.$min_price_title.'/'.$max_price_title.'');
                        echo $products->render();
                        ?>
                      </nav>
                    </div>
                  </section>    
                </div>
              </section>
              <div class="col-lg-3 col-md-3 margin-bottom-50 col-lg-pull-9 col-md-pull-9">
                <aside id="woocommerce_product_categories-2" class="sidebar left-content">
                  <aside class="aside-item sidebar-woocommerce widget_product_categories collection-woocommerce widget_product_categories">
                    <div  class="bg-dmsp">
                    <p class="menu-slide-dmsp">
                        <a href="/">Danh Mục Sản Phẩm</a>
                    </p>
                </div>
                <ul class="menu-slide">
                     <?php
                   foreach ($menu_tag as $value) {
                   $jsons=json_decode($value->content,1);
                   }
                  //  var_dump($jsons); 
                   showCategories_menu_top_sidebar($jsons,'',$all_field_home);
                 ?>
                </ul>
                  </aside>
                </aside>
                <div class="widget widget-price-slider">
                    <h3 class="widget-title">Lọc theo giá</h3>
                    <div class="widget-content">
                               <div class="filter-product">
                    {!! Form::open(array('class' => '','method' => 'POST','action' => array('Site\SanphamController@getdata_filter'))) !!}
                     <input type="text" class="js-range-slider" name="my_range" value="" />
                     <input type="hidden" name="cat_id" value="<?=$cat->id;?>">
                    <div class="filte_cat">
                                    <span class="filte_loc">
                                       Lọc
                                    </span>
                      <span> Giá : 


                        <?php

                        
                                echo number_format($min_price,0, ',', '.')." đ";
                         
                            ?>
                        -   
                          
                         <?php

                               echo number_format($max_price,0, ',', '.')." đ";
                               
                           
                            ?>


                      </span>
                      <input type="hidden" id="min_price_new" name="min_price" value="<?php echo $min_price;?>">
                      <input type="hidden" id="max_price_new" name="max_price" value="<?php echo $max_price;?>">
                    </div>
                    <input type="submit" class="btn btn-block btn-secondary filter" value="Lọc">
                     {!! Form::close() !!}
                   </div>
                    </div>
                </div>
                
              </div> 
            </div>
        </div>
    </div>
</style>
 @include('site.footer')
<!-- END SHOP  -->
@include('site.footer')
<script type="text/javascript">
  $(".js-range-slider").ionRangeSlider({
    skin: "big",
    type: "double",
    min: <?php

                          if(isset($min_price_new->price)){
                            if($min_price_new->price>0){
                             echo $min_price_new->price;
                             
                            }else {
                                echo $min_price_old->price;
                            }
                           }
                            ?>,
    max: <?php

                          if(isset($max_price_new->price)){
                            if($max_price_new->price>0){
                                  echo $max_price_new->price;
                            }else {
                               echo $max_price_old->price;
                               
                            }
                           }
                            ?>,
    grid: false,             // show/hide grid
    force_edges: false,     // force UI in the box
    hide_min_max: false,    // show/hide MIN and MAX labels
    hide_from_to: false,    // show/hide FROM and TO labels
    block: false            // block instance from changing
  });
  // log giá trị min và max của thanh cuộn
  $(".js-range-slider").on("change", function () {
    var $inp = $(this);
    var v = $inp.prop("value");     // input value in format FROM;TO
    var from = $inp.data("from");   // input data-from attribute
    var to = $inp.data("to");       // input data-to attribute
    $("#min_price_new").val(from);
    $("#max_price_new").val(to);

  });
</script>
