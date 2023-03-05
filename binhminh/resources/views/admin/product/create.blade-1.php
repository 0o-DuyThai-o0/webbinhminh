@include('admin.head')
	<div id="wrapper" class="container admin-admin">
	<div class="row">
		<div id="sidebar-wrapper" class="col-md-3">
			@include('admin.sitebar')
		</div>
		<div id="page-content-wrapper" class="col-md-9 admin-content">
			<h2>Thêm số điện thoại mới</h2>
				<div class="row add-user">
					<div class="col-md-1">
						Ảnh sim
					</div>
					<div class="col-md-11">
					<div class="row">
					
					<?php
					for($i=0;$i<10;$i++){
						$s='image_create_'.$i;
						if(isset($_SESSION[$s])) {
							//echo $_SESSION[$s];
							?>
							<div class="img_x">
							<img class="img_avatar" src="{{ $_SESSION[$s] }}">
							{!! Form::open(array('method' => 'POST','action' => array('Admin\ProductController@xoa_anh_dai_dien_create',$i ))) !!}
							{!! Form::submit('x',array('class' => 'btn btn-default')) !!}
							{!! Form::close() !!}
							</div>	
							<?php
							//echo '=====-';
						}
					}
					?>
							<div id="img_edit">
							</div>	
					</div>
					<div class="row">
	
						{!! Form::open(array('method' => 'POST','action' => array('Admin\ProductController@them_anh_dai_dien_create' ))) !!}							
							<input type="text" name="Image" class="btn btn-default" id="Image" placeholder="Tìm ảnh"  readonly onclick="BrowseServer();" >
						

							{!! Form::submit('Thêm ảnh',array('class' => 'btn btn-default')) !!}
						{!! Form::close() !!}							
					</div>
<!--
					<div class="row" style="margin-top:10px;">
							
							<input type="button" value="Tìm ảnh" onclick="BrowseServer();"/>	
					</div>	
	-->
					</div>
				</div>	
				{!! Form::open(array('action' => 'Admin\ProductController@store')) !!}
				<div class="row add-user">
					<div class="col-md-1">
						Số sim
					</div>
					<div class="col-md-11">
						{!! Form::text('name','',array('class' => 'form-control')) !!}
					</div>
				</div>
<div class="row add-user">
					<div class="col-md-1">
						Nhà mạng
					</div>
					<div class="col-md-11">
					<select class="form-control" name="discount">
																
			        <option class="menu_1" value="viettel">  
							Viettel			        </option>
			         <option class="menu_1" value="vinaphone">  
							Vinaphone			        </option>						
					  <option class="menu_1" value="mobifone">  
												Mobifone			        </option>	
					  <option class="menu_1" value="vietnamobile">  
												Vietnamobile			        </option>		        
					  <option class="menu_1" value="gmobile">  
												Gmobile			        </option>				
										 
						<option style="font-size:14px;" value="0" selected="selected">
						Chọn nhà mạng
						</option>

				      </select>
					</div>
				</div>
				
				<div class="row add-user">
					<div class="col-md-1">
						Giá
					</div>
					<div class="col-md-11">
						{!! Form::text('price', '', array('class' => 'form-control')) !!}
					</div>
				</div>
				<div class="row add-user">
					<div class="col-md-1">
						Đầu số cũ
					</div>
					<div class="col-md-11">
						{!! Form::text('ma_san_pham','', array('class' => 'form-control')) !!}
					</div>
				</div>
				<div class="row add-user">
					<div class="col-md-1">
						Mô tả phong thủy
					</div>
					<div class="col-md-11">
						{!! Form::text('xuat_xu','', array('class' => 'form-control')) !!}
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
						Danh mục 1
					</div>
					<div class="col-md-11">
					<select class="form-control" name="cat_id">
										<?php
				if(isset($cat_parents)) {

						view_category( $cat_parents,$cats,-1);

							
						}
						//view_category( $cat_parents,$cats,-1);
				?>

				      </select>
					</div>
				</div>
				<!--
				<div class="row add-user">
					<div class="col-md-1">
						Danh mục 2
					</div>
					<div class="col-md-11">
					<select class="form-control" name="cat_id_1">
										<?php
				if(isset($cat_parents)) {

						view_category( $cat_parents,$cats,-1);

							
						}
						//view_category( $cat_parents,$cats,-1);
				?>


				      </select>
					</div>
				</div>	
				<div class="row add-user">
					<div class="col-md-1">
						Danh mục 3
					</div>
					<div class="col-md-11">
					<select class="form-control" name="cat_id_2">
										<?php
				if(isset($cat_parents)) {

						view_category( $cat_parents,$cats,-1);

							
						}
						//view_category( $cat_parents,$cats,-1);
				?>


				      </select>
					</div>
				</div>	
-->				
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
						Hiển thị
					</div>
					<div class="col-md-5">
					<input type="checkbox" name="hoat_dong" value="1" >  Để sản phẩm Hoạt Động luôn thì check vào ô này
					</div>
				</div>	
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