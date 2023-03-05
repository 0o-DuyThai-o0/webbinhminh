
@include('admin.head')
	<div id="wrapper" class="container admin-admin">
	<div class="row">
		<div id="sidebar-wrapper" class="col-md-3">
			@include('admin.sitebar')
		</div>
		<div id="page-content-wrapper" class="col-md-9 admin-content">
			<div class="row">
				<div class="">
					<div id="icon-edit" class="icon32 icon32-posts-post"><br></div>
					<h2 class="h2_bai_viet h2_bai_viet_product">Danh mục Tin tức </h2>
				</div>
			</div>
			<div class="row xuat_ban_product">
				<ul class="subsubsub">
				<!-- <li class="all"><a href="{!!  asset('admin/product/all-va-ban-nhap/1'); !!}" class="current">All <span class="count">({{ $catnews->count() }})</span></a> |</li> -->
				</ul>
			</div>
			<div class="row">
				<div class="col-sm-3">
			<div class="row ">
			<h2 class="h2_bai_viet h2_bai_viet_product">Tạo Danh mục mới</h2>
				{!! Form::open(array('action' => 'Admin\CatnewsController@store')) !!}
				<div class="row add-user">
				<label for="tag-name">Tên Danh mục</label>
					
						{!! Form::text('name','',array('class' => 'form-control')) !!}
					
				</div>

				<div class="row add-user">
				<label for="tag-name">Chọn Danh mục cha</label>

					<select class="form-control" name="parent_id">
						<option value=""> Không thuộc danh mục nào </option>
						<?php
							categories_new_admin($catnews1,0,'');
						?>
				      </select>

				</div>	
				<div class="row add-user">
				<label for="tag-name">Thẻ từ khóa</label>


					{!! Form::text('the_tu_khoa', '', array('class' => 'form-control')) !!}

				</div>				
				<div class="row add-user">
				<label for="tag-name">Thẻ giới thiệu</label>
					{!! Form::textarea('the_gioi_thieu', null, ['class' => 'form-control','size' => '30x3']) !!}

				</div>
				
				<div class="row add-user">
					<input type="checkbox" name="hoat_dong" value="1">
				<label for="tag-name">Hoạt động luôn </label>

					

				</div>				
				<div class="row add-user">

						{!! Form::submit('Tạo mới',array('class' => 'btn btn-default')) !!}

				</div>
				
				{!! Form::close() !!}
			

		</div>
						
				</div>
				<div class="col-sm-9">
				@if ($errors->has())
				<p style="color:red;">
				  @foreach ($errors->all() as $error)
				    {!! $error !!}<br />		
				  @endforeach
				</p>
				@endif
				@if ( !$catnews->count() )
				        No Cat in Website
				@else
				{!! Form::open(array('method' => 'POST','action' => array('Admin\CatnewsController@xu_ly_form_catnew'))) !!}
				<div class="tablenav top xu_ly_du_lieu_form">
				<input type="hidden" name="action1" value="" />
                  <div class=" actions">
                     <select name="publish_unpublish">
                        <option value="-1" selected="selected">Chọn</option>
                        <option value="hoat_dong" class="hide-if-no-js">Hoạt động</option>
                        <option value="ban_nhap">Bản nháp</option>
                        <option value="xoa_vinh_vien">Xóa vĩnh viễn</option>
                     </select>
                     <input type="submit" name="submit_1" id="doaction" class="button action" value="Áp dụng">
                  </div>	
			 	<div class="table-responsive" style="margin-top: 2%;">    
				<table class="table ">
				<thead>
				  <tr class="rip_tr">
   
				    <th><label><input type="checkbox" id="checkAll"/></label>  All </th>
				   <th style="width: 23%;"> Tên Danh mục Tin tức </th>
				    <th>Alias</th>
				    <th> Avatar </th>
				    <th> Ngày Tạo </th>
				    <th> Ngày Sửa </th>

				  </tr>
				</thead>
					<tbody>
					<?php 
					
					view_category_cat_new( $catnews2,0,'');
					
					?>		
					</tbody>		
				</table>
			</div>
				 {!! Form::close() !!}
				@endif

				</div>
			</div>

		</div>
	</div> 

	</div>
@include('admin.footer')