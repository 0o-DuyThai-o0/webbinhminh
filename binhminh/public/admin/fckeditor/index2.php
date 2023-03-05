 <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
    <title></title>
    <script src="ckfinder/ckfinder.js"></script>
	<script src="http://xuongkhop.net/public/js-s/jquery-1.11.3.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	
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
		document.getElementById('demo').innerHTML='<img src="'+fileUrl+'">';	
		// $( "#demo" ).append('<img src="'+fileUrl+'">');
		//$("<span>Hello World!</span>").appendTo("p");
        }
    </script>
</head>
<body>    
	<div id="demo">
	<p>dsgdfgdfgfdg </p>
	
	</div>
    <input type="text" name="Image" id="Image" />
    <input type="button" value="Duyệt ảnh" onclick="BrowseServer();"/>
</body>
</html>