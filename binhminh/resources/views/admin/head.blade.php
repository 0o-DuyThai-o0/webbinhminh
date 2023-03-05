<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="{!!  asset('public/admin/css/bootstrap.min.css'); !!}">
  <link rel="icon" href="http://giaydep24h.vn/public/admin/images/icon_st.png" type="image/x-icon" />
	<link rel="stylesheet" href="{!!  asset('public/admin/css/style.css'); !!}">
	<link rel="stylesheet" href="{!!  asset('public/admin/css/simple-sidebar.css') !!}">
  <link 
  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--
<script src="http://cdn.ckeditor.com/4.5.7/full/ckeditor.js1"></script> 
-->	
	<script src="{!!  asset('public/admin/fckeditor/ckeditor/ckeditor.js'); !!}"></script>
	<script src="{!!  asset('public/js-s/jquery-1.11.3.min.js'); !!}"></script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="{!!  asset('public/admin/fckeditor/ckfinder/ckfinder.js'); !!}"></script>	
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top navbar-fixed-top-son">
      <div class="container-fluid" style="padding-right: 0px;">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <a href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars fa-2x icon-fa-home-dashboard" aria-hidden="true"></i></a>
          <a style="padding-top: 13px;margin-left: 12px;" class="navbar-brand" target="_blank" href="{!!  asset('/admin'); !!}"> 
             <img class="img-dashboard" src="{{ asset('public/admin/images/logo-top-one.png')}}" alt="">
          </a>
        </div>

		<div id="navbar" class="navbar-collapse collapse" style="background-color: #518ca3">
              <ul class="nav navbar-nav navbar-right">
{{--                <li class=""><a target="_blank" href="{!!  asset('/'); !!}">Home index</a></li>--}}
                  <li style="padding-top: 2%;">
                      <a href="/binhminh"><i class="fa fa-globe"></i> View Website</a>
                  </li>
                <li class="dropdown">

                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                      Hello:
                      <img style="width: 35px;height: 35px;" src="https://cdn1.iconfinder.com/data/icons/system-icons-4/1024/Admin-512.png" alt="">
                      <?php
				if(isset($_SESSION['admin'])==true) { 
					echo $_SESSION['admin'];
					?>
					
				<?php 	} ?>  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
					<li role="separator" class="divider"></li>
                    <li><a href="{{ asset('admin/logout') }}"> Logout </a> </li>
                    <li role="separator" class="divider"></li>

                  </ul>
                </li>
              </ul>
            </div>
      </div>
    </nav>
    
