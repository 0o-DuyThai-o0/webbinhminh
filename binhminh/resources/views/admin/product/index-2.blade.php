
@include('admin.head')
	<div class="container admin-admin">
	<div class="row">
		<div class="col-md-3">
			@include('admin.sitebar')
		</div>
		<div class="col-md-9 admin-content">
			<div class="row">
				<div class="">
					<div id="icon-edit" class="icon32 icon32-posts-post"><br></div>
					<h2 class="h2_bai_viet h2_bai_viet_product">Bài Viết <a href="{!!  asset('admin/product/create'); !!}">Thêm mới </a> </h2>
				</div>
	<div class="row xuat_ban_product">
		<ul class="subsubsub">

		<?php 
			//if(!$s_search) { $s_search=NULL; }
			if(!isset($s_search)) {
				$s_search="";
			}

		?>
			<li class="all"><a href="{!!  asset('admin/product/all-va-ban-nhap/1'); !!}" class="current">All <span class="count">{{ $all_products }}</span></a> |</li>
			<li class="publish"><a href="{!!  asset('admin/product'); !!}">Xuất bản <span class="count">{{ $all_products_1 }}</span></a> |</li>
			<li class="draft"><a href="{!!  asset('admin/product/all-va-ban-nhap/-1'); !!}">Bản nháp <span class="\&quot;count\&quot;">{{ $all_products_0 }}</span></a></li>
		</ul>
		{!! Form::open(array('method' => 'POST','action' => array('Admin\ProductController@s_search',Request::input('s_search')))) !!}
	
			<p class="search-box">
				<input type="search" id="post-search-input" name="s_search" 
				value="<?php if(isset($s_search)) echo $s_search ; ?>">

				<input type="submit" name="" id="search-submit" class="button" value="Tìm kiếm bài viết">
				</p>
		{!! Form::close() !!}
	</div>
	<div class="row">
		<div class="tablenav top xu_ly_du_lieu_form">

		<div class="alignleft actions">
			<select name="action">
				<option value="-1" selected="selected">Chọn</option>
				<option value="hoat_dong" class="hide-if-no-js">Hoạt động</option>
				<option value="ban_nhap">Bản nháp</option>
			</select>
			<input type="submit" name="" id="doaction" class="button action" value="Áp dụng">
		</div>
		<div class="alignleft actions">
			<select name="m">
				<option selected="selected" value="0">Show all dates</option>
				<option value="201602">Tháng Hai 2016</option>
				<option value="201405">Tháng 5 2014</option>
			</select>
			<select name="cat" id="cat" class="postform">
				<option value="0">View all categories</option>
				<option class="level-0" value="29">Bệnh lý dương vật</option>
				<option class="level-1" value="45">&nbsp;&nbsp;&nbsp;Cắt bao quy đầu</option>
			</select>
			<select name="seo_filter">
				<option value="">All SEO Scores</option>
				<option value="poor">SEO: Poor</option><option value="ok">SEO: OK</option>
				<option value="good">SEO: Good</option>
				<option value="noindex">SEO: Post Noindexed</option>
			</select>
			<input type="submit" name="" id="post-query-submit" class="button" value="Filter">
		</div>
		<div class="tablenav-pages">
			<span class="displaying-num">511 items</span>
			<span class="pagination-links"><a class="first-page disabled" title="Go to the first page" href="">«</a>
			<a class="prev-page disabled" title="" href="">‹</a>
			<span class="paging-input"><input class="current-page" title="Current page" type="text" name="paged" value="1" size="2"> of <span class="total-pages">26</span></span>
			<a class="next-page" title="" href="">›</a>
			<a class="last-page" title="" href="">»</a></span>
		</div>	

		<input type="hidden" name="mode" value="list">
		<div class="view-switch">
			<a href="" class="current"><img id="view-switch-list" src="http://khamnamkhoa.vn/wp-includes/images/blank.gif" width="20" height="20" title="List View" alt="List View"></a>
			<a href=""><img id="view-switch-excerpt" src="http://khamnamkhoa.vn/wp-includes/images/blank.gif" width="20" height="20" title="" alt=""></a>
		</div>
	</div>
	</div>

				@if ($errors->has())
				<p style="color:red;">
				  @foreach ($errors->all() as $error)
				    {!! $error !!}<br />		
				  @endforeach
				</p>
				@endif
				@if ( !count($products) )
				        No Product in Website
				@else	
				{!! Form::open(array('method' => 'POST','action' => array('Admin\ProductController@delete_s_code'))) !!} 

				<table class="table table-bordered edit-son">
				<thead class="thead_background">
				  <tr>
   				    <th><label><input type="checkbox" id="checkAll"/></label> Tiêu đề</th>
				     <th>Giá</th>
				    <th>Đường dẫn</th>
				    <th>Nội dung</th>
				    <th>Mục sản phẩm</th>
				    <th>Trạng thái</th>
					<th>Người tạo</th>
				  </tr>
				</thead>
				<tbody>
				<?php

				if($session_value) {
					echo $session_value;
					?>
					<a href='{{ asset('admin/logout') }}'> logout </a>
				<?php
				}
				?>

				@foreach( $products as $product )
					<tr>

						<td>	
							<label class="lable_checkbox"><input type="checkbox" name="checkbox-{{ $product->id }}" value="{{ $product->id }}" /></label>  
							<a class="show-2" href="{{ asset('admin/product') }}/{{ $product->id }}/edit"> {{ $product->name }}  </a>	
							<br/>
						<a target="_blank" class="show-1" href="{{ asset('')  }}{{ $product->product_alias }}">view
						</a>							
						<a class="show-1" href="{{ asset('admin/product') }}/{{ $product->id }}">show
						</a>	
						<a class="show-1" href="{{ asset('admin/product') }}/{{ $product->id }}/edit"> edit
						</a>	

						</td>
						<td>  {{ $product->price }}</td>
						<td>  {{ $product->product_alias }}</td>
						
						<td>  {{ $product->content }}</td>
						<td> 
							<?php
								if(App\Cat::find($product->cat_id) ){
								//		echo App\Cat::find($product->cat_id)->name;
									//	echo App\Product::find($product->id)->cat;
									echo $cat =App\Product::find($product->id)->cat->name;
								//echo var_dump($cat);				
								}
							?>
						</td>
						<td>{{ $product->status_product }}
						</td>
						<td>  {{ $product->admin_id }}

							<?php
							if(App\Admin::find($product->admin_id) ){
								echo App\Admin::find($product->admin_id)->name;
							}
						?>
						</td>

					</tr>
				@endforeach
				 
				</tbody>
				</table>
				{!! Form::submit('Click Me!') !!}
				{!! Form::close() !!}	
				@endif
				<?php 
				if(isset($s_search)){
					$products->setPath($s_search);
				}else {
				$products->setPath('product');
			}
				echo $products->render(); 
				
				
				?>
			
			</div>

		</div>
	</div> 

	</div>
@include('admin.footer')


<script type="text/javascript">
	
	$("#checkAll").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});
</script>