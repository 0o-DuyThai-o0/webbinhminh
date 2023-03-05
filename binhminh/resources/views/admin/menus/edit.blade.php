@include('admin.head')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
<link rel="stylesheet" href="http://congtyducduong.com/menu-test/css/bootstrap-iconpicker.min.css">
<script type="text/javascript" src="http://congtyducduong.com/menu-test/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="http://congtyducduong.com/menu-test/js/jquery-menu-editor.min.js"></script>
<script type="text/javascript" src="http://congtyducduong.com/menu-test/js/iconset/fontawesome5-3-1.min.js1"></script>
<script type="text/javascript" src="http://congtyducduong.com/menu-test/js/bootstrap-iconpicker.min.js"></script>
<script>
   jQuery(document).ready(function () {
       /* =============== DEMO =============== */
       // menu items
       var arrayjson = <?php echo $menu->content;?>;
   //
  // 	 var arrayjson = [];
   
   
       // icon picker options
       var iconPickerOptions = {searchText: "Buscar...", labelHeader: "{0}/{1}"};
       // sortable list options
       var sortableListOptions = {
           placeholderCss: {'background-color': "#cccccc"}
       };
   
       var editor = new MenuEditor('myEditor', {listOptions: sortableListOptions, iconPicker: iconPickerOptions});
   
       editor.setForm($('#frmEdit'));
	   
	   $('#myEditor').mouseleave(function(){ // di chuyển chuột ra là tự động update
		              var str = editor.getString();
           $("#out").text(str);
    //alert('Bạn vừa di chuyển chuột ra khỏi một thành phần');
		});
	   
	/*   
      $('#myEditor').keyup(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
           var str = editor.getString();
           $("#out").text(str);
 });
 */
       editor.setUpdateButton($('#btnUpdate'));
    editor.setData(arrayjson);
	
       $('#btnReload').on('click', function () {
           editor.setData(arrayjson);
       });
   //editor.setData(arrayjson);
   $("#out").text("không sao mà");
   
    var str = editor.getString();
           $("#out").text(str);
       $('#btnOutput').on('click', function () {
		   
           var str = editor.getString();
           $("#out").text(str);
		   
   
  // alert(str);
       });
   
       $("#btnUpdate").click(function(){
           editor.update();
		    var str = editor.getString();
           $("#out").text(str);
       });
   
       $('#btnAdd').click(function(){
		   
           editor.add(); 
		   var str = editor.getString();
           $("#out").text(str);
		   
       });
   
   //     $('[data-toggle="tooltip"]').tooltip();
   //    $.getJSON( "https://api.github.com/repos/davicotico/jQuery-Menu-Editor", function( data ) {
       //    $('#btnStars').html(data.stargazers_count);
       //    $('#btnForks').html(data.forks_count);
   //    });
   });
</script>
<div id="wrapper" class="container admin-admin">
   <div class="row">
      <div id="sidebar-wrapper" class="col-md-3">
         @include('admin.sitebar')
      </div>
      <div id="page-content-wrapper" class="col-md-9 admin-content">
         <div class="row">
            <h1>Chỉnh Sửa Menu  </h1>
            <div class="container menu_editor_1">
               <h2 class="h2_bai_viet h2_bai_viet_product">Tên Menu: <?php echo $menu->name ;?> </h2>
               <div class="row">
                  <div class="col-md-6">
                     <div class="noi_dung_1">
                        <div class="card border-primary mb-3">
                           <div class="card-body">
                              <form id="frmEdit" class="form-horizontal">
                                 <div class="form-group">
                                    <label for="text">Tên Menu item</label>
                                   
                                       <input type="text" class="form-control item-menu" name="text" id="text" placeholder="Nhập tên">
                                     
                                   
                                    <input type="hidden" name="icon" class="item-menu">
                                 </div>
                                 <div class="form-group">
                                    <label for="href">URL</label>
                                    <input type="text" class="form-control item-menu" id="href" name="href" placeholder="URL">
                                 </div>
                                 <div class="form-group">
                                    <label for="target">Target</label>
                                    <select name="target" id="target" class="form-control item-menu">
                                       <option value="_self">Self</option>
                                       <option value="_blank">Blank</option>
                                       <option value="_top">Top</option>
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control item-menu" id="title" placeholder="Nhập Title cho menu item">
                                 </div>
                              </form>
                           </div>
                           <div class="card-footer">
                              <button type="button" id="btnUpdate" class="btn btn-primary" disabled><i class="fas fa-sync-alt"></i> Update</button>
                              <button type="button" id="btnAdd" class="btn btn-success"><i class="fas fa-plus"></i> Add</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="noi_dung_1">
                        <div class="card mb-3">
                           <div class="card-header">
                              <h5 class="float-left">Menu</h5>
                              <div class="float-right">
                                 <button id="btnReload" type="button" class="btn btn-outline-secondary">
                                 <i class="fa fa-play"></i> Tải lại menu ban đầu</button>
                              </div>
                           </div>
                           <div class="card-body">
                              <ul id="myEditor" class="sortableLists list-group">
                              </ul>
                           </div>
                        </div>
                    
                        <div class="card">
						{!! Form::open(array('method' => 'PATCH','action' => array('Admin\MenusController@update',$menu->id ))) !!}
						
						<!--
							<input type="txt" name="name" value="<?php echo $menu->name ;?>">
							
							-->
                           <div class="card-header">
                           
                              <div class="float-right">
                                 <button id="btnOutput" type="submit" class="btn btn-success"><i class="fas fa-check-square"></i> Lưu lại</button>
                              </div>
                           </div>
                           <div class="card-body">
                              <div class="form-group"><textarea  style="display: none;" id="out" class="form-control" name="content" cols="50" rows="10"></textarea>
                              </div>
                           </div>
						   	{!! Form::close() !!}
						   
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@include('admin.footer')
<style>
   .menu_editor_1 {
   margin-top:20px;
   }
   .form-horizontal .form-group {
   margin-left:0 !important;
   margin-right:0 !important;
   }
   .menu_editor_1 .col-md-6 {  
   padding-left:10px; 
   padding-right:10px;
   }
   .noi_dung_1 {
   }
   .card {
   position: relative;
   display: -ms-flexbox;
   display: flex;
   -ms-flex-direction: column;
   flex-direction: column;
   min-width: 0;
   word-wrap: break-word;
   background-color: #fff;
   background-clip: border-box;
   border: 1px solid rgba(0,0,0,.125);
   border-radius: .25rem;
   padding:10px;
   }
</style>