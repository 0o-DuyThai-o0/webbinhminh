
@include('admin.head')

	
	<div id="wrapper" class="container admin-admin">
	<div class="row">
		<div id="sidebar-wrapper" class="col-md-3">
			@include('admin.sitebar')
		</div>
		<div id="page-content-wrapper" class="col-md-9 admin-content">
			@include('admin.succsess')
			<div class="row">
       
			<h2>Chỉnh sửa thông tin Bài viết </h2> <a href="/<?php echo $product->product_alias; ?>">  Xem thử </a>
				{!! Form::open(array('method' => 'PATCH','action' => array('Admin\ProductController@update',$id ))) !!}
				<div class="row add-user">
					<div class="col-md-1">
						Ảnh bài viết
					</div>
					<div class="col-md-11">
					<div id="edit_product_demo">
						
				
					 <?php 

                                       $anh_children =  json_decode($product->image_list);
			                           if($anh_children == true){

									               	$i=0;
									              
									               
			                             foreach ($anh_children as $value3) {
											 
											 
                											 $s='image_create_edit_product'.$i; 
                											 $_SESSION[$s]=$value3->url;
                										 	 $i++;
                										 
			                      

					                 ?>

					                          <div class="img_x">
					                          	
					                             <img class="img_avatar" src="<?php echo $_SESSION[$s]; ?>">
					                            <input class="btn btn-default xoa_anh_edit_product" type="button" value="x">
					                             <input id="so_thu_tu_<?php echo $i;?>" name="so_thu_tu" type="hidden" value="<?php echo $i; ?>">
					                      

					                          </div>
					                          
					                         <?php } ?>
                                  			 <?php } ?>

                                    <input id="json_string_h2" type="hidden" name="add_images_edit_product" type="" value='<?php
                                    $anh_children = json_decode($product->image_list);
                                    
                                  
			                                       $anh_json ="";
			                           if($anh_children == true){

										$i=0;
			                             foreach ($anh_children as $value3) {
											 
											 
											 $s1='image_create_edit_product'.$i;  
											 
			                             if($anh_json=='')
			                              {
			                              $_SESSION[$s1]=$value3->url;
			                                $anh_json='{"url":"'.$_SESSION[$s1].'"}';
			                              }else {
											  $_SESSION[$s1]=$value3->url;
			                                $anh_json=$anh_json.',{"url":"'.$_SESSION[$s1].'"}';
											
			                              }
										  $i++;
										  
			                            }
			                        }
									//	   echo $s1;
			                            
			               
			                    echo $anh_json;


			                             ?>'>

			                             <?php 
			                                 
			                                         
			                              ?>

					</div>
					<div id="img_edit_product" style="display:none;" name="img_edit_product">
                              </div>
                              <div class="row">       
                             
                                 <input type="text" name="Image_edit_product" class="btn btn-default" id="Image_edit_product" placeholder="Tìm ảnh" onclick="BrowseServer_edit_product()" readonly="readonly" >
                              </div>
                              <script>
                                 $(document).ready(function(){
                                 
                                 var son_type = $('#Image_edit_product').val(); //lấy gía trị ng dùng gõ son_type
                                 
                                    $("#page-content-wrapper").mousemove(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
                                     // var query = $(this).val(); //lấy gía trị ng dùng gõ
                                      var query=$('#Image_edit_product').val();
                                 
                                      
                                     if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
                                     {
                                       var id = $('.id_img').val();
                                      var query_t = $('#Image_edit_product').val();

                                      var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                                 //alert (_token);
                                 
                                     document.getElementById("Image_edit_product").value = ""; 
                                 
                                 
                                      $.ajax({
                                       url:"/test-js-tt-edit-product", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                                       method:"POST", // phương thức gửi dữ liệu.
                                       data:{query:query, _token:_token ,son_type:son_type,query_img:query_t},
                                       
                                       success:function(data){ //dữ liệu nhận về
                                       document.getElementById("edit_product_demo").innerHTML = data;         
                                             
                                      }
                                      });

                                      }
                                 
                                    });
                                    
                                 
                                 
                                   $('#page-content-wrapper').on('click', '.xoa_anh_edit_product', function() {
                                      var so_thu_tu=$(this).next().val();
                                      
                                     var query=$(this).next().val();
                                 
                                 
                                 
                                       if(so_thu_tu != '')
                                     {
                                      var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                                 
                                 //alert(_token);
                                 
                                 
                                      $.ajax({
                                       url:"/xoa-anh-ajax-tt-edit-product", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                                       method:"POST", // phương thức gửi dữ liệu.
                                       data:{
                                       	query:query,
                                       	 _token:_token ,
                                       	 so_thu_tu:so_thu_tu
                                       	
                                       	},
                                 
                                       
                                       success:function(data){ //dữ liệu nhận về
                                        var dulieu = $("#json_string_z").val();
                                        console.log(dulieu);
                                        // console.log(data);
                                       document.getElementById("edit_product_demo").innerHTML = data;         
                                      }
                                      });
                                      
                                      
                                      }
                                 
                                 
                                 });
                                 
                                 
                                 
                                 
                                    
                                 });
                              </script>
						</div>
				</div>
				<div class="hr">

				</div>

				<!-- <div class="row add-user">
					<div class="col-md-1">
						Ảnh slider
					</div>
					<div class="col-md-11">
					 <div id="edit_product_demo_slider">
						
				
					 <?php 

                                       $anh_children =  json_decode($product->image_lien_quan);
			                           if($anh_children == true){

									               	$i=0;
									              
									               
			                             foreach ($anh_children as $value3) {
											 
											 
                											 $s='image_create_edit_product_slider'.$i; 
                											 $_SESSION[$s]=$value3->url;
                										 	 $i++;
                										 
			                      

					                 ?>

					                          <div class="img_x">
					                          	
					                             <img class="img_avatar" src="<?php echo $_SESSION[$s]; ?>">
					                            <input class="btn btn-default xoa_anh_edit_product_slider" type="button" value="x">
					                             <input id="so_thu_tu_<?php echo $i;?>" name="so_thu_tu" type="hidden" value="<?php echo $i; ?>">
					                      

					                          </div>
					                          
					                         <?php } ?>
                                  			 <?php } ?>

                                    <input id="json_string_h2" type="hidden" name="edit_product_slider"  value='<?php
                                    $anh_children = json_decode($product->image_lien_quan);
                                    
                                  
			                                       $anh_json ="";
			                           if($anh_children == true){

										$i=0;
			                             foreach ($anh_children as $value3) {
											 
											 
											 $s1='image_create_edit_product_slider'.$i;  
											 
			                             if($anh_json=='')
			                              {
			                              $_SESSION[$s1]=$value3->url;
			                                $anh_json='{"url":"'.$_SESSION[$s1].'"}';
			                              }else {
											  $_SESSION[$s1]=$value3->url;
			                                $anh_json=$anh_json.',{"url":"'.$_SESSION[$s1].'"}';
											
			                              }
										  $i++;
										  
			                            }
			                        }
									//	   echo $s1;
			                            
			               
			                    echo $anh_json;


			                             ?>'>

			                             <?php 
			                                 
			                                         
			                              ?>

					</div>
					<div id="img_edit_product_slider" style="display:none;" name="img_edit_product_slider">
                              </div>
                              <div class="row">       
                             
                                 <input type="text" name="Image_edit_product_slider" class="btn btn-default" id="Image_edit_product_slider" placeholder="Tìm ảnh" onclick="BrowseServer_edit_product_slider()" readonly="readonly" >
                              </div>
                              <script>
                                 $(document).ready(function(){
                                 
                                 var son_type = $('#Image_edit_product_slider').val(); //lấy gía trị ng dùng gõ son_type
                                 
                                    $("#page-content-wrapper").mousemove(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
                                     // var query = $(this).val(); //lấy gía trị ng dùng gõ
                                      var query=$('#Image_edit_product_slider').val();
                                 
                                      
                                     if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
                                     {
                                       var id = $('.id_img').val();
                                      var query_t = $('#Image_edit_product_slider').val();

                                      var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                                 //alert (_token);
                                 
                                     document.getElementById("Image_edit_product_slider").value = ""; 
                                 
                                 
                                      $.ajax({
                                       url:"/test-js-tt-edit-product-slider", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                                       method:"POST", // phương thức gửi dữ liệu.
                                       data:{query:query, _token:_token ,son_type:son_type,query_img:query_t},
                                       
                                       success:function(data){ //dữ liệu nhận về
                                       document.getElementById("edit_product_demo_slider").innerHTML = data;         
                                             
                                      }
                                      });

                                      }
                                 
                                    });
                                    
                                 
                                 
                                   $('#page-content-wrapper').on('click', '.xoa_anh_edit_product_slider', function() {
                                      var so_thu_tu=$(this).next().val();
                                      
                                     var query=$(this).next().val();
                                 
                                 
                                 
                                       if(so_thu_tu != '')
                                     {
                                      var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                                 
                                 //alert(_token);
                                 
                                 
                                      $.ajax({
                                       url:"/xoa-anh-ajax-tt-edit-product-slider", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                                       method:"POST", // phương thức gửi dữ liệu.
                                       data:{
                                       	query:query,
                                       	 _token:_token ,
                                       	 so_thu_tu:so_thu_tu
                                       	
                                       	},
                                 
                                       
                                       success:function(data){ //dữ liệu nhận về
                                        var dulieu = $("#json_string_z").val();
                                        console.log(dulieu);
                                        // console.log(data);
                                       document.getElementById("edit_product_demo_slider").innerHTML = data;         
                                      }
                                      });
                                      
                                      
                                      }
                                 
                                 
                                 });
                                 
                                 
                                 
                                 
                                    
                                 });
                              </script>
						</div>
					</div> -->
				</div>

		
				<div class="row add-user">
					<div class="col-md-1">
						Tên bài viết
					</div>
					<div class="col-md-11">
						{!! Form::text('name',$product->name,array('class' => 'form-control')) !!}
					</div>
				</div>

				<div class="row add-user">
					<div class="col-md-1">
						Danh mục bài viết 
					</div>
					<div class="col-md-11">
					<div class="row cat_view_s">
					

					<ul class="show_cat_pri">
					<?php
						showCategories_edit_product($cats,0,$product->cat_id,$product->cat_khoa_chinh,'');
					?>
					</ul>

					</div>
										<script>
					$(document).ready(function(){
					<?php
					showCategories_edit_jquey($cats);
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
				

				<div class="row add-user">
					<div class="col-md-1">
						Alias
					</div>
					<div class="col-md-11">
						{!! Form::text('product_alias',$product->product_alias, array('class' => 'form-control')) !!}
					</div>
				</div>
				
			<!--	
				
				<div class="row add-user">
					<div class="col-md-1">
						Trích dẫn
					</div>
					<div class="col-md-11">
					        <textarea id="excerpt" name="excerpt"> {{$product->excerpt}} </textarea>
						<script>CKEDITOR.replace('excerpt');</script>
					
					</div>
				</div>	
-->
				<div class="row add-user">
					<div class="col-md-1">
						Nội dung
					</div>
					<div class="col-md-11">
					        <textarea id="content" name="content"> {{$product->content}} </textarea>
						<script>CKEDITOR.replace('content');</script>
					
					</div>
				</div>
				 <div class="row add-user">
						<div class="col-md-1">
							Thẻ Giới thiệu
						</div>
						<div class="col-md-11">
					
						{!! Form::text('the_gioi_thieu',$product->the_gioi_thieu, array('class' => 'form-control')) !!}
						</div>
					</div>
				 <div class="row add-user">
						<div class="col-md-1">
							Thẻ từ khóa
						</div>
						<div class="col-md-11">
					
						{!! Form::text('the_tu_khoa',$product->the_tu_khoa, array('class' => 'form-control')) !!}
						</div>
					</div>				
				<!-- <div class="row add-user">
					<div class="col-md-1">
						Nội dung hai
					</div>
					<div class="col-md-11">
					        <textarea id="content_two" name="content_two"> {{$product->content_two}} </textarea>
						<script>CKEDITOR.replace('content_two');</script>
					
					</div>
				</div>	 -->

				
				<div class="row add-user">
					<div class="col-md-1">
						Hiển thị
					</div>
					<div class="col-md-5">
					<input type="checkbox" name="hoat_dong" value="1"<?php if($product->status_product) echo 'checked'; ?> >  Để sản phẩm Hoạt Động luôn thì check vào ô này
					</div>
				</div>					

				
				<div class="row add-user">
					<div class="col-md-1">
						
					</div>
					<div class="col-md-10">
						{!! Form::submit('Update',array('class' => 'btn btn-default','id' => '')) !!}
					</div>
				</div>
				
				{!! Form::close() !!}

			</div>
		</div>
	</div> 

	</div>
@include('admin.footer')

