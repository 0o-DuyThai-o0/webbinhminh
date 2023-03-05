
@include('admin.head')
	<div id="wrapper"  class="container admin-admin">
	<div class="row">
		<div id="sidebar-wrapper" class="col-md-3">
			@include('admin.sitebar')
		</div>
		<div id="page-content-wrapper" class="col-md-9 admin-content">
			<div class="row">
       
			<h2 class="h2_bai_viet h2_bai_viet_product">Chỉnh sửa Danh mục Tin tức</h2>

			{!! Form::open(array('method' => 'POST','action' => array('Admin\CatnewsController@update',$id ))) !!}

				<div class="row add-user">
				<label for="tag-name">Tên Danh mục</label>


						{!! Form::text('name',$catnew->name,array('class' => 'form-control')) !!}

				</div>
				<div class="row add-user">
				<label for="tag-name">Alias</label>
						{!! Form::text('cat_new_alias',$catnew->cat_new_alias, array('class' => 'form-control')) !!}
				</div>

				<div class="row add-user">
				
				<label for="tag-name">Chọn Danh mục cha</label>
						<select class="form-control" name="parent_id">
						<?php
					
							categories_new_admin($catnews1,0,'');
						?>
				      </select>

				
				</div>	
				<div class="row add-user">
				<label for="tag-name">Thẻ từ khóa</label>


					{!! Form::text('the_tu_khoa', $catnew->the_tu_khoa, array('class' => 'form-control')) !!}

				</div>				
				<div class="row add-user">
				<label for="tag-name">Thẻ giới thiệu</label>
					{!! Form::textarea('the_gioi_thieu', $catnew->the_gioi_thieu, ['class' => 'form-control','size' => '30x3']) !!}

				</div>
				
				<div class="row add-user">
					<input type="checkbox" name="hoat_dong" value="1" <?php if($catnew->status_cat_new) echo 'checked'; ?>>
				<label for="tag-name">Hoạt động luôn </label>

					

				</div>						
				<div class="row add-user">
						{!! Form::submit('Cập nhật',array('class' => 'btn btn-default')) !!}
				</div>
				
				{!! Form::close() !!}

			</div>
		</div>
	</div> 

	</div>
@include('admin.footer')