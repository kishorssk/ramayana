<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title> ಶ್ರೀಮದ್ವಾಲ್ಮೀಕಿರಾಮಾಯಣಮ್</title>
	<link rel="stylesheet" href="assets/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" href="assets/tem_style.css">
	<script type="text/javascript" src="js/kannada_kbd.js" charset="UTF-8"></script>    
	<script type="text/javascript" src="js/jquery.min.js" charset="UTF-8"></script>  
	<script type="text/javascript">
        $(document).ready(function(){
			$("#toggleAll").click(function()
				{
					if($(".toggle input").prop("checked"))
					{
						$(".toggle input").prop("checked",false);
					}
					else
					{
						$(".toggle input").prop("checked",true);
					}
				});
        });
	</script>

</head>
<body>
<!--Header --->
<div class="header_top">  
	<div class="col-xs-12">
			<a href="search.php"><span class="glyphicon glyphicon-search  pull-right" name="search"></span></a>
		<p style="font-size:30px; text-shadow:inherit;">ಶ್ರೀಮದ್ವಾಲ್ಮೀಕಿರಾಮಾಯಣಮ್</p>
		<p style="font-size:17px; padding-top:10px;"><a href="../index.html"><span class="glyphicon glyphicon-home" title="Home"></span></a>&emsp;&emsp;&emsp;&emsp;&emsp;
		<a href="bala_kanda.html">ಬಾಲಕಾಂಡ</a>&emsp;&emsp;&emsp;&emsp;&emsp;
		<a href="ayodhya_kanda.html">ಅಯೋಧ್ಯಾಕಾಂಡ</a> &emsp;&emsp;&emsp;&emsp;&emsp;
		<a href="aranya_kanda.html">ಅರಣ್ಯಕಾಂಡ</a> &emsp;&emsp;&emsp;&emsp;&emsp;
		<a href="kishkindha_kanda.html">ಕಿಷ್ಕಿಂಧಾಕಾಂಡ</a> &emsp;&emsp;&emsp;&emsp;&emsp;
		<a href="sundara_kanda.html">ಸುಂದರಕಾಂಡ</a> &emsp;&emsp;&emsp;&emsp;&emsp;
		<a href="yuddha_kanda.html">ಯುದ್ಧಕಾಂಡ</a></p> &emsp;&emsp;&emsp;&emsp;&emsp;
	
		</p>
	</div>
</div>
<!-- Header Close -->
<br>
<div class="container">
<div class="row" id="index">
<div class="col-xs-12" align="center">
	<br/>
	<br/>
<h3>ಹುಡುಕು</h3>
<hr>
<br/>
</div>
<form method="POST" action="search-result.php">
<div class="col-xs-6">
		
	<div class="form-group">
      <input type="text" class="form-control" name="textfield"  id="textfield" onfocus="SetId('textfield')" />
    </div><br>
	<div class="row">
		<div class="col-xs-6">
			<label class="toggle"><input type="checkbox" value="bala_kanda" name="check[]">&nbsp;ಬಾಲಕಾಂಡ</label><br />
			<label class="toggle"><input type="checkbox" value="ayodhya_kanda" name="check[]">&nbsp;ಅಯೋಧ್ಯಾಕಾಂಡ </label><br />
			<label class="toggle"><input type="checkbox" value="aranya_kanda" name="check[]">&nbsp;ಅರಣ್ಯಕಾಂಡ </label><br />
			<label class="toggle"><input type="checkbox" value="kishkindha_kanda" name="check[]">&nbsp;ಕಿಷ್ಕಿಂಧಾಕಾಂಡ </label><br />
			<label class="toggle"><input type="checkbox" value="sundara_kanda" name="check[]">&nbsp;ಸುಂದರಕಾಂಡ </label><br />
			<label class="toggle"><input type="checkbox" value="yuddha_kanda" name="check[]">&nbsp;ಯುದ್ಧಕಾಂಡ</label><br />
			<label><input type="checkbox" value="ಎಲ್ಲಾ"  id="toggleAll" name="toggleAll">&nbsp;ಎಲ್ಲಾ</label>
		</div>
	</div>
	<input name="searchform" type="submit" class="btn btn-default pull-right" id="button_search" value="ಹುಡುಕು"/>
</div>
</form>
<div class="col-xs-6">
<?php include("kannadaKeybord.php"); ?>
</div>
</div>
</div>
</body>
</html>
