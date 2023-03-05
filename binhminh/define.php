<?php 
require_once 'Mobile_Detect.php';

$detect = new Mobile_Detect;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');


define('hang_mobile',$deviceType); // nhan dien thiet bi

$url_them12="portfolio-items";

define('count_phan_trang','21'); // hằng số phân trang là 20
define('so_san_pham_hien_thi_index','8');
define('so_san_pham_hien_thi_index_cat','21'); // hằng số phân trang là 20
// domain 
$sv = $_SERVER['SERVER_NAME'];
define('domain',$sv);
if(!isset($_SESSION['price'])) {
	$_SESSION['price']= 'vnd';							
}

function phan_trang_array($arr,$page_size=5,$base_path,$url_folder,$page) {

	$page_count = ceil(count($arr)/$page_size);// num of page
	$items = array_slice($arr, ($page-1)*$page_size, $page_size, true);
	return $items;
}

function home_field($home_field,$vi_tri){
   foreach ($home_field as $key => $value) {
   	if($value->id_vitri == $vi_tri){
         
   	   if($value->id_dinhdang == 7){
		   echo $value->content;
   	   	echo "<span style='position:relative'>";
         
        if(isset($_SESSION['admin'])){
         //   echo "<span class='cover_edit' style='right:0px;'>";
         // echo "<span class='edit_field'>".$vi_tri."</span>";
          echo "<a style='color:red;' target='_blank' href='/admin/home/".$value->id."/edit'>";
          echo "✎";
          echo "</a>"; 
        //  echo "</span>";
		  
      }
         echo "</span>";     
   	   }else if($value->id_dinhdang == 6){
   	                
            $img_content =  $value->content;
             $result='';
             preg_match_all('/<img[^>]+>/i',$img_content, $result); 
             foreach($result as $key =>$values){
            	foreach($values as $key =>$value2){

                echo "<div class='item'>";
                 echo "<a class='clearfix'>";
                echo $value2;
                echo "</a>";

                echo "</div>";
                
      
            }
   	   }
	  }else if($value->id_dinhdang == 8){
            $img_content =  $value->content;
             $result='';
            
             preg_match_all('/<img[^>]+>/i',$img_content, $result); 
             foreach($result as $key =>$values){
            	foreach($values as $key =>$value2){
               echo "<span style='position:relative'>";
                echo $value2;
              
                      if(isset($_SESSION['admin'])){
            echo "<span class='cover_edit' style=''>";
          echo "<span class='edit_field'>".$vi_tri."</span>";
          echo "<a target='_blank' href='/admin/home/".$value->id."/edit'>";
          echo "<i style='margin-left: 5px;' class='fa fa-pencil xoa-detele'></i>";
          echo "</a>"; 
          echo "</span>";
      }
        echo "</span>";

               
            }
   	   }
	  }
	  

   } 
  
}
}

/*====================================== CATEGORIES ===============================*/
function view_category_cat($categories, $parent_id = 0, $char = '')
			{ 
				
			    foreach ($categories as $key => $item)
			    { 
			    	                      
			        // Nếu là chuyên mục con thì hiển thị
			        if ($item->parent_id == $parent_id)
			        { 

			        	?>
			        	<tr class="<?php if($item->parent_id == 0 ){ echo "parent";}?> x-hover">
			        		<td class="cat_child">
										<label class="">
											<input type="checkbox" name="checkbox[<?php echo $item->id;?>]" value="<?php echo $item->id;?>" />    
										</label> 
			        		</td>
			        		
			        		<td>
			        			<?php echo $char;?><?php echo $item->name;?> <br>
			        			<div class="action-t">
                                 <a href="../<?php echo $item->cat_alias ?>" target="_blank">  <button type="button" data-toggle="tooltip" title="Xem ngay !" class="btn btn-info btn-round btn-just-icon btn-sm" data-original-title="" title="">
                                         <i class="fa fa-file-text" aria-hidden="true"></i>
                                     </button>
                                 </a>
                                 <a href="../admin/cat/<?php echo $item->id ?>/edit"><button type="button" data-toggle="tooltip" title="Chỉnh sửa !" class="btn btn-success btn-round btn-just-icon btn-sm" data-original-title="" title="">
                                         <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                     </button>
                                 </a>
                             </div>
			        		</td>
			        		<td>
			        			 <?php echo $item->cat_alias; ?>
			        		</td>
			        		<td style="text-align: center;"> <?php
							$img_xs=json_decode($item->category_avatar,1);
							//var_dump ($img_xs);
								if(isset($img_xs)==true) {
									
									foreach ($img_xs as $img_x) {
									?>
									<img style="width: 50px;height: 50px;" src="<?php echo $img_x['url'];?>" />
										<?php
									//	break;
									}
								}
							?>
							</td>
								<td style="text-align: center;"> <?php
							$img_xs=json_decode($item->banner_category,1);
							//var_dump ($img_xs);
								if(isset($img_xs)==true) {
									
									foreach ($img_xs as $img_x) {
									?>
									<img style="width: 50px;height: 50px;" src="<?php echo $img_x['url'];?>" />
										<?php
									//	break;
									}
								}
							?>
							</td>
						
							<td>
								<?php  echo $item->created_at; ?>
							</td>
							<td>
								<?php  echo $item->updated_at; ?>
							</td>
							<td>
								 <?php 
		                         $admin_id_create = $item->admin_id;
		                       
		                         if(App\Admin::find($admin_id_create))
		                                    echo App\Admin::find($admin_id_create)->name;
		                        ?>
							</td>
							
			        		
			        	</tr>
			        	
			        	
			            <?php 
			            // Xóa chuyên mục đã lặp
			            //unset($categories[$key]);
			            
			            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
			            view_category_cat($categories, $item->id, $char.'|---');

			
			        }
			    }
			}
