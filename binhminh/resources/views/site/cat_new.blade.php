@include('site.head')
    <div class="container">
        <div class="link_danh_muc_tin_tuc">
            <a href="{{ $list_n->new_alias}}">{{ $list_n->name}}</a>
        </div>
    </div>    

    @foreach($list_new as $list_n)
    <div class="clearfix" style="margin-bottom: 20px;">
    <div class="w_30 fl-l">
        <?php
            $img_xs = json_decode($list_n->image_list);
            if($img_xs == ""){

            }
        ?>
        <img src="http://xetaithanhdanh.com/public/uploads/files/347x237_crop_thep_viet_duc_143518_1786d000f942e79c9c862bb3b28bfb29.jpg" alt="">
        <?php  
            if(isset($img_xs)==true) {
                foreach ($img_xs as $img_x) { 
        ?>

        <a href="{{ $list_n->new_alias}}" class="mn_bv_text">{{ $list_n->name}}</a>
        <p>
        <?php echo $list_n->news_excerpt; ?>
        </p>
    </div>
    </div>
    @endforeach
@include('site.footer')















































































































































































































































