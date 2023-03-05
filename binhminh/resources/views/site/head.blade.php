﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if(isset($product)){?> <title>{!! $product->name !!}</title>
    <meta name="keywords" content="{!! $product->the_tu_khoa !!}" /> 
	<meta property="og:description" content="{!! $product->the_gioi_thieu !!}" />
	<?php 
         }else if(isset($cat)) {
		  
		  echo " 
						<title>".$cat->name."</title>";
         ?>
    <meta name="keywords" content="<?php echo $cat->content_cat;?>" />
    <meta property="og:description" content="<?php echo $cat->excerpt_cat?>" /> <?php
         }else {
			 if(isset($title)) {
         echo "<title>".$title."</title>";
         }}  ?>
    <title>Document</title>

        <link rel="stylesheet" href="./public/css/bootstrap.min.css">  
        <link rel="stylesheet" href="./public/css/swiper-bundle.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="./public/js/jquery.slim.min.js"></script>
        <script src="./public/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="./public/css/tintucdulich.css">
        <link rel="stylesheet" href="./public/css/gioithieu.css">
        <link rel="stylesheet" href="./public/css/single.css">

        <link rel="stylesheet" href="./public/css/home.css">
        <style type="text/css">
          #goTop { 
            bottom: 50px; 
            cursor: pointer; 
            display: none; 
            border-radius: 50%;
            box-shadow: 0px 2px 2px 1px rgb(208, 208, 208);
            font-size: 10px;
            position: fixed; 
            right: 10px;
            z-index: 10000;
            padding: 10px;
            color: #000;
          }

          #goTop:hover{
            background-color: #446084;
            color: #fff;
          }
        </style>
</head>

<body>
    <div class="menuong">
        
    </div>
    <!-- -----------------------menu----------------------- -->
    <div class="menu fixed-top">
      <div class="container hihi">
        <div class="menu_ctn d-flex">
          <div class="logo_menu">
            <a href="/"><?php home_field($all_field_home,2); ?></a>
          </div>
          <ul class="d-flex list-unstyled text-uppercase ml-2 mt-4">	
            <li class="nav-item dropdown position-relative menu_search">
              <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-magnifying-glass"></i>
              </a>
              <ul class="menu_phu1 dropdown-menu d-none list-unstyled text-uppercase m-0" aria-labelledby="navbarDropdown">
                <li>
                  <a class="dropdown-item new_dropdown_item" href="#">
                    <div class="form_menu_phu_1">
                      <form role="search1" method="post" id="searchform1" action="tim-san-pham/{search_site}">
                        <input type='text' value='' name="search_site" id="s" placeholder="nhap tu khoa..."/>
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                      </form>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
            <?php
                foreach ($menu_top as $value) {
                  $jsons=json_decode($value->content,1);
                }  
                //  var_dump($jsons); 
                showCategories_menu_top_one_header($jsons,'');
            ?>
          </ul>
        </div>
      </div>
      
      <div class="container-fluid d-lg-none haha">  
        <div class="row d-flex align-items-center py-3 m-0">
          <label for="input-check" class="icon-menu pl-0">
            <i class="fa-solid fa-bars"></i>
          </label>
          <input type="checkbox" class="input-mobile d-none" id="input-check">
          <label for="input-check" class="nav-overlay"></label>

          <div class="logo_menu mx-auto">
            <a href="/"><img src="./public/img/logo-binh-minh.png" alt=""></a>
          </div>

          <div class="nav-mobile py-5">
            <label for="input-check" class="nav-mobile_close">
              <i class="fa-solid fa-xmark"></i>
            </label>

            <div class="logo_menu align-items-center">
              <img src="./public/img/logo-binh-minh.png" alt="">
            </div>
			
			<div class="form_menu_phu_1">
						<form role="search1" method="get" id="searchform1" action="tim-san-pham/{search_site}">
							<input type='text' value='' name="search_site" id="s" placeholder="nhap tu khoa..."/>
							<button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>
            <?php
                
                  foreach ($menu_top as $value) {
                    $jsons=json_decode($value->content,1);
                  }  
                  //  var_dump($jsons); 
                  showCategories_menu_top_mobile_header($jsons,'');
              ?>
			  
              
          </div>
        </div>
      </div>
    </div>
    <!-- -------------------------------------------------- -->
	