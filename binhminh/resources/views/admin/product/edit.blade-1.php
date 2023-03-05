
@include('admin.head')

	
	<div id="wrapper" class="container admin-admin">
	<div class="row">
		<div id="sidebar-wrapper" class="col-md-3">
			@include('admin.sitebar')
		</div>
		<div id="page-content-wrapper" class="col-md-9 admin-content">
			<div class="row">
       
			<h2>Chỉnh sửa thông tin Sim</h2>
				<div class="row add-user">
					<div class="col-md-1">
						Ảnh sim
					</div>
					<div class="col-md-11">
					<div class="row">
					<?php
						if($product->image_list) {
						$img_xs=json_decode($product->image_list,1);
							if(isset($img_xs)==true) {
								$s=0;
								$s_edit='image_edit_'.$product->id;
								foreach ($img_xs as $img_x) {
								$s_edit='image_edit_'.$product->id.$s;
								$_SESSION[$s_edit.$s]=$img_x['url'];
								?>
								<div class="img_x">
								<?php
								echo "<img class='img_avatar' src=".$img_x['url'].">";
								?>
								{!! Form::open(array('method' => 'POST','action' => array('Admin\ProductController@xoa_anh_dai_dien',$product->id,$s ))) !!}
								{!! Form::submit('x',array('class' => 'btn btn-default')) !!}
								{!! Form::close() !!}
								</div>	
								<?php
								$s=$s+1;
								}
							}
						}
					?>
							<div id="img_edit">
							</div>		
						
					</div>

					<div class="row" style="margin-top:10px;">
						{!! Form::open(array('method' => 'POST','action' => array('Admin\ProductController@them_anh_dai_dien',$id ))) !!}	
							<input type="text" name="Image" class="btn btn-default" id="Image" placeholder="Tìm ảnh"  readonly="" onclick="BrowseServer();">
							{!! Form::submit('Thêm ảnh',array('class' => 'btn btn-default')) !!}
						{!! Form::close() !!}	
					</div>	
	
					</div>
				</div>	
			{!! Form::open(array('method' => 'PATCH','action' => array('Admin\ProductController@update',$id ))) !!}
				<div class="row add-user">
					<div class="col-md-1">
						Số sim
					</div>
					<div class="col-md-11">
						{!! Form::text('name',$product->name,array('class' => 'form-control')) !!}
					</div>
				</div>
<div class="row add-user">
					<div class="col-md-1">
						Nhà mạng
					</div> 
					<?php $nha_mang=0;
					
					if(isset($product->discount)) $nha_mang=$product->discount; ?>
					
					<?php //echo "<p>".$nha_mang."</p>" ;?>
					<div class="col-md-11">
					<select class="form-control" name="discount">
																
			        <option class="menu_1" value="viettel" <?php 
					
				   if($nha_mang=='viettel') echo "selected='selected'";
				   
			   ?>>  
							Viettel			        </option>
			         <option class="menu_1" value="vinaphone" <?php 
					
				   if($nha_mang=='vinaphone') echo "selected='selected'";
				   
			   ?>>  
							Vinaphone			        </option>						
					  <option class="menu_1" value="mobifone" <?php 
					
				   if($nha_mang=='mobifone') echo "selected='selected'";
				   
			   ?>>  
												Mobifone			        </option>	
					  <option class="menu_1" value="vietnamobile" <?php 
					
				   if($nha_mang=='vietnamobile') echo "selected='selected'";
				   
			   ?>>  
												Vietnamobile			        </option>		        
					  <option class="menu_1" value="gmobile" <?php 
					
				   if($nha_mang=='gmobile') echo "selected='selected'";
				   
			   ?>>  
												Gmobile			        </option>				
										 
				<option style="font-size:14px;" value="0"<?php 
					
				   if($nha_mang=='0') echo "selected='selected'";


				   
			   ?>>
						Chọn nhà mạng
						</option>

				      </select>
					</div>
				</div>
				<div class="row add-user">
					<div class="col-md-1">
						Nhà mạng- danh mục
					</div>
					<div class="col-md-11">
					<div class="row cat_view_s">

					
					<?php 
							foreach( $cats as $cat ) {
								?>
								<p>
								<label class="lable_checkbox"><input type="checkbox" name="checkbox[{{ $cat->id }}]" value="{{ $cat->id }}" 
								<?php
								$mangs=explode('-', $product->cat_id);
										if(isset($mangs)==true) {
											foreach($mangs as $mang ){
												if( $mang==$cat->id) {
													echo "checked";
													break ;
												}
										}
							
							}
								?>
								
								/></label>  
								{{ $cat->name }} 
								</p>
								
							<?php
							
							}

					?>
					
					</div>

					</div>
				</div>
				<div class="row add-user">
					<div class="col-md-1">
						Giá
					</div>
					<div class="col-md-11">
						{!! Form::text('price',$product->price, array('class' => 'form-control')) !!}
					</div>
				</div>
				<div class="row add-user">
					<div class="col-md-1">
						Đầu số cũ
					</div>
					<div class="col-md-11">
						{!! Form::text('ma_san_pham',$product->ma_san_pham, array('class' => 'form-control')) !!}
					</div>
				</div>
				<div class="row add-user">
					<div class="col-md-1">
						Mô tả phong thủy
					</div>
					<div class="col-md-11">
						{!! Form::text('xuat_xu',$product->xuat_xu, array('class' => 'form-control')) !!}
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
						Hạng mục sim
					</div>
					<div class="col-md-11">
					<div class="row cat_view_s">

					
					<?php 
							foreach( $cats as $cat ) {
								?>
								<p>
								<label class="lable_checkbox"><input type="checkbox" name="checkbox[{{ $cat->id }}]" value="{{ $cat->id }}" 
								<?php
								$mangs=explode('-', $product->cat_id);
										if(isset($mangs)==true) {
											foreach($mangs as $mang ){
												if( $mang==$cat->id) {
													echo "checked";
													break ;
												}
										}
							
							}
								?>
								
								/></label>  
								{{ $cat->name }} 
								</p>
								
							<?php
							
							}

					?>
					
					</div>

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
				<div class="row add-user">
					<div class="col-md-1">
						Thẻ giới thiệu
					</div>
					<div class="col-md-11">
					{!! Form::textarea('the_gioi_thieu', $product->the_gioi_thieu, ['class' => 'form-control','size' => '30x3']) !!}
					</div>
				</div>
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
						{!! Form::submit('Update',array('class' => 'btn btn-default')) !!}
					</div>
				</div>
				
				{!! Form::close() !!}

			</div>
		</div>
	</div> 

	</div>
@include('admin.footer')