?>

<?php
function showCategories($categories, $parent_id = 0, $char = '',$cat_id_current=0)
{
	echo $cat_id_current;
    foreach ($categories as $key => $item)
    {
          
        // Nếu là chuyên mục con thì hiển thị
        if ($item['parent_id'] == $parent_id)
        {
            ?>
            <option value="<?= $item->id;?>"
                    <?php if($item->id == $cat_id_current){ echo "selected";} ?>
            	>
                <?php echo $char . $item['name']; ?>
            </option>
            <?php
            // Xóa chuyên mục đã lặp
            unset($categories[$key]);

            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories, $item['id'], $char.'|---',$cat_id_current);
        }
    }
} 
?>
<?php
function showCategories_2x($categories, $parent_id = 0, $char = '')
{
    foreach ($categories as $key => $item)
    {

        // Nếu là chuyên mục con thì hiển thị
        if ($item['parent_id'] == $parent_id)
        {
            ?>
            <option value="<?= $item->id;?>">
                <?php echo $char . $item['name']; ?>
            </option>
            <?php
            // Xóa chuyên mục đã lặp
            unset($categories[$key]);

            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories_2x($categories, $item['id'], $char.'|---');
        }
    }
} 
?>

<?php

function view_menus_items($menus_items_parents,$menus_items,$cat_selected) {
	if (count($menus_items_parents) >= 1) {
	$iii=0;
		foreach( $menus_items_parents as $menus_items_parent ) {
			foreach( $menus_items as $menus_item ) {
				if($menus_items_parent->id==$menus_item->id) {
					
					?>
						
			        <option class="menu_1" style="font-size:16px;" value="<?php echo $menus_item->id ?>" <?php 
			        	if($menus_item->id== $cat_selected){
			        		echo "selected='selected' ";	
			        		$iii=1;
			        	} //echo $kaka++; 
			        ?> > 
							<?php echo $menus_item->name; ?>
			        </option>
			        <?php
			        foreach( $menus_items as $menus_item1 ) {
						if( $menus_item->id==$menus_item1->menus_item_id_parent ) {

						?>
						         <option class="s-child menu_2"style="font-size:15px;" value="<?php echo $menus_item1->id;  ?>"
								<?php  
			        				        	if($menus_item1->id== $cat_selected){
			        		echo "selected='selected' ";	
			        		$iii=1;
			        	} 
			        ?> 
						         >  
								&nbsp;-- <?php echo $menus_item1->name; ?>
						         </option>
						<?php
								 foreach( $menus_items as $menus_item2 ) {

								 		if( $menus_item1->id==$menus_item2->menus_item_id_parent ) {
								 			?>
							         <option class="s-child menu_3" style="font-size:14px;" value="<?php echo $menus_item2->id; ?>"
<?php 
			        				        	if($menus_item2->id== $cat_selected){
			        		echo "selected='selected' ";
			        		$iii=1;
			        	} 	
			        ?> 
							         >  
								&nbsp;&nbsp;-------<?php echo $menus_item2->name; ?>
							         </option>
							         <?php
								 		}
								 }
						}
					}


				}
			}	
		}
	}

}
/*======================================== CAT NEW ==========================================*/
///show view add new cat new 
function categories_new_admin($categories_news, $parent_id = 0, $char = '',$cat_new_id = 0){
   foreach ($categories_news as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item['parent_id'] == $parent_id)
        {
            ?>
            <option value="<?= $item->id;?>"
                <?php if($item->id == $cat_new_id) { echo "selected";} ?>
            	>

                <?php echo $char .$item->name; ?>
            </option>
            <?php
            // Xóa chuyên mục đã lặp
            unset($categories_news[$key]);

            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            categories_new_admin($categories_news, $item['id'], $char.'|---',$cat_new_id );
        }
    }
}

function categories_new_admin_2x($categories_news, $parent_id = 0, $char = ''){
   foreach ($categories_news as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item['parent_id'] == $parent_id)
        {
            ?>
            <option value="<?= $item->id;?>">

                <?php echo $char .$item->name; ?>
            </option>
            <?php
            // Xóa chuyên mục đã lặp
            unset($categories_news[$key]);

            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            categories_new_admin_2x($categories_news, $item['id'], $char.'|---');
        }
    }
}


