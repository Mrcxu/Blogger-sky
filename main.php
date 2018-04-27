<?php
      header("Content-type: text/html; charset=utf-8");
      session_start();
      $realname=$_SESSION['realname'];
      if(isset($_SESSION['src'])){
  $src = $_SESSION['src'];  
  }else{
    if (is_file('./upicon/'.iconv("UTF-8", "GBK", $realname).".jpg")) {
      $_SESSION['src']='./upicon/'.$realname.'.jpg';
    }
 
}
  ?>
<!DOCTYPE html>
<html>

<!-- Head -->
<head>
<meta name="description" content="description"/>
<meta name="keywords" content="keywords"/>
<meta name="author" content="author"/>
<link rel="stylesheet" type="text/css" href="css/default.css" media="screen"/>
<title><?php echo $realname?>的博客天空-博客主页</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script type="text/javascript">
 function uploadphoto(){
  document.getElementById("userphoto").src = "<?php echo $_SESSION['src'];?>"
 }
 window.onload = function(){
  uploadphoto(); 
 }
</script>
<body>
<div class="container">
  <div class="header">
    <div class="title">
       <img  id="userphoto" float="right"; src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1514673408006&di=e1762d66c395a78951b1d5a5f404bb01&imgtype=0&src=http%3A%2F%2Fmyeducs.cn%2Fuploadfile%2F200905%2F10%2F2A133241973.png" width="50px" height="50px">
      <h1 style="float: right;"><?php echo $realname?>'s 博客天空</h1>    
    </div>
  </div>
  <div class="navigation"> <a href="main.php">我的主页</a> <a href="myinfo.php">个人信息</a>
    <div class="clearer"><span></span></div>
  </div>
  <div class="main">
    <div class="content">
      <blockquote>
        <p style="font-weight: bold;">写作是作画谱曲。仰观宇宙之大，俯察品类之盛，游目骋怀后落于笔下，一片自然风景就是一个心灵境界.</p>
      </blockquote>
      <h1>文章列表</h1>
      <div class="descr"><?php echo date("l jS \of F Y");?></div>
      <ul>
      	<code>
        <?php
                  $link = mysqli_connect("localhost", "root", "123456", "mybook");
                  mysqli_set_charset($link,'utf8');
                  if (!$link) {
                      echo "Connect failed: ", mysqli_connect_error();
                      exit();
                  }
                  $result = mysqli_query($link, "SELECT * FROM message");
                  if($result) {
                      //var_dump($result);
                      while($row = mysqli_fetch_assoc($result)){
                          //var_dump($row);
                          echo  "<hr>";
                          $name = $row['MessageName'];
                          echo '<li>'.$row['MessageName'].'【'.$row['ReplyTime'].'】【<a href="msgCon.php?MessageName='.$name.'">查看详情</a>】</li>';
                      }
                      echo  "<hr>";
                      mysqli_free_result($result);
                  }
                  else{
                      echo mysqli_error($link);
                      die;
                  }
                  mysqli_close($link);
              ?>
              </code>
      </ul>
      <h1>发表文章</h1>
      <div class="descr"><?php echo date("l jS \of F Y");?></div>
      <form action="addmsg.php" method="post">
        标题：
        <input type="text" name="username"/>
        <br>
        内容：
        <textarea name="con" cols="50" rows="10"></textarea>
        <br />
        <span style="margin-left:400px;"><input type="submit" name="submit" style="text-align: center;width: 50px;height:30px;" value="发表" /></span>
      </form>
      <h1><b>Important!!</b></h1>
      <div class="descr"><?php echo date("l jS \of F Y");?></div>
      <ul>
        <li>This Website is used as a PHP job</li>
        <li>The CSS was downloaded from cssMoban.com</li>
      </ul>
      <b>designed by <i>Xu Yifan.</i></b>
      </p>
    </div>
    <div class="sidenav">
      <h1>文章</h1>
      <ul>
        <?php
                  $link = mysqli_connect("localhost", "root", "123456", "mybook");
                  mysqli_set_charset($link,'utf8');
                  if (!$link) {
                      echo "Connect failed: ", mysqli_connect_error();
                      exit();
                  }
                  $result = mysqli_query($link, "SELECT * FROM message");
                  if($result) {
                      //var_dump($result);
                      while($row = mysqli_fetch_assoc($result)){
                          //var_dump($row);
                          echo  "<hr>";
                          $n = $row['MessageName'];
                          echo '<li><a href="msgCon.php?MessageName='.$n.'">标题：'.$row['MessageName'].'<br>【'.$row['ReplyTime'].'】</a></li>';
                      }
                      echo  "<hr>";
                      mysqli_free_result($result);
                  }
                  else{
                      echo mysqli_error($link);
                      die;
                  }
                  mysqli_close($link);
              ?>
      </ul>
      <h1>用户操作</h1>
      <ul>
        <li><a href="myinfo.php">个人信息修改</a></li>
        <li><a href="exit.php">退出用户登录</a></li>
      </ul>
      <h1>天气查询</h1>
      <ul>
        <form action="weather.php" method="post" >
          <li> <span style="font-weight: border">城市：</span>
            <input type="text" name="city" value="温州" />
            <input type="submit" name="submit" value="查询" style="margin: right;" />
          </li>
        </form>
      </ul>
    </div>
  </div>
  <div class="clearer"><span></span></div>
  <div class="footer"> <span class="left">&copy; 2017 <a href="index.html">博客天空.com</a></span> <span class="right"><a href="http://www.cssmoban.com/">Website template</a> from <a href="http://cssmoban.com/">cssMoban.com</a></span>
    <div class="clearer"><span></span></div>
  </div>
</div>
<div><br>
  <br>
  <br>
  <br>
  <br>
  <br>
</div>
</body>
</html>
