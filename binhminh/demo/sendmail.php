<?php
//goi thu vien
require('class.smtp.php');
require('class.phpmailer.php');
require('functions-mail.php');
$title = 'Thông tin khách hàng';
//$content = 'tôi đang có nhu cầu làm về thông tin khách hàng';
$nTo = 'MuaChung';
$mTo = 'nguyenngocthanglk@gmail.com';
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
    <meta charset="utf-8"/>
    <title>Demo Gửi mail</title>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
</head>
<body style="margin: 0;">
<div class="page" style="background: url('../public/images/background.webp');background-attachment: fixed;background-repeat: no-repeat">
    <div class="container">
        <h1 id="product-title"> Chúng tôi đã giúp hơn 17.000 gia đình! Hãy để chúng tôi giúp bạn! </h1>
        <div class="content_form">
            <form id="ducduong_guimai" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <p>Họ và tên khách hàng : </p>
                        <input type="text" id="name_s" class="name_s form-control" name="name_s" required />
                    </div>
                    <div class="col-md-6">
                        <p>Điện thoại </p>
                        <input type="text" id="tel_s" class="tel_s form-control" name="tel_s" required/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p>Email</p>
                        <input type="email" id="email_s" class="email_s form-control" name="email_s" aria-required="true" aria-invalid="false" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="" style="margin-top: 10px;"> Bạn muốn định cư nước nào </label> <br>
                        <input type="radio" name="nuoc" id="nuoc" value="Úc"> Úc <br>
                        <input type="radio" name="nuoc" id="nuoc" value="Mỹ"> Mỹ <br>
                        <input type="radio" name="nuoc" id="nuoc" value="canada"> Canada <br>
                        <input type="radio" name="nuoc" id="nuoc" value="hylap"> Hy lạp (Châu âu) <br>
                        <input type="radio" name="nuoc" id="nuoc" value="daosip"> Đảo Síp (Châu âu) <br>
                        <input type="radio" name="nuoc" id="nuoc" value="malta"> Malta (Châu âu) <br>
                        <input type="radio" name="nuoc" id="nuoc" value="nuockhac"> Nước khác (Châu âu) <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="" style="margin-top: 10px;"> Bạn dự kiến tham gia chương trình nào </label> <br>
                        <input type="radio" name="chuongtr" id="chuongtr" value="diện tay nghề cao"> Diện tay nghề cao <br>
                        <input type="radio" name="chuongtr" id="chuongtr" value="đầu tư và kinh doanh"> Đầu tư và kinh doanh <br>
                        <input type="radio" name="chuongtr" id="chuongtr" value="Đầu tư bất động sản "> Đầu tư bất động sản  <br>
                        <input type="radio" name="chuongtr" id="chuongtr" value="lao động phổ thông eb-3">Lao động phổ thông (EB-3) <br>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="" style="margin-top: 10px;">Bạn biết đến AIMS từ phương tiện nào?</label> <br>
                        <input type="radio" name="phuongtien" id="phuongtien" value="từ bạn bè"> Từ bạn bè <br>
                        <input type="radio" name="phuongtien" id="phuongtien" value="facebook"> Facebook <br>
                        <input type="radio" name="phuongtien" id="phuongtien" value="công cụ tìm kiếm google"> Công cụ tìm kiếm (Google)  <br>
                        <input type="radio" name="phuongtien" id="phuongtien" value="quảng cáo banner"> Quảng cáo Banner <br>
                        <input type="radio" name="phuongtien" id="phuongtien" value="vietnamworks"> Vietnamworks <br>
                        <input type="radio" name="phuongtien" id="phuongtien" value="vietnamairline"> Vietnamairlines <br>
                        <input type="radio" name="phuongtien" id="phuongtien" value="bsin"> bsin <br>
                        <input type="radio" name="phuongtien" id="phuongtien" value="wlin"> wlin <br>
                        <input type="radio" name="phuongtien" id="phuongtien" value="Nguồn khác"> Nguồn khác <br>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="" style="margin-top: 10px;"> Bạn ở thành phố nào? </label> <br>
                        <input type="radio" name="pho" id="pho" value="tphcm"> Tp.HCM <br>
                        <input type="radio" name="pho" id="pho" value="hà nội"> Hà Nội <br>
                        <input type="radio" name="pho" id="pho" value="thành phố tại miền bắc"> Thành phố khác tại miền Bắc <br>
                        <input type="radio" name="pho" id="pho" value="thành phố tại miền nam">Thành phố khác tại miền Nam <br>

                    </div>
                </div>
                <div>
                    <input id="add_s" type="submit" name="add" value="Gửi ngay" />
                </div>
            </form>

        </div>
    </div>

</div>
</body>
</html>
<style>
    .container {
        width:980px;
        margin:0 auto;
        border:1px solid #aaa;
        padding:10px;
        background: #ffffff73;
        opacity: 0.85;
    }
    input[type=checkbox], input[type=radio] {
        font-size: 20px;
        padding: 8px;
        margin: 15px;
    }

    .container .error {color:red;}
    #add_s {margin-top:10px;}
    .content_form {
        width: 600px;
        margin: auto;
    }

</style>
<?php

echo "Welcome to, ". $_POST['username'];
if($_POST['name_s']) {

    if($_POST['tel_s']) {
        if($_POST['email_s']) {
            if($_POST['nuoc']) {
                if($_POST['chuongtr']) {
                    if($_POST['phuongtien']) {
                        if($_POST['pho']) {
                            $content = "Họ tên: " . $_POST['name_s'] . "----Số ĐT: " . $_POST['tel_s'] . "---- Email: " . $_POST['email_s'] . "---- Nước bạn muốn đến: " . $_POST['nuoc']. "---- Chương trình: " . $_POST['chuongtr']. "---- Đến với Haohan từ : " . $_POST['phuongtien']. "---- Đến từ thành phố: " . $_POST['pho'];
                            $mail = sendMail($title, $content, $nTo, $mTo, $diachicc = '');
                            if ($mail == 1)
                                echo 'mail của bạn đã được gửi đi hãy kiếm tra hộp thư đến để xem kết quả. ';
                            else echo 'Co loi!';
                        }
                    }
                }
            }
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
                name_s: "required",
                tel_s: "required",

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