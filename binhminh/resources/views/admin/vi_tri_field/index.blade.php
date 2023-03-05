
@include('admin.head')
<div id="wrapper"  class="container admin-admin">
    <div class="row">
        <div id="sidebar-wrapper" class="col-md-3">
            @include('admin.sitebar')
        </div>
        <div id="page-content-wrapper" class="col-md-9 admin-content">
        @include('admin.succsess')
            <div class="row">
                <h2>Toàn bộ vị trí field </h2>
            </div>
            <div class="row">

                {!! Form::open(array('method' => 'POST','class'=>'detele-f','action' => array('Admin\PriceController@delete_s_code'))) !!} 
                  <input type="hidden" name="action" value="" />
                  <div class="alignleft actions">
                     <select name="publish_unpublish" class="" style="padding: 3px;">
                        <option value="1" selected="selected"> Xóa </option>
                     </select>
                     <input type="submit" name="submit_1" onclick="return myFunction();" id="doaction" class="button action" value="Áp dụng">
                  </div>
                     


                
            </div>
            <div class="row">
                <table class="table table-bordered edit-son">
                    <thead>
                    <tr>
                         <th> <label><input type="checkbox" id="checkAll_field"/></label> All  </th>
                        <th>Name Field</th>
                        <th> Vị trí </th>
                        <th> Mô tả  </th>
                        <th> Admin </th>
                        <th> Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                       @foreach($vitri as $hm)
                      
                     <tr>
                        <td class="text-center">
                               <label class="lable_checkbox"><input type="checkbox" name="checkbox[{{ $hm->id }}]" value="{{ $hm->id }}" /></label>  
                            </td>
                          <td><?= $hm->ten_vi_tri;?></td>
                         <td><?= $hm->stt;?></td>
                         <td><?= $hm->mo_ta;?></td>
                         <td>
                             <?= $hm->admin_id;?>
                         </td>
                         <td>
                             <div class="action-home">
                                 <a href="/binhminh/admin/vi_tri_field/<?php echo $hm->id ?>/edit"><button type="button" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa !" class="btn btn-success btn-round btn-just-icon btn-sm" data-original-title="" title="">
                                         <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                     </button>
                                 </a>

                         </td>
                     </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
{!! Form::close() !!}  
        </div>
    </div>

</div>
@include('admin.footer')
<script type="text/javascript">
   $("#checkAll_field").change(function () {
      $("input:checkbox").prop('checked', $(this).prop("checked"));
   });
</script>