function categories_new_admin_edit($categories_news, $parent_id = 0, $char = '',$cat_change){
	
	var_dump($categories_news);
	
	
   foreach ($categories_news as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item['parent_id'] == $parent_id)
        {
            ?>
            <option value="<?= $item->id;?>" <?php
				if($item->id==$cat_change) echo "kaka"; 
				
			?>   >
                <?php echo $char . $item['name']; ?>
            </option>
            <?php
            // Xóa chuyên mục đã lặp
            unset($categories_news[$key]);

            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            categories_new_admin_edit($categories_news, $item['id'], $char.'|---',$cat_change);
        }
    }
	
	
	
}


function view_menu_item_index($menu_item_parents,$menu_items,$cat_selected) {
	echo count($menu_items);
	if (count($menu_item_parents) >= 1) {
	$iii=0;
		foreach( $menu_item_parents as $menu_item_parent ) {
			
			foreach( $menu_items as $menu_item ) {
				if($menu_item_parent->id==$menu_item->id) {
					?>
						
			       <tr style="background:#ddd;border-bottom:1px solid #000">
				   
				   <td><label class="lable_checkbox"><input type="checkbox" name="checkbox[<?php echo $menu_item->id ?>]" value="<?php echo $menu_item->id ?>" /></label>  <?php echo $menu_item->name ?> <br>
				   		<a class="show-1" href="/binhminh/admin/menusitem/<?php echo $menu_item->id ?>/edit"> edit
						</a>
						</td> 
						<td>  <?php echo $menu_item->menus_alias; ?></td>
						<td>  <?php echo $menu_item->cat_id_show ;?></td>
						<td>  <?php echo $menu_item->menus_item_url ;?></td>
						<td>  					
							<?php if($menu_item->status_menusitem){ echo "<p class='hoat_dong'>hoạt động<p>";}else {echo "<p class='ban_nhap'>bản nháp<p>";} ?>
							</td>
							
							
						<td> <?php echo $menu_item->menus_item_id_parent; ?></td>
				   </tr>
			        <?php
			        foreach( $menu_items as $menu_item1 ) {
						if( $menu_item->id==$menu_item1->menus_item_id_parent ) {
						?>
						 <tr>
							<td><label class="lable_checkbox"><input type="checkbox" name="checkbox[<?php echo $menu_item1->id ?>]" value="<?php echo $menu_item1->id ?>" /></label>-----<?php echo $menu_item1->name; ?>
							<br/>
							<a class="show-1" href="/admin/menusitem/<?php echo $menu_item1->id ?>/edit"> edit						</a>
							</td>
						<td>  <?php echo $menu_item1->menus_alias; ?></td>
						<td>  <?php echo $menu_item1->cat_id_show ;?></td> 
						<td>  <?php echo $menu_item1->menus_item_url ;?></td>
						<td>  					
							<?php if($menu_item->status_menusitem){ echo "<p class='hoat_dong'>hoạt động<p>";}else {echo "<p class='ban_nhap'>bản nháp<p>";} ?>
							</td>
						<td> <?php echo $menu_item1->menus_item_id_parent; ?></td>
						 </tr>
						<?php
								 foreach( $menu_items as $menu_item2 ) {

								 		if( $menu_item1->id==$menu_item2->menus_item_id_parent ) {
								 			?>
							         <tr>
										<td><label class="lable_checkbox"><input type="checkbox" name="checkbox[<?php echo $menu_item2->id ?>]" value="<?php echo $menu_item2->id ?>" /></label>
											---------<?php echo $menu_item2->name; ?>									<br/>
									<a class="show-1" href="/binhminh/admin/menusitem/<?php echo $menu_item2->id ?>/edit"> edit						</a>
										</td>
						<td>  <?php echo $menu_item2->menus_alias; ?></td>
						<td>  <?php echo $menu_item2->cat_id_show ;?></td>
						<td>  <?php echo $menu_item2->menus_item_url ;?></td>
						<td>  					
							<?php if($menu_item->status_menusitem){ echo "<p class='hoat_dong'>hoạt động<p>";}else {echo "<p class='ban_nhap'>bản nháp<p>";} ?>
							</td>
						<td> <?php echo $menu_item2->menus_item_id_parent; ?></td>
									</tr>
							         <?php
								 		}
								 }
						}
					}
				}
			}	

		}
	}
}
function check_item_child($menu_items,$id) {
	if (count($menu_items) >= 1) {
		foreach( $menu_items as $menu_item ) {
			if( $menu_item->menus_item_id_parent==$id ) {
				return true;
			}
		}
	return false;
	}
}
function view_menus_site_index($menus_items_parents,$menus_items,$cat_selected) {
	if (count($menus_items_parents) >= 1) {
		
		echo "<ul class='level_1'>";

		foreach( $menus_items_parents as $menus_items_parent ) {
			foreach( $menus_items as $menus_item ) {
				if($menus_items_parent->id==$menus_item->id) {
					
					?>
						<li class="li_level_1"> <a href="/<?php echo $menus_item->menus_alias;?>"><?php echo $menus_item->name; ?>  </a>
						
											

					<ul   class="level_2">
					<?php
						
			        foreach( $menus_items as $menus_item1 ) {
						if( $menus_item->id==$menus_item1->menus_item_id_parent ) {
							

										echo"<li>"; 	
										?>
										<a href="../<?php echo $menus_item1->menus_alias;?>"><?php echo $menus_item1->name; ?>  </a>
										<?php
										//	echo "<a href='#'>".$menus_item1->name."</a>";
										echo"</li>";	
	
							
						}
					}	
					?>
					
					</ul> </li>
					<?php
				}
			}	
		}
	echo '</ul>';								
					
	}

}
function convert_vi_to_en($str) {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
		$str = preg_replace('/ /', '-', $str);
		$str = str_replace('!', '-', $str);
		$str = str_replace(',', '-', $str);
		$str = str_replace('/', '-', $str);
		$str = str_replace('|', '-', $str);
		$str = str_replace('.', '-', $str);
		$str = str_replace(';', '-', $str);
		$str = str_replace('----', '-', $str);
		$str = str_replace('----', '-', $str);
		$str = str_replace('---', '-', $str);
		$str = str_replace('--', '-', $str);
		$str = str_replace('--', '-', $str);
		$str = str_replace('?', '', $str);
		$str = str_replace('!', '', $str);
        $str = str_replace( "ß", "ss", $str);
        $str = str_replace( "%", "", $str);
        $str = preg_replace("/[^_a-zA-Z0-9 -] /", "",$str);
        $str = str_replace("@", "",$str);
        $str = str_replace("#", "",$str);
        $str = str_replace("$", "",$str);
        $str = str_replace("*", "",$str);
        $str = str_replace("(", "",$str);
        $str = str_replace(")", "",$str);
        $str = str_replace("'", "",$str);
        $str = str_replace(array('%20', ' '), '-', $str);
	//print preg_replace('/[^a-zA-Z0-9]/','',$str); 
	//print preg_replace('/[^a-zA-Z0-9\-_]/','',$str);
	
		$str=trim($str,'');
		$str=trim($str,'-');
		
        return $str;
    }

    // list Category new alias 
