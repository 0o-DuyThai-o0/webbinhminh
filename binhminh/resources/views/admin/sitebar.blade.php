          
<div class="sitebar-admin">
   <div class="row  menu-sitebar-admin">
      <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
         <ul class="nav sidebar-nav">
            <li class="dropdown">
               <a href="#" class="dropdown-toggle bv" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-edit xs-right"></i>  Bài viết <i class="fa fa-angle-down" aria-hidden="true"></i></a>
               <ul class="dropdown-menu" role="menu">
                  <li class=""><a href="{!!  asset('admin/product'); !!}">Tất cả bài viết </a></li>
                  <li><a href="{!!  asset('admin/product/create'); !!}">Tạo mới bài viết</a></li>
               </ul>
            </li>
            <?php if(isset($_SESSION['level'])){
               if($_SESSION['level'] != 0){

               
             ?>
          <?php } else { ?>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-book xs-right"></i>  Danh mục bài viết <i class="fa fa-angle-down" aria-hidden="true"></i></a>
               <ul class="dropdown-menu" role="menu">
                  <li class=""><a href="{!!  asset('admin/cat'); !!}">Tất cả Danh mục</a></li>
               </ul>
            </li>
          <?php } ?>  
          <?php   } ?>  
                     <?php if(isset($_SESSION['level'])){
               if($_SESSION['level'] != 0){

               
             ?>
          <?php } else { ?>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cubes xs-right"></i>  Tin tức <i class="fa fa-angle-down" aria-hidden="true"></i></a>
               <ul class="dropdown-menu" role="menu">
                  <li class=""><a href="{!!  asset('admin/news'); !!}">Tất cả Tin tức</a></li>
                  <li><a href="{!!  asset('admin/news/create'); !!}">Tạo mới Tin tức</a></li>
               </ul>
            </li>
             <?php } ?>  
          <?php   } ?>  
                        <?php if(isset($_SESSION['level'])){
               if($_SESSION['level'] != 0){

               
             ?>
          <?php } else { ?>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-newspaper-o xs-right"></i> Danh mục Tin tức <i class="fa fa-angle-down" aria-hidden="true"></i></a>
               <ul class="dropdown-menu" role="menu">
                  <li class=""><a href="{!!  asset('admin/cat-new'); !!}">Tất cả Danh mục</a></li>
               </ul>
            </li>
             <?php } ?>  
          <?php   } ?>  
                        <?php if(isset($_SESSION['level'])){
               if($_SESSION['level'] != 0){

               
             ?>
          <?php } else { ?>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks xs-right"></i> Menus <i class="fa fa-angle-down" aria-hidden="true"></i></a>
               <ul class="dropdown-menu" role="menu">
                  <li><a href="{!!  asset('admin/menus'); !!}">Tất cả Menus</a></li>
                  <li><a href="{!!  asset('admin/cat/create'); !!}">Tạo mới Menu</a></li>
               </ul>
            </li>
             <?php } ?>  
          <?php   } ?>  
                        <?php if(isset($_SESSION['level'])){
               if($_SESSION['level'] != 0){

               
             ?>
          <?php } else { ?>

            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-comments"></i> comment <i class="fa fa-angle-down" aria-hidden="true"></i></a>
               <ul class="dropdown-menu" role="menu">
                  <li><a href="{!!  asset('admin/comment') !!}">Tất cả Comment</a></li>
               </ul>
            </li>
             <?php } ?>  
          <?php   } ?>  
                        <?php if(isset($_SESSION['level'])){
               if($_SESSION['level'] != 0){ 
             ?>
          <?php } else { ?>

            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-comments" aria-hidden="true"></i>phản hồi comment <i class="fa fa-angle-down" aria-hidden="true"></i></a>
               <ul class="dropdown-menu" role="menu">
                  <li><a href="{!!  asset('admin/reply_comment') !!}">Tất cả phản hồi Comment</a></li>
               </ul>
            </li>
             <?php } ?>  
          <?php   } ?>  
                        <?php if(isset($_SESSION['level'])){
               if($_SESSION['level'] != 0){ 
             ?>
          <?php } else { ?>

            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-user-circle xs-right"></i>  Admin <i class="fa fa-angle-down" aria-hidden="true"></i></a>
               <ul class="dropdown-menu" role="menu">
                  <li><a href="{!!  asset('admin/admin'); !!}">Tất cả Admin</a></li>
                  <li><a href="{!!  asset('admin/admin/create'); !!}">Tạo mới Admin</a></li>
               </ul>
            </li>
             <?php } ?>  
          <?php   } ?>  
                        <?php if(isset($_SESSION['level'])){
               if($_SESSION['level'] != 0){

               
             ?>
          <?php } else { ?>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class=" fa fa-file-image-o xs-right"></i>  Quản lý ảnh <i class="fa fa-angle-down" aria-hidden="true"></i></a>
               <ul class="dropdown-menu" role="menu">
                  <li>
                     <a href="#" onclick="BrowseServer();" >Tất cả ảnh</a>
                  </li>
               </ul>
            </li>
             <?php } ?>  
          <?php   } ?>  
                        <?php if(isset($_SESSION['level'])){
               if($_SESSION['level'] != 0){

               
             ?>
          <?php } else { ?>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class=" fa fa-home xs-right"></i>   Trang chủ  <i class="fa fa-angle-down" aria-hidden="true"></i></a>
               <ul class="dropdown-menu" role="menu">
                  <li><a href="{!!  asset('admin/home'); !!}">Toàn bộ Field Trang chủ </a></li>
                  <li><a href="{!!  asset('admin/home/create'); !!}">Tạo mới Field</a></li>
               </ul>
            </li>
             <?php } ?>  
          <?php   } ?>  
                        <?php if(isset($_SESSION['level'])){
               if($_SESSION['level'] != 0){

               
             ?>
          <?php } else { ?>

             <?php } ?>  
          <?php   } ?>  
            <!-- <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bullseye" aria-hidden="true"></i> Color Product <i class="fa fa-angle-down" aria-hidden="true"></i></a>
               <ul class="dropdown-menu" role="menu">
                  <li><a href="{!!  asset('admin/color'); !!}"> All Color </a></li>
                  <li><a href="{!!  asset('admin/color/create'); !!}"> Màu mới </a></li>
               </ul>
            </li> -->
                        <?php if(isset($_SESSION['level'])){
               if($_SESSION['level'] != 0){

               
             ?>
          <?php } else { ?>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cubes" aria-hidden="true"></i> Định dạng Field <i class="fa fa-angle-down" aria-hidden="true"></i></a>
               <ul class="dropdown-menu" role="menu">
                  <li><a href="{!!  asset('admin/dinh_dang_field'); !!}"> All định dạng </a></li>
                  <li><a href="{!!  asset('admin/dinh_dang_field/create'); !!}"> Định dạng mới </a></li>
               </ul>
            </li>
             <?php } ?>  
          <?php   } ?>  
            <!--
               <li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Chỉnh sửa <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                 <ul class="dropdown-menu" role="menu">
               <li class=""><a href="{!!  asset('admin/edit-footer'); !!}">Chỉnh sửa phần Footer</a></li>
               <li class=""><a href="{!!  asset('admin/edit-lien-he'); !!}">Chỉnh sửa phần Liên hệ</a></li> 
                 </ul>
               </li>  
               -->
         </ul>
      </nav>
   </div>
</div>