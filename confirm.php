<?php
  header("Content-Type:text/html;charset=utf-8");      //设置头部信息
session_start();
if(isset($_REQUEST['authcode'])){
      if(!empty($_POST['username'])){
          $username =  $_POST['username'];
          $password = $_POST['password'];
          $link = mysqli_connect('localhost','root','123456','mybook');
          mysqli_set_charset($link,'utf8');
          $sql = "select * from user where username ='$username' limit 1";
          $res = mysqli_query($link,$sql);
          $r = mysqli_fetch_assoc($res);
          if($r && $r['password']==$password &&strtolower($_REQUEST['authcode'])== $_SESSION['authcode']){
              $_SESSION['username']=$r['username'];
              $_SESSION['realname']=$r['username'];
             echo "<script language=\"javascript\">";
            echo "alert('登录成功!');";
            echo "document.location=\"./main.php\"";
            echo "</script>";
          }else if($r['password']!=$password){
            echo "<script language=\"javascript\">";
            echo "alert('用户名或密码错误！');";
            echo "document.location=\"./index.html\"";
            echo "</script>";
            die;
          }else{
             echo "<script language=\"javascript\">";
            echo "alert('验证码输入错误!');";
            echo "document.location=\"./index.html\"";
            echo "</script>";
            die;
          }
      }else if(!empty( $_SESSION['username'])){
         echo "<script language=\"javascript\">";
            echo "alert('请勿重复登录!');";
            echo "document.location=\"./index.html\"";
            echo "</script>";
      }else{
         echo "<script language=\"javascript\">";
            echo "alert('请输入用户名!');";
            echo "document.location=\"./index.html\"";
            echo "</script>";
      }
  }
if(!empty($_POST['name'])&&!empty($_POST['pwd'])){
    $name = $_POST['name'];
    $pwd = $_POST['pwd'];
    if(!empty($_POST['email'])) {
        $email = $_POST['email'];
        $pattern1 = '/^(\w{1,25})@(\w{1,16})(\.(\w{1,4})){1,3}$/';
        if (!preg_match($pattern1,$email)){
            echo "<script language=\"javascript\">";
            echo "alert('邮箱格式不正确!');";
            echo "document.location=\"./index.html\"";
            echo "</script>";
        }
    }else{
        echo "<script language=\"javascript\">";
        echo "alert('请输入邮箱!');";
        echo "document.location=\"./index.html\"";
        echo "</script>";
    }
    if (!empty($_POST['phone'])) {
      $phone = $_POST['phone'];
      $pattern1 = "/^1[34578]\d{9}$/";
        if (!preg_match( $pattern1, $phone)){
            echo "<script language=\"javascript\">";
            echo "alert('手机格式不正确!');";
            echo "document.location=\"./index.html\"";
            echo "</script>";
      }
    }else{
        echo "<script language=\"javascript\">";
        echo "alert('请输入手机号!');";
        echo "document.location=\"./index.html\"";
        echo "</script>";
    }
    $connection = mysqli_connect('localhost','root','123456','mybook');
    mysqli_set_charset($connection,'utf8');
    $sql1= "INSERT INTO user(username,password) VALUE('$name', '$pwd')";  
    $result =mysqli_query($connection,$sql1);

      echo "<script language=\"javascript\">";
      echo "alert('注册成功请登录!');";
      echo "document.location=\"./index.html\"";
      echo "</script>";
}else{
    echo "<script language=\"javascript\">";
    echo "alert('请输入用户名和密码!');";
    echo "document.location=\"./index.html\"";
    echo "</script>";
}
  ?>