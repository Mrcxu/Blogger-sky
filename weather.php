<!DOCTYPE html>
<html>

<!-- Head -->
<head>

	<title>当前天气</title>

	<!-- Meta-Tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //Meta-Tags -->

	<!-- Style --> <link rel="stylesheet" href="css/style.css" type="text/css" media="all">



</head>
<!-- //Head -->

<!-- Body -->
<body>
	<?php
		header("Content-type: text/html; charset=utf-8");
		$cityname=$_POST['city'];
		$url='http://v.juhe.cn/weather/index?format=2&cityname='.$cityname.'&key=a21d6f375bb338adcdeabe28a7c919b2';
		$ch=curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_HEADER,0);
		$output=curl_exec($ch);
		curl_close($ch);
		$res=json_decode($output);
		echo '<center style="color:white;font-size:50;"><b><h1>&nbsp;'.$cityname."的天气:</h1>";
		echo '<table border="5" border-color="white "style="color:white;">';
		echo '<td><h2>'.'当前温度','</td>';
		echo '<td><h2>'.'当前风向','</td>';
		echo '<td><h2>'.'当前风力','</td>';
		echo '<td><h2>'.'当前湿度','</td>';
		echo '<td><h2>'.'更新时间','</td>';
		if($res){
		foreach($res->result as $r){
		    echo '<tr>';
		    echo '<td><h2>'.$r->temp,'℃</td>';
		    echo '<td><h2>'.$r->wind_direction,'</td>';
		    echo '<td><h2>'.$r->wind_strength,'</td>';
		    echo '<td><h2>'.$r->humidity,'</td>';
		    echo '<td><h2>'.$r->time,'</td>';
		    echo'</tr>';
		    echo '<a href="main.php" style="color: white;font-size: 40;">返回主页</a>';
		    die;
		};
	}else
	{
		echo "<script language=\"javascript\">";
        echo "alert('天气输入错误！');";
        echo "document.location=\"./main.php\"";
        echo "</script>";
	}
	
		echo '</table></b></center>';
		
?>

</body>
</html>


