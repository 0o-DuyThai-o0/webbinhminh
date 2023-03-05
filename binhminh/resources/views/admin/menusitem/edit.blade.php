
@include('admin.head')
	<div id="wrapper"  class="container admin-admin">
	<div class="row">
		<div id="sidebar-wrapper" class="col-md-3">
			@include('admin.sitebar')
		</div>
		<div id="page-content-wrapper" class="col-md-9 admin-content">
			<div class="row">

					<div class="col-md-6">
					<h2 class="h2_bai_viet h2_bai_viet_product">Tạo item mới cho Menu</h2>
						{!! Form::open(array('method' => 'PATCH','action' => array('Admin\MenusitemController@update',$menuitem->id))) !!}
						<div class="row change_select_menu">
						<input class="form-control" style="display:none" name="id_of_menu" type="text" value="{{$menus_id}}">
						
							<div class="menus_select">
									Name
							</div>
							<div class="col-sm-9">
							{!! Form::text('name_create_menusitem',$menuitem->name,array('class' => 'form-control')) !!}
								

								
							</div>
						</div>
						<div class="row change_select_menu" >
							<div class="menus_select">
									Alias
								</div>
							<div class="col-sm-9">
								{!! Form::text('alias_create_menusitem',$menuitem->menus_alias,array('class' => 'form-control')) !!}
								
							</div>		
						</div>
						<div class="row change_select_menu">
							<div class="menus_select">
									Chọn Menu item cha
								</div>
							<div class="col-sm-9">
						<?php
							//$all_menus_item=
							$all_menus_item1s = App\Menusitem::all();
					
							$all_menus_item =new App\Menusitem;
							$all_menus_item_parents=$all_menus_item->how_menu_s($menus_id);

							
							$all_menus_item1s = App\Menusitem::all();
					
							$all_menus_item =new App\Menusitem;
							$all_menus_item1 =new App\Menusitem;

							$all_menus_item_parents=$all_menus_item->how_menu_s($menus_id);
							
							$parent=$all_menus_item1->how_menu_s_parent($menus_id,0);						
							
						
						?>
								<select class="form-control" name="menus_item_id">
							<option class="menu_1" style="font-size:16px;" value="0"> 
								Chọn menu item Cha		11	        
							</option>
									<?php
									//view_menus_items( $all_menus_item_parents,$all_menus_item1s,$menus_id);
									//view_category( $all_menus_item_parents,$all_menus_item1s,-1);
									view_menus_items( $parent,$all_menus_item_parents,-1);
									?>
									

							    </select>
							</div>		
						</div>		
						<div class="row change_select_menu">
							<div class="menus_select">
									Điền url vào Menu item
								</div>
								
							<div class="col-sm-9"> 
							{!! Form::text('menu_item_url',$menuitem->menus_item_url,array('class' => 'form-control')) !!}
							</div>		
							<div class="col-sm-1 radio_s_change">
								<input type="radio" name="change_s_s" value="1" checked>
							</div>
						</div>							
						<div class="row ">
							<div class="menus_select">
									Chọn Danh mục hiển thị Sản phẩm
								</div>
								
							<div class="col-sm-9">
							
							<select class="form-control" name="cat_id_show">
						<?php
							$cat1s = App\Cat::all();
						//	echo count($cat1s);
							$cat_parents = DB::table('cat')->where('parent_id', 0)->get();
							echo count($cat_parents);
						
						view_category( $cat_parents,$cat1s,$menuitem->cat_id_show);
						
						?>
						</select>
							</div>		
							<div class="col-sm-1 radio_s_change">
							<input type="radio" name="change_s_s" value="2" >
							</div>
						</div>	
						
						
						<div class="col-md-6" style="padding-top:15px;">
							{!! Form::submit('Edit',array('class' => 'btn btn-default')) !!}
						</div>
						{!! Form::close() !!}
					</div>

			</div>
		</div>
	</div> 

	</div>
@include('admin.footer')