function view_category_cat_new($categories_new, $parent_id = 0, $char = '') {
				
			    foreach ($categories_new as $key => $item)
			    { 
			    	                 
			        // Nếu là chuyên mục con thì hiển thị
			        if ($item->parent_id == $parent_id)
			        { 

			        	?>
			        	<tr class="<?php if($item->parent_id == 0 ){ echo "parent";}?> x-hover">
			        		<td class="cat_child">
										<label class="">
											<input type="checkbox" name="checkbox[<?php echo $item->id;?>]" value="<?php echo $item->id;?>" />    
										</label> 
			        		</td>
			        		
			        		<td>
			        			<?php echo $char;?><?php echo $item->name;?> <br>
			        			<div class="action">
                                 <a href="/binhminh/<?php echo $item->cat_new_alias ?>" target="_blank">  <button type="button" data-toggle="tooltip" title="Xem ngay !" class="btn btn-info btn-round btn-just-icon btn-sm" data-original-title="" title="">
                                         <i class="fa fa-file-text" aria-hidden="true"></i>
                                     </button>
                                 </a>
                                 <a href="/binhminh/admin/cat-new/<?php echo $item->id ?>/edit"><button type="button" data-toggle="tooltip" title="Chỉnh sửa !" class="btn btn-success btn-round btn-just-icon btn-sm" data-original-title="" title="">
                                         <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                     </button>
                                 </a>
                             </div>
			        		</td>
			        		<td>
			        			 <?php echo $item->cat_new_alias; ?>
			        		</td>
			        		<td style="text-align: center;"> 
							</td>
						
							<td>
								<?php  echo $item->created_at; ?>
							</td>
							<td>
								<?php  echo $item->updated_at; ?>
							</td>
							
			        		
			        	</tr>
			        	
			        	
			            <?php 

			            view_category_cat_new($categories_new, $item->id, $char.'|---');
			        }
			    }
			}

function get_list_cat_chil($cat_parents,$cats,$cat_selected) {

	if (count($cat_parents) >= 1) {
	$iii=0;
		foreach( $cat_parents as $cat_parent ) {
			
			foreach( $cats as $cat ) {
				if($cat_parent->id==$cat->id) {
					echo $cat->id ;
			        foreach( $cats as $cat1 ) {
						if( $cat->id==$cat1->parent_id ) {
							echo $cat1->id; 
								 foreach( $cats as $cat2 ) {
								 		if( $cat1->id==$cat2->parent_id ) {
												echo $cat2->id ;
								 		}
								 }
						}
					}
				}
			}

		}
	}
}
function get_list_cat_chilrent($cats,$cat_id) {
	if (count($cats) >= 1) {
		$array_list=[];
		foreach( $cats as $cat ) {
			if($cat->id == $cat_id)
			{
				array_push($array_list,$cat_id);
				foreach($cats as $cat1){
					
					if($cat1->parent_id==$cat_id) {
						array_push($array_list,$cat1->id);
					}
				}
		
			}

		}
return $array_list;
	}
}
function showCategories_menu($khach_truy_cap_all_array, $char = '')
{ 

				     foreach ($khach_truy_cap_all_array as $key =>$mang) {

					   echo "<li>".$mang['text'];
					   
					   unset($khach_truy_cap_all_array[$key]);
					   if(isset($mang['children'])) {
						   echo "<ul>";
								foreach ($mang['children'] as $key1 =>$mang1) {


								//	echo "<li>------- ".$mang1['text']."</li>";
									
									showCategories_menu($mang['children'],$char.'|---');
						
						}
						 echo "</ul>";
					   }
					    echo "</li>";
					}

}


