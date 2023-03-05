
@include('admin.head')
<div id="wrapper"  class="container admin-admin">
    <div class="row">
        <div id="sidebar-wrapper" class="col-md-3">
            @include('admin.sitebar')
        </div>
        <div id="page-content-wrapper" class="col-md-9 admin-content">

            <div class="row">
                <h2>Tất cả Field Trang chủ </h2>
                @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
            </div>
             <div class="row">

                {!! Form::open(array('method' => 'POST','class'=>'detele-f','action' => array('Admin\HomeController@xoa_field'))) !!} 
                  <input type="hidden" name="action" value="" />
                  <div class="alignleft actions">
                     <select name="publish_unpublish" class="" style="padding: 3px;">
                        <option value="1" selected="selected"> Xóa </option>
                     </select>
                     <input type="submit" name="submit_1"  id="doaction" class="button action" value="Áp dụng">
                  </div>
                     


                
            </div>
            <div class="row">
                <table class="table table-bordered edit-son">
                    <thead>
                    <tr>
                      <th> <label><input type="checkbox" id="checkAll_field"/></label> All  </th>
                        <th>Content</th>
                        <th>Vị trí </th>
                        <th>Kiểu định dạng </th>
                        <th>Trạng thái </th>
                        <th> Admin </th>
                        <th> Action</th>
                    </tr>
                    </thead>
                    <tbody>
                       
                       @foreach($home as $hm)
                       
                     <tr>
                         <td class="text-center">
                               <label class="lable_checkbox"><input type="checkbox" name="xoafield[{{ $hm->id }}]" value="{{ $hm->id }}" /></label>  
                            </td>
                          <td><?= $hm->content;?></td>
                          <td >
						  
						  <div id='copy_sss'>
						  &lt;?php
                         home_field($all_field_home,<?=$hm->id_vitri;?>);
						 ?&gt;
						 </div>

						</td>
                         <td>
                             <?php 
							 
							 
                             foreach ($dinh_dang as  $vt) {
                                if($vt->id == $hm->id_dinhdang){
                                   echo $vt->ten_dinh_dang;
                                }
                             }
                           ?>
                          
                                
                            </td>
                         <td>
                            <?php if($hm->status== 1){ echo "hiện ";}else {echo "ẩn";} ?>
                         
                         <td>
                            <?php 
                              if(App\Admin::find($hm->admin_id)){
                                 echo App\Admin::find($hm->admin_id)->name; 
                              }
                           ?>
                            
                                
                            </td>
                         
                         <td>
                             <div class="action-home">
                                 <a href="/binhminh/admin/home/<?php echo $hm->id ?>/edit"><button type="button" rel="tooltip" class="btn btn-success btn-round btn-just-icon btn-sm" data-original-title="" title="">
                                         <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                     </button>
                                 </a>
                                  

                         </td>
                     </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
@include('admin.footer')
<script type="text/javascript">
   $("#checkAll_field").change(function () {
      $("input:checkbox").prop('checked', $(this).prop("checked"));
   });
</script>




