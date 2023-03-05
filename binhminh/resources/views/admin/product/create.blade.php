@include('admin.head')
	<div id="wrapper" class="container admin-admin">
	<div class="row">
		<div id="sidebar-wrapper" class="col-md-3">
			@include('admin.sitebar')
		</div>
		<div id="page-content-wrapper" class="col-md-9 admin-content">
			<h2>Thêm Bài viết mới</h2>
      @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
        {!! Form::open(array('action' => 'Admin\ProductController@store')) !!}
				<div class="row add-user">
					<div class="col-md-1">
						Ảnh bài viết 
					</div>
					<div class="col-md-11">
					<div class="row">

						<div class="row" id="demo_create_product">
                                 <?php
                                  $anh_json ="";
                                    for($i=0;$i<10;$i++){
                                     $s='image_create_product'.$i;
                                     if(isset($_SESSION[$s])) {
                                       if($anh_json=='')
                                    {
                                        $anh_json='{"url":"'.$_SESSION[$s].'"}';
                                    }else {
                                        $anh_json=$anh_json.',{"url":"'.$_SESSION[$s].'"}';
                                    }
                                          ?>
                                 <div class="img_x">
                                    <img class="img_avatar" src="{{ $_SESSION[$s] }}">
                                     <input id="" name="add_images_create_product_thang" type="hidden" value='<?php if(isset($anh_json)){echo $anh_json;}?>'>
                                    <input class="btn btn-default xoa_anh_create_product" type="button" value="x">
                                    <input id="so_thu_tu_<?php echo $i;?>" name="so_thu_tu" type="hidden" value="<?php echo $i; ?>">
                                   
                                 </div>
                                 <?php
                                    }
                                    }
                                    
                                    ?>
                                     <input id="json_string_z" name="add_images_create_product_thang" type="hidden" value=''>
                              </div>
                              <div id="add_images_create_product" style="display:none;" name="add_images_create_product">
                              </div>
                              <div class="row">       
                             
                                 <input type="text" name="Image_create" class="btn btn-default" id="Image_create" placeholder="Tìm ảnh" onclick="BrowseServer_create();" readonly="readonly" >
                              </div>
                              <script>
                                 $(document).ready(function(){
                                 
                                 var son_type = $('#Image_create').val(); //lấy gía trị ng dùng gõ son_type
                                 
                                    $("#page-content-wrapper").mousemove(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
                                     // var query = $(this).val(); //lấy gía trị ng dùng gõ
                                      var query=$('#Image_create').val();
                                 
                                      
                                     if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
                                     {
                                       var id = $('.id_img').val();
                                      var query_t = $('#Image_create').val();

                                      var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                                 //alert (_token);
                                 
                                     document.getElementById("Image_create").value = ""; 
                                 
                                 
                                      $.ajax({
                                       url:"/test-js-tt", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                                       method:"POST", // phương thức gửi dữ liệu.
                                       data:{query:query, _token:_token ,son_type:son_type,query_img:query_t,stt_s:0},
                                       
                                       success:function(data){ //dữ liệu nhận về
                                       document.getElementById("demo_create_product").innerHTML = data;         
                                             
                                      }
                                      });

                                      }
                                 
                                    });
                                    
                                 
                                 
                                   $('#page-content-wrapper').on('click', '.xoa_anh_create_product', function() {
                                      var so_thu_tu=$(this).next().val();
                                      
                                     var query=$(this).next().val();
                                 
                                 
                                 
                                       if(so_thu_tu != '')
                                     {
                                      var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                                 
                                 //alert(_token);
                                 
                                 
                                      $.ajax({
                                       url:"/xoa-anh-ajax-tt", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                                       method:"POST", // phương thức gửi dữ liệu.
                                       data:{query:query, _token:_token ,so_thu_tu:so_thu_tu},
                                 
                                       
                                       success:function(data){ //dữ liệu nhận về
                                        var dulieu = $("#json_string_z").val();
                                      
                                       document.getElementById("demo_create_product").innerHTML = data;         
                                      }
                                      });
                                      
                                      
                                      }
                                 
                                 
                                 });
                                 
                                 
                                 
                                 
                                    
                                 });
                              </script>
					</div>
					</div>
				</div>	

  <div class="hr"></div>
                   <!-- ảnh slider  -->
               <!-- <div class="row add-user">
                  <div class="col-md-1"> Ảnh Slider</div>
                  <div class="col-md-11">
					  <div class="row" id="demo_create_product_slider">
                                 <?php
                                  $anh_json ="";
                                    for($i=0;$i<10;$i++){
                                     $s='image_create_product_slider'.$i;
                                     if(isset($_SESSION[$s])) {
                                       if($anh_json=='')
                                    {
                                        $anh_json='{"url":"'.$_SESSION[$s].'"}';
                                    }else {
                                        $anh_json=$anh_json.',{"url":"'.$_SESSION[$s].'"}';
                                    }
                                          ?>
                                 <div class="img_x">
                                    <img class="img_avatar" src="{{ $_SESSION[$s] }}">
                                     <input id="" name="add_images_create_product_slider" type="hidden" value='<?php if(isset($anh_json)){echo $anh_json;}?>'>
                                    <input class="btn btn-default xoa_anh_create_product_slider" type="button" value="x">
                                    <input id="so_thu_tu_<?php echo $i;?>" name="so_thu_tu" type="hidden" value="<?php echo $i; ?>">
                                   
                                 </div>
                                 <?php
                                    }
                                    }
                                    
                                    ?>
                                     <input id="json_string_z" name="add_images_create_product_slider" type="hidden" value=''>
                              </div>
                              <div id="add_images_create_product_slider" style="display:none;" name="add_images_create_product_slider">
                              </div>
                              <div class="row">       
                             
                                 <input type="text" name="Image_create_slider" class="btn btn-default" id="Image_create_slider" placeholder="Tìm ảnh" onclick="BrowseServer_create_slider();" readonly="readonly" >
                              </div>
                              <script>
                                 $(document).ready(function(){
                                 
                                 var son_type = $('#Image_create_slider').val(); //lấy gía trị ng dùng gõ son_type
                                 
                                    $("#page-content-wrapper").mousemove(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
                                     // var query = $(this).val(); //lấy gía trị ng dùng gõ
                                      var query=$('#Image_create_slider').val();
                                 
                                      
                                     if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
                                     {
                                       var id = $('.id_img').val();
                                      var query_t = $('#Image_create_slider').val();

                                      var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                                 //alert (_token);
                                 
                                     document.getElementById("Image_create_slider").value = ""; 
                                 
                                 
                                      $.ajax({
                                       url:"/test-js-tt-slider", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                                       method:"POST", // phương thức gửi dữ liệu.
                                       data:{query:query, _token:_token ,son_type:son_type,query_img:query_t,stt_s:0},
                                       
                                       success:function(data){ //dữ liệu nhận về
                                       document.getElementById("demo_create_product_slider").innerHTML = data;         
                                             
                                      }
                                      });

                                      }
                                 
                                    });
                                    
                                 
                                 
                                   $('#page-content-wrapper').on('click', '.xoa_anh_create_product_slider', function() {
                                      var so_thu_tu=$(this).next().val();
                                      
                                     var query=$(this).next().val();
                                 
                                 
                                 
                                       if(so_thu_tu != '')
                                     {
                                      var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                                 
                                 //alert(_token);
                                 
                                 
                                      $.ajax({
                                       url:"/xoa-anh-ajax-tt-slider", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                                       method:"POST", // phương thức gửi dữ liệu.
                                       data:{query:query, _token:_token ,so_thu_tu:so_thu_tu},
                                 
                                       
                                       success:function(data){ //dữ liệu nhận về
                                        var dulieu = $("#json_string_z").val();
                                      
                                       document.getElementById("demo_create_product_slider").innerHTML = data;         
                                      }
                                      });
                                      
                                      
                                      }
                                 
                                 
                                 });
                                 
                                 
                                 
                                 
                                    
                                 });
                              </script>

                  </div>
               </div>
 -->
               


			
				<div class="row add-user">
					<div class="col-md-1">
						Tên bài viết 
					</div>
					<div class="col-md-11">
						{!! Form::text('name','',array('class' => 'form-control')) !!}
					</div>
				</div>
				<!--
				<div class="row add-user">
					<div class="col-md-1">
						trích dẫn
					</div>
					<div class="col-md-11">
					        <textarea id="excerpt" name="excerpt"> </textarea>
						<script>CKEDITOR.replace('excerpt');</script>
					</div>
				</div>	
				
				-->
				<div class="row add-user">
					<div class="col-md-1">
						Hạng mục bài viết 
					</div>
					<div class="col-md-11">
					<div class="row cat_view_s">
					
					<ul>
							<?php 

								showCategories_cat_product($cats,0,'');

							?>
						
					</ul>
					
					</div>
						<script>
					$(document).ready(function(){
					<?php
					category__dmchinh($cats2);
					?>
					
					
					   });
					</script>
					<script>
					$(document).ready(function(){
						   $( ".radio-inline b").css("font-weight","100");
						   $( ".optradio").css("opacity","0");
						$( ".optradio").click(function() { 
				
				
				var checkbox = document.getElementsByName("optradio");
				
   				for (var i = 0; i < checkbox.length; i++){
					
   					$( ".optradio").next().children().attr('src','/public/images/hoi_primary.png');
					
				
					
   				}
   				for (var i = 0; i < checkbox.length; i++){
   				
   				 
   					if (checkbox[i].checked === true){
						$(this).next().children().attr('src','/public/images/b_primary.png');
   
   					} 
   
   				}
		
   });
   });
   </script>

					</div>
				</div>

				

