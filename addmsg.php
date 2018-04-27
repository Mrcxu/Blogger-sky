<?php
	header("Content-type: text/html; charset=utf-8");
	$link = mysqli_connect("localhost", "root", "123456", "mybook");
	mysqli_set_charset($link,'utf8');     
	date_default_timezone_set(PRC);
	$date =date('Y-m-d H:i:s');
	if(isset($_POST['con'])&&isset($_POST['username']))
		{
			$con =$_POST['con'];  
			$username = $_POST['username'];    
			$sql = "insert into message values(null,'$con','$username','$date')";
			$r = mysqli_query($link,$sql);
			if($r){
				 echo "<script language=\"javascript\">";
	            echo "alert('留言成功!');";
	            echo "document.location=\"./main.php\"";
	            echo "</script>";
			}else{
				echo "shibai ";
			}
	}
	if(isset($_POST['txtcon'])){	   
		$na=$_GET['username'];
		$txtcon=$_POST['txtcon'];
		$txtcon = str_replace("\n","<br>",$txtcon);  
    	$sql1 =  "insert into text values(null,'$na','$txtcon','$date')";
		$r1 =mysqli_query($link,$sql1);
		if($r1){
		 echo "<script language=\"javascript\">";
            echo "alert('评论成功!');";
            echo "document.location=\"./msgCon.php?MessageName=".$na."\"";
            echo "</script>";
		}else{
		echo "shibai ";
		}
	}
	
?>