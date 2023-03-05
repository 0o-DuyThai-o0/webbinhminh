<?php
	//goi thu vien
	include('class.smtp.php');
	include "class.phpmailer.php"; 
	include "functions.php"; 
	$title = 'Thông tin khách hàng';
	//$content = 'tôi đang có nhu cầu làm về thông tin khách hàng';
	$nTo = 'MuaChung';
	$mTo = 'thienson.uit@gmail.com';
	$diachi = 'thienson.uit@gmail.com';
	
	//$diachicc="";

	//test gui mail
	
	
	/*
	$mail = sendMail($title, $content, $nTo, $mTo,$diachicc='');
	if($mail==1)
	echo 'mail của bạn đã được gửi đi hãy kiếm tra hộp thư đến để xem kết quả. ';
	else echo 'Co loi!';
	
	
	
	*/
	
?>

<html>
<head>
    <title>Demo Gửi mail</title>
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
</head>
<body>
<div class="container">
<h1 id="product-title"> Đồng Hồ Nữ cao cấp Franck Muller Long Island FM036P </h1>
    <form id="ducduong_guimai" method="post">

		<div>
		<p>Họ và tên khách hàng : </p>
			<input type="text" id="name_s" class="name_s" name="name_s" />
		</div>
		<div>
		<p>Số điện thoại liên hệ :</p> 
			<input type="tel" id="tel_s" class="tel_s" name="tel_s" aria-required="true" aria-invalid="false">
		</div>
		<div>
		<p>Địa chỉ giao hàng : </p>
			<input type="text" id="address_s" class="address_s" name="address_s"/>
		</div>
		<div>
		<p>Sản phẩm cần mua : </p>
			<input type="text" id="title_s" class="title_s" name="title_s" value=""/>
		</div>
		<div>
		<p>Yêu cầu hoặc ghi chú :</p>
			<input type="text" id="note_s" class="note_s" name="note_s">
		</div>
		<div>
			<input id="add_s" type="submit" name="add" value="Gửi đơn đặt hàng" />
		</div>
    </form>
</div>
</body>
</html>
<style>
.container {
	width:400px;margin:0 auto;
	border:1px solid #aaa;
	padding:10px;
}
.container input {
	width:100%;
	    display: block;
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.container .error {color:red;}
#add_s {margin-top:10px;}
</style>
<?php

    echo "Welcome to, ". $_POST['username'];
	if($_POST['name_s']) {
		
		if($_POST['tel_s']) {
				if($_POST['address_s']) {
						
						$content = "Họ tên: ".$_POST['name_s']."----Số ĐT: ".$_POST['tel_s']."----Địa chỉ: ".$_POST['address_s']."----Sản phẩm cần mua :".$_POST['title_s']."----Note :".$_POST['note_s'];
							$mail = sendMail($title, $content, $nTo, $mTo,$diachicc='');
							if($mail==1)
							echo 'mail của bạn đã được gửi đi hãy kiếm tra hộp thư đến để xem kết quả. ';
							else echo 'Co loi!';
				}
		}
	}
	
?>
<script>



  var x = document.getElementById("product-title").innerHTML;
 // document.getElementById("title_s").innerHTML = x;
  document.getElementById("title_s").value = x;
  
  $(document).ready(function() {

		//Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
		$("#ducduong_guimai").validate({
			rules: {
				ho_ten: {
      				required: true,
      				maxlength: 40,
      				minlength: 2
      			},
				
				tel_s: "required",
				address_s: {
					required: true,
					minlength: 2
				}
			},
			messages: {
				name_s: "Vui lòng nhập họ",
				tel_s: "Vui lòng nhập tên",
				address_s: {
					required: "Vui lòng nhập địa chỉ",
					minlength: "Địa chỉ ngắn vậy, chém gió ah?"
				}
			}
		});
	});
</script>