function is_json($string,$return_data = false) {
    $data = json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE) ? ($return_data ? $data : TRUE) : FALSE;
}
function showCategories_edit_product($categories, $parent_id = 0,$product_cat_id=0,$cat_khoa_chinh, $char = '')
{
    foreach ($categories as $key => $item) 
    {
										$checked='';
										$checked_radio='';
										$mangs=explode('-', $product_cat_id);
										$disabled='disabled';
										$opacity=0;
										if(isset($mangs)==true) {
											foreach($mangs as $mang ){
												if( $mang==$item->id) {
													
													$checked="checked";
													$opacity=1;
													$disabled="";
												//	$checked_radio="checked";
													break ;

												}
											}
										}
        // Nếu là chuyên mục con thì hiển thị
        if ($item['parent_id'] == $parent_id)
        {
						$khoa_chinh=0;
						if($item->id == $cat_khoa_chinh) {
							$checked_radio='checked';
							$khoa_chinh=1;
						}
            ?>
			
			<li class="cat_danhmuc"> 
				<input id="cat_<?= $item->id;?>" class="class_checkbox_js" type="checkbox" name="checkbox[<?= $item->id;?>]" value="<?= $item->id;?>"
					<?php echo $checked; ?>

					/>
				
				  <?php 
				  echo $char.$item->name; 
				  
				  ?>
				  <label class="radio-inline" style="opacity:<?php echo $opacity; ?>">
					<input type="radio" class="optradio" name="optradio" value="<?= $item->id;?>" <?php echo $checked_radio ; echo $disabled; ?> > <b>
					<?php
					
					if($khoa_chinh == 1) 
					{
					 echo "<img src='/public/images/b_primary.png' />"; 	
					}
						else {
						echo "<img src='/public/images/hoi_primary.png' />"; 
						}
						
					
					?>
					
					</b>
					</label>

			</li>
            <?php
            // Xóa chuyên mục đã lặp
           // unset($categories[$key]);

            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories_edit_product($categories, $item['id'],$product_cat_id,$cat_khoa_chinh, $char.'|--------');
        }
    }
}
function showCategories_edit_color_product($categories, $parent_id = 0,$product_cat_id=0,$cat_khoa_chinh, $char = '')
{
    foreach ($categories as $key => $item) 
    {
										$checked='';
										$checked_radio='';
										$mangs=explode('-', $product_cat_id);
										$disabled='disabled';
										$opacity=0;
										if(isset($mangs)==true) {
											foreach($mangs as $mang ){
												if( $mang==$item->id) {
													
													$checked="checked";
													$opacity=1;
													$disabled="";
												//	$checked_radio="checked";
													break ;

												}
											}
										}
        // Nếu là chuyên mục con thì hiển thị
        if ($item['parent_id'] == $parent_id)
        {
						$khoa_chinh=0;
						if($item->id == $cat_khoa_chinh) {
							$checked_radio='checked';
							$khoa_chinh=1;
						}
            ?>
			
			<li class="cat_danhmuc"> 
				<input id="cat_<?= $item->id;?>" class="class_checkbox_js" type="checkbox" name="checkbox[<?= $item->id;?>]" value="<?= $item->id;?>"
					<?php echo $checked; ?>

					/>
				
				  <?php 
				  echo $char.$item->name; 
				  
				  ?>
				  <label class="radio-inline" style="opacity:<?php echo $opacity; ?>">
					<input type="radio" class="optradio" name="optradio" value="<?= $item->id;?>" <?php echo $checked_radio ; echo $disabled; ?> > <b>
					<?php
					
					if($khoa_chinh == 1) 
					{
					 	echo "<img src='/public/images/b_primary.png' />"; 
					}

					else {
						echo "<img src='/public/images/hoi_primary.png' />"; 
					}
						
					
					?>
					
					</b>
					</label>

			</li>
            <?php
            // Xóa chuyên mục đã lặp
           // unset($categories[$key]);

            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories_edit_product($categories, $item['id'],$product_cat_id,$cat_khoa_chinh, $char.'|--------');
        }
    }
}
function showCategories_edit_jquey($categories){
	foreach ($categories as $key => $item) {
		echo "$( '#cat_".$item->id."' ).click(function() {	
			if (this.checked){ 
			
			
				$(this).parents('.cat_danhmuc').find('.radio-inline').css('opacity','1');						
				$(this).parents('.cat_danhmuc').find('.optradio').attr('disabled', false);  
			}
			else {	
				$(this).parents('.cat_danhmuc').find('.optradio' ).prop('checked', false );
				$(this).parents('.cat_danhmuc').find( '.optradio' ).next().children().attr('url','./public/images/hoi_primary.png');
				$(this).parents('.cat_danhmuc').find( '.optradio' ).next().css('font-weight','100');
				$(this).parents('.cat_danhmuc').find( '.radio-inline' ).css('opacity','0');
			    $(this).parents('.cat_danhmuc').find( '.optradio' ).attr('disabled', true);	  }});
		
		";
		
	}
}


