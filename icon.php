<?php
header("Content-type: text/html; charset=utf-8");
session_start();
$realname=$_SESSION['realname'];
$filemimes = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
if(is_array($filemimes)){
    if(!in_array($_FILES['userfile']['type'],$filemimes)){
        echo "<script language=\"javascript\">";
        echo "alert('文件格式不符!');";
        echo "document.location=\"./myinfo.php\"";
        echo "</script>";
        exit;
    }
}
$file =$_FILES['userfile'];
if($file['error']==2){
    echo "<script language=\"javascript\">";
        echo "alert('文件过大!');";
        echo "document.location=\"./myinfo.php\"";
        echo "</script>";
    die;
}
if($_FILES["userfile"]["size"]>=6000000){
   echo "<script language=\"javascript\">";
    echo "alert('文件过大!');";
    echo "document.location=\"./myinfo.php\"";
    echo "</script>";
    die;
}

if($file['error']==0 && is_uploaded_file($file['tmp_name'])){
    $filename = $file['name'];
    $pos=strrpos($filename,'.',0);
    $t=substr($filename,$pos);
    $new_filename =  iconv("UTF-8", "GBK", $realname).$t;
    $to_file='./upicon/'.iconv("UTF-8", "GBK", $realname).$t;
    $src = './upicon/'.$realname.$t;
    $_SESSION['src']=$src;
    $r = move_uploaded_file($file['tmp_name'],$to_file);
    if($r){
        echo "<script language=\"javascript\">";
        echo "alert('上传成功！!');";
        echo "document.location=\"./myinfo.php\"";
        echo "</script>";
    }else{
        echo '上传失败！';
    }
}