<!-- 				 <div class="row add-user">
					<div class="col-md-1">
						Link
					</div>
					<div class="col-md-11">
						{!! Form::text('link','',array('class' => 'form-control')) !!}
					</div>
				</div> -->
				
				<div class="row add-user">
					<div class="col-md-1">
						Nội dung
					</div>
					<div class="col-md-11">
					        <textarea id="content" name="content"> </textarea>
						<script>CKEDITOR.replace('content');</script>
					</div>
				</div>	
				

				 <div class="row add-user">
						<div class="col-md-1">
							Thẻ Giới thiệu
						</div>
						<div class="col-md-11">
					
						{!! Form::text('the_gioi_thieu', '', array('class' => 'form-control')) !!}
						</div>
					</div>
				 <div class="row add-user">
						<div class="col-md-1">
							Thẻ từ khóa
						</div>
						<div class="col-md-11">
					
						{!! Form::text('the_tu_khoa', '', array('class' => 'form-control')) !!}
						</div>
					</div>
					
			<!-- 	<div class="row add-user">
					<div class="col-md-1">
						Số gb của gói cước
					</div>
					<div class="col-md-11">
				
					{!! Form::text('number_gb_data', '', array('class' => 'form-control')) !!}
					</div>
				</div>	 -->
				<!-- <div class="row add-user">
					<div class="col-md-1">
						Giá của gói cước
					</div>
					<div class="col-md-11">
				
					{!! Form::text('price_of_data', '', array('class' => 'form-control')) !!}
					</div>
				</div>	 -->
				<!-- <div class="row add-user">
					<div class="col-md-1">
						Số điện thoại gửi gói cước
					</div>
					<div class="col-md-11">
				
					{!! Form::text('sms_number_send', '', array('class' => 'form-control')) !!}
					</div>
				</div> -->	
				<!-- <div class="row add-user">
					<div class="col-md-1">
					Số nội dung gửi gói cước
					</div>
					<div class="col-md-11">
				
					{!! Form::text('number_content_send', '', array('class' => 'form-control')) !!}
					</div>
				</div> -->
			<!-- 	<div class="row add-user">
					<div class="col-md-1">
					mã đăng ký
					</div>
					<div class="col-md-11">
				
					{!! Form::text('ma_dang_ky', '', array('class' => 'form-control')) !!}
					</div>
				</div>	 -->
				<!-- <div class="row add-user">
					<div class="col-md-1">
					Lưu lượng
					</div>
					<div class="col-md-11">
				
					{!! Form::text('luu_luong', '', array('class' => 'form-control')) !!}
					</div>
				</div>	 -->
				<!-- <div class="row add-user">
					<div class="col-md-1">
					link web 
					</div>
					<div class="col-md-11">
				
					{!! Form::text('link_web', '', array('class' => 'form-control')) !!}
					</div>
				</div>	 -->	