function convert_product_price($priceFloat) {
	$symbol = 'đ';
	$symbol_thousand = '.';
	$decimal_place = 0;
	$price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);
	return $price.$symbol;
}


function showCategories_menu_top_one($khach_truy_cap_all_array, $char = '')
{
	

				     foreach ($khach_truy_cap_all_array as $key =>$mang) {
						 $dropdown='nav-item dropdown position-relative';
						 $span_caret='';
						 $dropdown_a ='nav-link';
						 $dropdown_submenu = '';
					
						 if(isset($mang['children'])) {
							 $ton_tai_con=$mang['children'];
							 $dropdown="nav-item dropdown position-relative";
							 $span_caret="<span class='caret'></span>";
							 $dropdown_a = "";
							 $dropdown_submenu = "";
						 }

					   echo "<li class='".$dropdown."'> <a class='".$dropdown_a."' href='/binhminh".$mang['href']."'>".$mang['text'].$span_caret."</a>";
					   
					   unset($khach_truy_cap_all_array[$key]);
					   
					   if(isset($mang['children'])) {
							showCategories_menu_top_one($mang['children'],$char.'|---');
					   }
					    echo "</li>";
						
						
					}
					
					

}

function showCategories_menu_top_one_header($khach_truy_cap_all_array, $char = '')
{
				     foreach ($khach_truy_cap_all_array as $key =>$mang) {
						 $dropdown='';
						 $span_caret='';
						 $dropdown_a ='nav-link dropdown-item';
						 $dropdown_submenu = '';
						$link_con='';
						// $dau_cham="0";
						 if(isset($mang['children'])) {
							 $ton_tai_con=$mang['children'];
							 $dropdown="nav-item dropdown the_chua_dep";
							 $span_caret="";
							 $dropdown_a = "nav-link dropdown-toggle";
							 $dropdown_submenu = "";
							// $dau_cham="1";
							 
							//  $link_con="id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'";
						 }
					   echo "<li class='".$dropdown."'> <a class='".$dropdown_a."' .$link_con. href='/binhminh".$mang['href']."'>".$mang['text'].$span_caret."</a>";
					   
					   unset($khach_truy_cap_all_array[$key]); 
					   
					   if(isset($mang['children'])) {
						   echo "<ul class='menu_phu1 dropdown-menu d-none list-unstyled text-uppercase m-0' aria-labelledby='navbarDropdown'>";
									showCategories_menu_top_one_header($mang['children'],$char.'|---');
						   echo "</ul>";				    
					   }
					    echo "</li>";	
					}					

}

function showCategories_menu_top_mobile_header($khach_truy_cap_all_array, $char = '')
{
				     foreach ($khach_truy_cap_all_array as $key =>$mang) {
						 $dropdown='border-bottom';
						 $span_caret='';
						 $dropdown_a ='';
						 $dropdown_submenu = '';
						$link_con='';
						 if(isset($mang['children'])) {
							 $ton_tai_con=$mang['children'];
							 $dropdown="border-bottom";
							 $span_caret="";
							 $dropdown_a = "";
							 $dropdown_submenu = "";
							 $link_con="id='' role='' data-bs-toggle='' aria-expanded='false'";
						 }
					   echo "<li class='".$dropdown."'> <a class='".$dropdown_a."' .$link_con. href='/binhminh".$mang['href']."'>".$mang['text'].$span_caret."</a>";
					   
					   unset($khach_truy_cap_all_array[$key]);
					   
					   if(isset($mang['children'])) {
							echo "<ul class='menu_phu1 d-none'>";
								showCategories_menu_top_mobile_header($mang['children'],$char.'|---');	
							echo "</ul>";				    
					   }
					    echo "</li>";	
					}					

}

function menu_sitebar($khach_truy_cap_all_array, $char = '')
{
				     foreach ($khach_truy_cap_all_array as $key =>$mang) {
						 $dropdown='undertitle';
						 $span_caret='';
						 $dropdown_a ='second-a';
						 $dropdown_submenu = '';
					
						 if(isset($mang['children'])) {
							 $ton_tai_con=$mang['children'];
							 $dropdown="";
							 $span_caret="<span class='caret'></span>";
							 $dropdown_a = "first-a";
							 $dropdown_submenu = "";
						 }

					   echo "<li class='".$dropdown."'> <a class='".$dropdown_a."' href='".$mang['href']."'>".$mang['text'].$span_caret."</a>";
						 															
					    echo "</li>";
						
						 unset($khach_truy_cap_all_array[$key]);
					   if(isset($mang['children'])) {
					     
						   echo "<ul class='left1-menu'>";
									menu_sitebar($mang['children'],$char.'|---');
						   echo "</ul>";
					   					    
					   }

					   
						
						
					}			

}

