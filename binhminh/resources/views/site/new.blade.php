@include('site.head')

<div class="the_dieu_huong">
  <div class="container">
      <b>
          <a href="./">trang chủ</a> -> <a href="./{{$new->new_alias}}"><?php echo $new->name ?></a> 
      </b>
  </div>
</div>

<?php echo $new->content; ?>


@include('site.footer')