<!-- 				 <div class="row add-user">
					<div class="col-md-1">
						Số Km 
					</div>
					<div class="col-md-11">
					{!! Form::textarea('so_km', null, ['class' => 'form-control','size' => '30x3']) !!}
					</div>
				</div>  -->
				<div class="row add-user">
					<div class="col-md-1">
						Hiển thị
					</div>
					<div class="col-md-5">
					<input type="checkbox" name="hoat_dong" value="1" >  Để sản phẩm Hoạt Động luôn thì check vào ô này
					</div>
				</div>	
				<!-- <div class="row add-user">
					<div class="col-md-1">
						Icon hot
					</div>
					<div class="col-md-5">
					<input type="checkbox" name="hoat_dong" value="1" >  Để tạo icon hot cho tin tick vào đây
					</div>
				</div> -->	
				<!--
				<div class="row add-user">
					<div class="col-md-1">
						Bán chạy
					</div>
					<div class="col-md-5">
					<input type="checkbox" name="ban_chay" value="1" >  Nếu sản phẩm bán chạy thì check vào ô này<br>
					</div>
				</div>	
				-->
				<div class="row add-user">
					<div class="col-md-1">
						
					</div>
					<div class="col-md-10">
						{!! Form::submit('Tạo mới',array('class' => 'btn btn-default')) !!}
					</div>
				</div>
				
				{!! Form::close() !!}
			

		</div>
		
	</div> 

	</div>
@include('admin.footer')