function showCategories_menu_index_footer($khach_truy_cap_all_array, $char = '')
{
				     foreach ($khach_truy_cap_all_array as $key =>$mang) {
						 $dropdown='nav-item';
						 $span_caret='';
						 $dropdown_a ='nav-link';
						 $dropdown_submenu = '';
					
						 if(isset($mang['children'])) {
							 $ton_tai_con=$mang['children'];
							 $dropdown="nav-item";
							 $span_caret="";
							 $dropdown_a = "nav-link";
							 $dropdown_submenu = "";
						 }
						 echo "<div class='col-12 col-sm-4 col-md-4 col-lg-4 '>";
					  // echo $mang['text'];
					  echo" <a href='".$mang['href']."' class='".$mang['title']."'>".$mang['text']." </a> ";
					   unset($khach_truy_cap_all_array[$key]);
					   
					    echo "</div>";	
					}					

}

function show_menu_mobile_array($array_con,$tang=0) {
	
	foreach ($array_con as $key =>$mang) {
		
		  echo "<li class=''> <a class='' href='".$mang['href']."'>".$mang['text']."</a>";
							   if(isset($mang['children'])) {

						   		$tang=$tang+1;
						   			
									show_menu_mobile_array($mang['children'],$tang);
					   					    
					   }
					     echo "</li>";
	}
}


function sidebar_menu_array_con_menu($array_con,$tang=0) {
	
	foreach ($array_con as $key =>$mang) {
		$class_li="";
		if($tang == 0){
           $class_li="cat-mega-title";
			 }
		  echo "<li class=''> <a class='' href='/binhminh".$mang['href']."'>".$mang['text']."</a>";
							   if(isset($mang['children'])) {

						   echo "<ul class=''>";
						   		$tang=$tang+1;
						   			
									sidebar_menu_array_con_menu($mang['children'],$tang);
						   echo "</ul>";
						  
					   					    
					   }
					     echo "</li>";
		}
	}





function showCategories_brecum($categories, $id = 0,$char)
{

    foreach ($categories as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item->id == $id)
        {
			
					$json_cat_1='{
						"name"  : "'.$item->name.'",
						"url" : "'.$item->cat_alias.'" 
					}';
					
					//echo strlen($char);
				//	echo $char;
				
					$char=$json_cat_1.','.$char;
					
					
            unset($categories[$key]);

            // Tiếp tục đệ quy để tìm chuyên mục cha của chuyên mục đang lặp
            $char=showCategories_brecum($categories, $item->parent_id, $char);
// return $char; 
        }
		

    }


return $char;
}
function breacumb_single($product,$cats){


							if($product->cat_khoa_chinh == 0 || $product->cat_khoa_chinh == null) {
								
							$list_array=explode ('-',$product->cat_id);

							$cat_chinh=$list_array['1']; // tìm cat chính
							}else {
								$cat_chinh=$product->cat_khoa_chinh; // tìm cat chính
								
							}
							$char="";
							$json_cat_ok=showCategories_brecum($cats,$cat_chinh,$char); // chuỗi json của cat

							
					//		echo substr($json_cat_ok, -1); // trả về phần tử cuối cùng của chuỗi
							if(substr($json_cat_ok, -1)==',') { // xóa phần tử phẩy ở cuối nếu có

								$json_cat_ok= substr($json_cat_ok, 0, -1); // xóa phần tử phẩy ở cuối
								$json_cat_json="[".$json_cat_ok."]"; // thành chuỗi json
								
								   $array_cat_json = json_decode($json_cat_json, true);  // chuyển mảng
								   
								$dem_dem= count($array_cat_json);
								$i=0;
								foreach ($array_cat_json as $key =>$mang) {
									
									if($i==$dem_dem-1) {
										echo "<li class='active'><a  href=".$mang['url'].">".$mang['name']."</a></li>";
									}else {
										echo "<li><a href=".$mang['url'].">".$mang['name']."</a></li>";
									}
									 
									 $i= $i+1;
								}

							}
						
}

function showCategories_brecum_cat($categories, $id = 0,$char="")
{

    foreach ($categories as $key => $item)
    { 
        // Nếu là chuyên mục con thì hiển thị
        if ($item->id == $id)
        {
			
					$json_cat_1='{
						"name"  : "'.$item->name.'",
						"url" : "'.$item->cat_alias.'" 
					}';
					
					//echo strlen($char);
				//	echo $char;
				
					$char=$json_cat_1.','.$char;
					
					
            unset($categories[$key]);

            // Tiếp tục đệ quy để tìm chuyên mục cha của chuyên mục đang lặp
            $char=showCategories_brecum_cat($categories, $item->parent_id, $char);
// return $char; 
        }
		

    }


