@include('admin.head')
	<div id="wrapper" class="container admin-admin">
	<div class="row">
		<div id="sidebar-wrapper" class="col-md-3">
			@include('admin.sitebar')
		</div>
		<div id="page-content-wrapper" class="col-md-9 admin-content">
			<h2>Tạo mới Tin tức</h2>
			{!! Form::open(array('action' => 'Admin\NewsController@store')) !!}
				<div class="row add-user">
					<div class="col-md-1">
						Ảnh sản phẩm
					</div>
					<div class="col-md-11">
					<div class="row" id="demo_create_news">
                                 <?php
                                  $anh_json ="";
                                    for($i=0;$i<10;$i++){
                                     $s='image_create_news'.$i;
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
                                     <input id="" name="add_images_create_news" type="hidden" value='<?php if(isset($anh_json)){echo $anh_json;}?>'>
                                    <input class="btn btn-default xoa_anh_create_news" type="button" value="x">
                                    <input id="so_thu_tu_<?php echo $i;?>" name="so_thu_tu" type="hidden" value="<?php echo $i; ?>">
                                   
                                 </div>
                                 <?php
                                    }
                                    }
                                    
                                    ?>
                                     <input id="json_string_z" name="add_images_create_news" type="hidden" value=''>
                              </div>
                              <div id="add_images_create_news" style="display:none;" name="add_images_create_news">
                              </div>
                              <div class="row">       
                             
                                 <input type="text" name="Image_create_news" class="btn btn-default" id="Image_create_news" placeholder="Tìm ảnh" onclick="BrowseServer_create_news();" readonly="readonly" >
                              </div>
                              <script>
                                 $(document).ready(function(){
                                 
                                 var son_type = $('#Image_create_news').val(); //lấy gía trị ng dùng gõ son_type
                                 
                                    $("#page-content-wrapper").mousemove(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
                                     // var query = $(this).val(); //lấy gía trị ng dùng gõ
                                      var query=$('#Image_create_news').val();
                                 
                                      
                                     if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
                                     {
                                       var id = $('.id_img').val();
                                      var query_t = $('#Image_create_news').val();

                                      var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                                 //alert (_token);
                                 
                                     document.getElementById("Image_create_news").value = ""; 
                                 
                                 
                                      $.ajax({
                                       url:"/test-js-tt-news", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                                       method:"POST", // phương thức gửi dữ liệu.
                                       data:{query:query, _token:_token ,son_type:son_type,query_img:query_t,stt_s:0},
                                       
                                       success:function(data){ //dữ liệu nhận về
                                       document.getElementById("demo_create_news").innerHTML = data;         
                                             
                                      }
                                      });

                                      }
                                 
                                    });
                                    
                                 
                                 
                                   $('#page-content-wrapper').on('click', '.xoa_anh_create_news', function() {
                                      var so_thu_tu=$(this).next().val();
                                      
                                     var query=$(this).next().val();
                                 
                                 
                                 
                                       if(so_thu_tu != '')
                                     {
                                      var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                                 
                                 //alert(_token);
                                 
                                 
                                      $.ajax({
                                       url:"/xoa-anh-ajax-tt-news", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                                       method:"POST", // phương thức gửi dữ liệu.
                                       data:{query:query, _token:_token ,so_thu_tu:so_thu_tu},
                                 
                                       
                                       success:function(data){ //dữ liệu nhận về
                                        var dulieu = $("#json_string_z").val();
                                      
                                       document.getElementById("demo_create_news").innerHTML = data;         
                                      }
                                      });
                                      
                                      
                                      }
                                 
                                 
                                 });
                                 
                                 
                                 
                                 
                                    
                                 });
                              </script>
					</div>
				</div>	
				
				<div class="row add-user">
					<div class="col-md-1">
						Name
					</div>
					<div class="col-md-11">
						{!! Form::text('name','',array('class' => 'form-control')) !!}
					</div>
				</div>
				<div class="row add-user">
					<div class="col-md-1">
						Trích dẫn
					</div>
					<div class="col-md-11">
						{!! Form::text('excerpt','',array('class' => 'form-control')) !!}
					</div>
				</div>

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
						Danh mục
					</div>
					<div class="col-md-11">
					<select class="form-control" name="cat_new_id">
										<?php
				categories_new_admin($catnews,0,"");
						//view_category( $cat_parents,$cats,-1);
				?>
				      </select>
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
				<div class="row add-user">
					<div class="col-md-1">
						Thẻ giới thiệu
					</div>
					<div class="col-md-11">
					{!! Form::textarea('the_gioi_thieu', null, ['class' => 'form-control','size' => '30x3']) !!}
					</div>
				</div>
				
				<div class="row add-user">
					<div class="col-md-1">
						Hoạt động luôn
					</div>
					<div class="col-md-11">
						<input type="checkbox" name="hoat_dong" value="1" checked>
					</div>
				</div>
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