
<div class="row" style="">
	
</div>
</body>

</html>
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

	    <script type="text/javascript">
		
        function BrowseServer() {
            var finder = new CKFinder();
            //finder.basePath = '../';
            finder.selectActionFunction = SetFileField;
            finder.popup();
        }
        function SetFileField(fileUrl) {
            document.getElementById('Image').value = fileUrl;
		//	var demo = document.getElementById("demo");    
        //    demo.innerHtml='<h1>Hello member</h1>';	
		document.getElementById('img_edit').innerHTML='<img class="img_avatar" src='+fileUrl+'>';	
		// $( "#img_edit" ).append('<img class="img_avatar" src="'+fileUrl+'">');
		//$("<span>Hello World!</span>").appendTo("p");
        }


        function BrowseServer_cat() {
            var finder = new CKFinder();
            finder.selectActionFunction = SetFileField_cat;
            finder.popup();
        }
        function SetFileField_cat(fileUrl) {
            document.getElementById('Image_cat').value = fileUrl;
		    document.getElementById('img_edit_cat').innerHTML='<img class="img_avatar" src='+fileUrl+'>';
        } 
        
       function BrowseServer_create() {
            var finder = new CKFinder();
            finder.selectActionFunction = SetFileField_create;
            finder.popup();
        }
        function SetFileField_create(fileUrl) {
            document.getElementById('Image_create').value = fileUrl;
            document.getElementById('add_images_create_product').innerHTML='<img class="img_avatar" src='+fileUrl+'>';
        } 
       function BrowseServer_create_slider() {
            var finder = new CKFinder();
            finder.selectActionFunction = SetFileField_create_slider;
            finder.popup();
        }
        function SetFileField_create_slider(fileUrl) {
            document.getElementById('Image_create_slider').value = fileUrl;
            document.getElementById('add_images_create_product_slider').innerHTML='<img class="img_avatar" src='+fileUrl+'>';
        } 
        function BrowseServer_edit_product() {
            var finder = new CKFinder();
            finder.selectActionFunction = SetFileField_edit_product;
            finder.popup();
        }
        function SetFileField_edit_product(fileUrl) {
            document.getElementById('Image_edit_product').value = fileUrl;
            document.getElementById('img_edit_product').innerHTML='<img class="img_avatar" src='+fileUrl+'>';
        } 
        function BrowseServer_edit_product_slider() {
            var finder = new CKFinder();
            finder.selectActionFunction = SetFileField_edit_product_slider;
            finder.popup();
        }
        function SetFileField_edit_product_slider(fileUrl) {
            document.getElementById('Image_edit_product_slider').value = fileUrl;
            document.getElementById('img_edit_product_slider').innerHTML='<img class="img_avatar" src='+fileUrl+'>';
        } 
       function BrowseServer_create_cat() {
            var finder = new CKFinder();
            finder.selectActionFunction = SetFileField_cat_create;
            finder.popup();
        }
        function SetFileField_cat_create(fileUrl) {
            document.getElementById('Image_create_cat').value = fileUrl;
            document.getElementById('add_images_create_cat').innerHTML='<img class="img_avatar" src='+fileUrl+'>';
        } 
        function BrowseServer_create_cat_danh_muc() {
            var finder = new CKFinder();
            finder.selectActionFunction = SetFileField_cat_create_danh_muc;
            finder.popup();
        }
        function SetFileField_cat_create_danh_muc(fileUrl) {
            document.getElementById('Image_create_cat_danhmuc').value = fileUrl;
            document.getElementById('add_images_create_cat_danhmuc').innerHTML='<img class="img_avatar" src='+fileUrl+'>';
        } 

        function BrowseServer_edit_cat_avt() {
            var finder = new CKFinder();
            finder.selectActionFunction = SetFileField_cat_edit_avt;
            finder.popup();
        }
        function SetFileField_cat_edit_avt(fileUrl) {
            document.getElementById('Image_edit_cat').value = fileUrl;
            document.getElementById('img_edit_cat_avatar').innerHTML='<img class="img_avatar" src='+fileUrl+'>';
        } 

        function BrowseServer_edit_cat_bannner() {
            var finder = new CKFinder();
            finder.selectActionFunction = SetFileField_cat_edit_banner;
            finder.popup();
        }
        function SetFileField_cat_edit_banner(fileUrl) {
            document.getElementById('Image_edit_cat_banner').value = fileUrl;
            document.getElementById('img_edit_cat_banner').innerHTML='<img class="img_avatar" src='+fileUrl+'>';
        } 
        function BrowseServer_create_news() {
            var finder = new CKFinder();
            finder.selectActionFunction = SetFileField_news;
            finder.popup();
        }
        function SetFileField_news(fileUrl) {
            document.getElementById('Image_create_news').value = fileUrl;
            document.getElementById('add_images_create_news').innerHTML='<img class="img_avatar" src='+fileUrl+'>';
        } 
        function BrowseServer_edit_new_avt() {
            var finder = new CKFinder();
            finder.selectActionFunction = SetFileField_news_edit;
            finder.popup();
        }
        function SetFileField_news_edit(fileUrl) {
            document.getElementById('Image_edit_news').value = fileUrl;
            document.getElementById('img_edit_news_avatar').innerHTML='<img class="img_avatar" src='+fileUrl+'>';
        } 










        function BrowseServer_home() {
            var finder = new CKFinder();
            finder.selectActionFunction = SetFileField_home;
            finder.popup();
        }
        function SetFileField_home(fileUrl) {
            document.getElementById('Image_home').value = fileUrl;
            document.getElementById('Img_edit_home').innerHTML='<img class="img_avatar" src='+fileUrl+'>';
        }



        </script>
   <script>	
$(function() {
     var pgurl = window.location.href.substr(window.location.href
.lastIndexOf("/")+1);
     $("nav ul li a").each(function(){
          if($(this).attr("href") == pgurl || $(this).attr("href") == '' ){
          $(this).addClass("active");
	  
		  }
		// $(this).parent().first().css( "background-color", "red" ); 
     })
});
   </script>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
<script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
<script type="text/javascript">
    document.getElementById('b3').onclick = function(){
    swal("Good job!", "You clicked the button!", "success");
};
</script>
  <script>          
    $(document).ready(function(){
      $("#price_new").keyup(function(){
        var giatri = this.value;
        if(giatri>0){
            $('#price_moi').removeAttr("disabled");
        }else if(giatri == ""){
            $('#price_moi').attr( 'disabled', true );
        }
      });
    });
</script>