return $char;
}
			function breacumb_cat($cat,$cats){
                 
                          $cat_chinh = $cat->id;
							$char="";
							$json_cat_ok=showCategories_brecum_cat($cats,$cat_chinh,$char); // chuỗi json của cat
							
					//		echo substr($json_cat_ok, -1); // trả về phần tử cuối cùng của chuỗi
							if(substr($json_cat_ok, -1)==',') { // xóa phần tử phẩy ở cuối nếu có

								$json_cat_ok= substr($json_cat_ok, 0, -1); // xóa phần tử phẩy ở cuối
								$json_cat_json="[".$json_cat_ok."]"; // thành chuỗi json
								
								   $array_cat_json = json_decode($json_cat_json, true);  // chuyển mảng
								   
								$dem_dem= count($array_cat_json);
								$i=0;
								foreach ($array_cat_json as $key =>$mang) {
									
									if($i==$dem_dem-1) {
										echo "<li class='active'><a  href=".$mang['url'].">".$mang['name']."</a></li>";
									}else {
										echo "<li><a  href=".$mang['url'].">".$mang['name']."</a></li>";
									}
									 
									 $i= $i+1;
								}

							}
						
}
function showCategories_cat_product($categories, $parent_id = 0, $char = '')
{
    foreach ($categories as $key => $item) 
    {
    								
				
//exit();				
        // Nếu là chuyên mục con thì hiển thị
        if ($item['parent_id'] == $parent_id)
        {
        	$khoa_chinh=0;
					
           ?>
         
           	 <li class="cat_danhmuc"> 
           	 	<input id="cat_<?= $item->id;?>" id="mycheckbox" class="class_checkbox_js" type="checkbox" name="checkbox[<?= $item->id;?>]" value="<?= $item->id;?>"

					 />
				
				  <?php 
				   	echo $char.$item->name; 
					//echo $item->name; 		

				  ?>
				  <label class="radio-inline" style="    opacity: 0;">
					<input type="radio" class="optradio" name="optradio" value="<?= $item->id;?>" disabled="disabled"  >
					 <b>
					  	<img src="./public/images/hoi_primary.png" alt="">
					 
					</b>
					</label>
				
                  
				</li>
           
           <?php 
         
           unset($categories[$key]);

            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories_cat_product($categories, $item['id'], $char.'|--------');
        }
    }
}

function showCategories_cat_product_home($categories, $parent_id = 0, $char = '')
{
    foreach ($categories as $key => $thang)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($thang->parent_id == $parent_id)
        {
        	$class_danhmuc = '';
        	if($thang->parent_id == 0){
            $class_danhmuc = 'helo';
        	}else {
        	 $class_danhmuc = 'helo2';
        	}
            echo '<option value="'.$thang->id.'" class='.$class_danhmuc.'>';
                echo "" . $thang->name;
            echo '</option>';
             
            // Xóa chuyên mục đã lặp
            unset($categories[$key]);
             
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories_cat_product_home($categories, $thang->id, $char.'   ');
        }
    }
}
function showCategories_cat_product_sidebar($categories, $parent_id = 0, $char = '')
{
    foreach ($categories as $key => $thang)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($thang->parent_id == $parent_id)
        {
        	$class_danhmuc = '';
        	if($thang->parent_id == 0){
            $class_danhmuc = 'helo';
        	}else {
        	 $class_danhmuc = 'helo2';
        	}
        	echo "<li>";
            echo '<a href=/'.$thang->cat_alias.' class='.$class_danhmuc.'>';
                echo "" . $thang->name;
            echo '</a>';
            echo "</li>";
             
            // Xóa chuyên mục đã lặp
            unset($categories[$key]);
             
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories_cat_product_sidebar($categories, $thang->id, $char.'   ');
        }
    }
}






function category__dmchinh($categories){
	foreach ($categories as $key => $item) {
		echo "$( '#cat_".$item->id."' ).click(function() {	
			if (this.checked){
			if($('.class_checkbox_js:checked').size() == 1 )									
			{
				if (this.checked){										
					$(this).parents('.cat_danhmuc').find('.optradio' ).prop('checked', true );
					$(this).parents('.cat_danhmuc').find( '.optradio' ).next().children().attr('src','./public/images/b_primary.png');

				}						
			}		
			$(this).parents('.cat_danhmuc').find('.radio-inline').css('opacity','1');							
			$(this).parents('.cat_danhmuc').find('.optradio').attr('disabled', false); 
			

		}
			else {
			$(this).parents('.cat_danhmuc').find('.optradio' ).prop('checked', false );		
			$(this).parents('.cat_danhmuc').find( '.optradio' ).next().children().attr('src','./public/images/hoi_primary.png');
			$(this).parents('.cat_danhmuc').find( '.optradio' ).next().css('font-weight','100');
			$(this).parents('.cat_danhmuc').find( '.radio-inline' ).css('opacity','0');
			$(this).parents('.cat_danhmuc').find( '.optradio' ).attr('disabled', true);	  }});";
		
	}
}
