<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title> ಶ್ರೀಮದ್ವಾಲ್ಮೀಕಿರಾಮಾಯಣಮ್</title>
	<link rel="stylesheet" href="assets/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" href="assets/tem_style.css">
	<script type="text/javascript" src="js/kannada_kbd.js" charset="UTF-8"></script>    
</head>

<body>

	<!--Header --->
	<div class="header_top">  
		<div class="col-xs-12">
			<p style="font-size:30px; text-shadow:inherit;">ಶ್ರೀಮದ್ವಾಲ್ಮೀಕಿರಾಮಾಯಣಮ್</p>
			<p style="font-size:17px; padding-top:10px;"><a href="../index.html"><span class="glyphicon glyphicon-home" title="Home"></span></a>&emsp;&emsp;&emsp;&emsp;&emsp;
				<a href="bala_kanda.html">ಬಾಲಕಾಂಡ</a>&emsp;&emsp;&emsp;&emsp;&emsp;
				<a href="ayodhya_kanda.html">ಅಯೋಧ್ಯಾಕಾಂಡ</a> &emsp;&emsp;&emsp;&emsp;&emsp;
				<a href="aranya_kanda.html">ಅರಣ್ಯಕಾಂಡ</a> &emsp;&emsp;&emsp;&emsp;&emsp;
				<a href="kishkindha_kanda.html">ಕಿಷ್ಕಿಂಧಾಕಾಂಡ</a> &emsp;&emsp;&emsp;&emsp;&emsp;
				<a href="sundara_kanda.html">ಸುಂದರಕಾಂಡ</a> &emsp;&emsp;&emsp;&emsp;&emsp;
				<a href="yuddha_kanda.html">ಯುದ್ಧಕಾಂಡ</a> &emsp;&emsp;&emsp;&emsp;&emsp;
				<a href="search.php"><span class="glyphicon glyphicon-search" name="search"></span></a>
			</p>
		</div>
	</div>
	<!-- Header Close -->
	<?php
	require_once("common.php");
	include("connect.php");
	$check = '';
	if(isset($_POST['check']) && $_POST['check'] != '')
	{
		$check = $_POST['check'];
	}
	
	$text = $_POST['textfield'];
	
	
	$db = @new mysqli('localhost', "$user", "$password", "$database");
	mysqli_set_charset ( $db , "utf8" );	
	
	if($check == '')
	{
		$query = "select * from searchtable where text  like '%" . $text . "%'";
	}
	else
	{
		$sumne = '';
		foreach($check as $kandaFilter)
		{
			$sumne .= 'kanda = \'' . $kandaFilter . '\' OR ';
		}
		$kandaFilter = preg_replace('/ OR $/', '' , $sumne);
		$query = "select * from (
		select * from searchtable where " . $kandaFilter . ") as tb1 
		where text like '%$text%' order by kanda, sarga";
	}
	
	$result = $db->query($query);
	$num_rows = $result->num_rows;
	echo $query;
	?>
	<br>
	<div class="container">
		<div class="row" id="index">
			<div class="col-xs-12" align="center">
				<h3>ಹುಡುಕು</h3>
			</div>
			<?php
			$kandaArray = array( 'aranya_kanda' => 'ಅರಣ್ಯಕಾಂಡ' , 'ayodhya_kanda' => 'ಅಯೋಧ್ಯಾಕಾಂಡ' , 'bala_kanda' => 'ಬಾಲಕಾಂಡ' , 'kishkindha_kanda' => 'ಕಿಷ್ಕಿಂಧಾಕಾಂಡ' , 'sundara_kanda' => 'ಸುಂದರಕಾಂಡ' , 'yuddha_kanda' => 'ಯುದ್ಧಕಾಂಡ', 'uttara_kanda' => 'ಉತ್ತರಕಾಂಡಃ');
			$kanda = '';
			$i = 0;
			if($num_rows > 0)
			{
				if($num_rows == 1)
				{
					echo "<span class=\"result\">  " . toKannada($num_rows) . " ಫಲಿತಾಂಶ ಸಿಕ್ಕಿದೆ </span><br/><br/><br/>";
				}
				else
				{
					echo "<span class=\"result\">  " . toKannada($num_rows) . " ಫಲಿತಾಂಶಗಳು ಸಿಕ್ಕಿವೆ </span><br/><br/><br/>";
				}

				while($row = $result->fetch_assoc())
				{
					if($kanda == '' || $kanda != $row['kanda'])
					{
						$kanda = $row['kanda'];
						if($i != 0)
						{
							echo '</div>';
						}

						echo '	<div class="kanda">
						<span class="kandaName">' . $kandaArray[$row['kanda']] . '<br/>
						&nbsp;<a href="' . $row['kanda'] . '/' .$row['sarga'] . '.html#' .$text. '">' . toKannada(str_pad(substr($row['sarga'], 5), 3 , "0" , STR_PAD_LEFT) )  . 'ನೇ ಸರ್ಗಃ</a> &nbsp;|
						</span>
						';
					}
					elseif($kanda == $row['kanda'])
					{
						echo '	<span class="kandaName">
						&nbsp;<a href="' . $row['kanda'] . '/' .$row['sarga'] . '.html#' .$text. '">' . toKannada(str_pad(substr($row['sarga'], 5), 3 , "0" , STR_PAD_LEFT) )  . 'ನೇ ಸರ್ಗಃ</a> &nbsp;| 
						</span>';
					}
					$i++;
				}
				echo '</div>';
			}
			else
			{
				echo "No results Found, Go back and search again\n";
				exit(0);
			}

			?>
		</body>
		</html>
