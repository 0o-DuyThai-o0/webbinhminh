@include('admin.head')
<div id="wrapper" class="container admin-admin">
   <div class="row">
      <div id="sidebar-wrapper" class="col-md-3">
         @include('admin.sitebar')
      </div>
      <div id="page-content-wrapper" class="col-md-9 admin-content">
        @include('admin.succsess')
         <div class="row">
            <div class="">
               <div id="icon-edit" class="icon32 icon32-posts-post"><br></div>
               <h2 class="h2_bai_viet h2_bai_viet_product">Bài viết <a href="{!!  asset('admin/product/create'); !!}">Thêm mới </a> </h2>
            </div>
            <div class="row xuat_ban_product">
               <ul class="subsubsub">
                  <?php 
                     //if(!$s_search) { $s_search=NULL; }
                     if(!isset($s_search)) {
                     	$s_search="";
                     }
                     
                     ?>
                  <li class="all">
                  	<a href="{!!  asset('/admin/product/all-va-ban-nhap/1'); !!}" class="current">All <span class="count">({{ $all_products }})</span>
                  	</a> |</li>
                  <li class="publish"><a href="{!!  asset('admin/product'); !!}">Xuất bản <span class="count">({{ $all_products_1 }})</span></a> |</li>
                  <li class="draft"><a href="{!!  asset('admin/product/all-va-ban-nhap/-1'); !!}">Bản nháp <span class="\&quot;count\&quot;">({{ $all_products_0 }})</span></a></li>
               </ul>
               {!! Form::open(array('method' => 'POST','action' => array('Admin\ProductController@s_search',Request::input('s_search')))) !!}
               <p class="search-box">
                  <input type="search" id="post-search-input" name="s_search" 
                     value="<?php if(isset($s_search)) echo $s_search ; ?>">
                  <input type="submit" name="" id="search-submit" class="button" value="Tìm kiếm Sản phẩm">
               </p>
               {!! Form::close() !!}
            </div>
            <div class="row">
               <div class="tablenav top xu_ly_du_lieu_form">
                  {!! Form::open(array('method' => 'POST','action' => array('Admin\ProductController@delete_s_code'))) !!} 
                  <input type="hidden" name="action" value="" />
                  <div class="alignleft actions">
                     <select name="publish_unpublish">
                        <option value="-1" selected="selected">Chọn</option>
                        <option value="hoat_dong" class="hide-if-no-js">Hoạt động</option>
                        <option value="ban_nhap">Bản nháp</option>
                        <?php if(isset($delete_new)){
                           if($delete_new==1) {
                           ?>
                        <option value="xoa_vinh_vien">Xóa vĩnh viễn</option>
                        <?php }
                           }			
                           ?>				
                     </select>
                     <input type="submit" name="submit_1" id="doaction" class="button action" value="Áp dụng">
                  </div>
                  <div class="alignleft actions" style="padding-left: 29px;padding-right: 0;">
                     <select name="tac_gia"  class="postform">
                        <option value="-1" >Tác giả</option>
                        <?php if(isset($admin_changes)) {  ?>
                        @foreach( $admin_changes as $admin_change )
                        <option value="{{ $admin_change->id }}" <?php 
                           if(isset($tac_gia)) {
                           	if($admin_change->id==$tac_gia)
                           		echo "selected='selected' ";
                           }
                           	?> >{{ $admin_change->username }}
                           </option>
                        @endforeach
                        <?php } ?>
                     </select>
                  </div>
                  <div class="alignleft actions">
                     <select name="cat" id="cat" class="postform">
                      <option value="-1"> Tất cả </option>
                     <?php
                        if(isset($cat_parents)) {
                        	if(isset($cat11)) {
                        		showCategories($cats,0,'',$cat11);
                        	}else {
                        		showCategories_2x($cats);
                        	}
                        		}
                        		//view_category( $cat_parents,$cats,-1);
                        ?>
                     </select>
                     <input type="submit" name="submit_1" id="post-query-submit" class="button" value="Lọc">
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
            <div class="no_height_noi_dung_admin " >
               Không có sản phẩm nào.
            </div>
            No Product in Website
            @else	
             <div class="table-responsive" style="margin-top: 2%;">
                <table class="table">
                    <thead>
                        <tr class="rip_tr">
                        	<th> <label><input type="checkbox" id="checkAll"/></label> All  </th>
                            <th class="text-center">Stt</th>
                            <th> Bài viết </th>
                            <th> Ảnh </th>
                            <!-- <th>Ảnh liên quan </th>
                            <th class="">Giá </th> -->
                            <th class="">Nội dung </th>
                            <th class="">Danh mục</th>
                            <th> Ngày đăng </th>
                            <th class="">Trạng thái</th>
                            <th> Tác giả </th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php $i=0; $i<10;?>
                    	@foreach( $products as $product )
					             	<?php $i++; ?>
                        <tr class="x-hover">
                        	<td class="text-center">
                        		<label class="lable_checkbox"><input type="checkbox" name="checkbox[{{ $product->id }}]" value="{{ $product->id }}" /></label>  
                        	</td>
                            <td style="width: 10px;" class="text-center"><?php echo $i; ?></td>
                            <td style="font-size: 13px;"><a href="/admin/product/<?php echo $product->id ?>/edit">{{ $product->name }}</a>
                             <div class="action-2">
                                 <a href="/binhminh/<?= $product->product_alias;?>" target="_blank">  <button type="button" data-toggle="tooltip" title="Xem ngay !" class="btn btn-info btn-round btn-just-icon btn-sm" data-original-title="" title="">
                                         <i class="fa fa-file-text" aria-hidden="true"></i>
                                     </button>
                                 </a>
                                 <a href="/binhminh/admin/product/<?php echo $product->id ?>/edit"><button type="button" data-toggle="tooltip" title="Chỉnh sửa !" class="btn btn-success btn-round btn-just-icon btn-sm" data-original-title="" title="">
                                         <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                     </button>
                                 </a>
                             </div>


                            </td>
                            <td>
                            	<?php
                  								$img_xs=json_decode($product->image_list,1);
                                 
                  							
                  								foreach ($img_xs as $img_x) {
                                    
                                  
                  							?>
                                <img src="<?php echo $img_x['url'];?>" style="width: 50px;height: 50px;" alt="">
                              <?php } ?>
                            </td>
                            <!-- <td>
                            	<?php
								$img_xs=json_decode($product->image_lien_quan,1);

								if(isset($img_xs)==true) {
								foreach ($img_xs as $img_x) {
								?>
								<img style="width: 50px;height: 50px;" src="{{$img_x['url']}}" />
								<?php } } 
								?>
                            </td> -->
                            <!-- <td class="">
                                 <div>{{ number_format($product->price,0, ',', '.') }}đ</div>
                                 <del style="color: red">{{ number_format($product->price_old,0, ',', '.') }}đ</del>
                            	
                            </td> -->
                            <td>
                            	{{ str_limit(strip_tags($product->content),20) }}
                            </td>
							
							<td> 				
							<?php
							
							$mangs=explode('-', $product->cat_id);
							if(isset($mangs)==true) {
											foreach($mangs as $mang ){
												if(App\Cat::find($mang))
													echo App\Cat::find($mang)->name.'<br>';

										}
								
								}	
								?>
							</td>
                            <td class="td-actions">
                               {{ $product->created_at }}
                                
                            </td>
                            <td>
              <?php
                if($product->status_product == 1){
                  echo "Hoạt động";
                } else {echo "Bản nháp";}

              ?>    
              </td>
              <td>
               <?php 
                 echo $product->admin;
              ?>
              </td>
					</tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            @endif
            <div class="row">
               <div class="tablenav top xu_ly_du_lieu_form">
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
            {!! Form::close() !!}	
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
<script type="text/javascript">
   $("#checkAll1").change(function () {
      $("input:checkbox").prop('checked', $(this).prop("checked"));
   });
</script>