<?php
header("Content-type: text/html; charset=utf-8");
    session_start();
    $realname=$_SESSION['realname'];
    session_destroy();
    $_SESSION = array();
    setcookie(session_name(),'',time()-100);

?>
<!DOCTYPE html>
<html>

<!-- Head -->
<head>

	<title>退出</title>

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
	<?php echo '<h1>用户：'.$realname?>,退出成功!</h1>
	<h1><a href="index.html" style="color: white;font-size: 40">返回登录</a></h1>
</body>
<!-- //Body -->

</html>
