
@include('admin.head')
<div id="wrapper"  class="container admin-admin">
    <div class="row">
        <div id="sidebar-wrapper" class="col-md-3">
            @include('admin.sitebar')
        </div>
        <div id="page-content-wrapper"  class="col-md-9 admin-content">
            <h2>Tạo Field mới cho Trang chủ </h2>
            <!--  <div class="row add-user">
                <div class="col-md-1">
                    Ảnh Field
                </div>
                <div class="col-md-11">
                    <div class="row">

                        {!! Form::open(array('method' => 'POST','action' => array('Admin\HomeController@them_anh_field_create' ))) !!}
                        <input type="text" name="Image" class="btn btn-default" id="Image_home" placeholder="Tìm ảnh"  readonly onclick="BrowseServer_home();" >


                        {!! Form::submit('Thêm ảnh',array('class' => 'btn btn-default')) !!}
                        {!! Form::close() !!}
                    </div>
                    <div class="row">

                        <?php
                        for($i=0;$i<10;$i++){
                        $s='image_field_create_'.$i;
                        if(isset($_SESSION[$s])) {
                        //echo $_SESSION[$s];
                        ?>
                        <div class="img_x">
                            <img class="img_avatar" src="{{ $_SESSION[$s] }}">
                            {!! Form::open(array('method' => 'POST','action' => array('Admin\HomeController@xoa_anh_field_home_create',$i ))) !!}
                            {!! Form::submit('x',array('class' => 'btn btn-default')) !!}
                            {!! Form::close() !!}
                        </div>
                        <?php
                        //echo '=====-';
                        }
                        }
                        ?>
                        <div id="Img_edit_home">
                        </div>
                    </div>
                    
                                        <div class="row" style="margin-top:10px;">

                                                <input type="button" value="Tìm ảnh" onclick="BrowseServer();"/> </div>
                </div>
            </div> -->
            {!! Form::open(array('action' => 'Admin\HomeController@store')) !!}
            <div class="row add-user">
                <div class="col-md-1">
                    Tên định dạng 
                </div>
                <div class="col-md-11">
                   <select name="ten_dinh_dang" id="" class="form-control" required="">
                       <option value=""> Chọn định dạng </option>
                    @foreach($ten_dinh_dang as $dd)
                       <option value="<?=$dd->id;?>"><?php echo $dd->ten_dinh_dang;?></option>
                    @endforeach   
                   </select>
                </div>
            </div>
             <div class="row add-user">
                <div class="col-md-1">
                    Vị trí
                </div>
                <div class="col-md-11">
				<?php 
				$mang_vi_tri = [];
				$dem=0;
				?>
				    @foreach($vi_tri_field as $dd)
						   <?php
						   $mang_vi_tri[$dem]=$dd->id_vitri;
						   $dem++;
						   ?>
                        @endforeach   
						
						<?php
						//var_dump($mang_vi_tri);
						//exit();
						?>
                    <select name="ten_vi_tri" id="" class="form-control" required="">
						<?php
						if(count($mang_vi_tri) > 0) {
							
						
						?>
						 <option value="<?=max($mang_vi_tri)+1;?>"><?php echo max($mang_vi_tri)+1;?></option>
						<?php
						}else {
							?>
							 <option value="1">1</option>
							<?php
							
						}
						?>
                          
						   

                    </select>
                </div>
            </div>
				<div class="row add-user">
					<div class="col-md-1">
						Mô tả
					</div>
					<div class="col-md-11">
						{!! Form::text('mo_ta','',array('class' => 'form-control')) !!}
					</div> 
				</div>
            <div class="row add-user">
                    <div class="col-md-1">
                    Nội dung trường 
                    </div>
                    <div class="col-md-11">
                            <textarea id="content" name="content"> </textarea>
                        <script>CKEDITOR.replace('content');</script>
                    </div>
                </div>  
                <script type="text/javascript">
$(function() {
    $('#content').ckeditor({
        toolbar: 'Full',
        enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P
    });
});
</script>


            <div class="row add-user">
                <div class="col-md-1">

                </div>
                <div class="col-md-10">
                    {!! Form::submit('Create',array('class' => 'btn btn-default')) !!}
                </div>
            </div>

            {!! Form::close() !!}



        </div>

    </div>

</div>
@include('admin.footer')