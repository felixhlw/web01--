<?php
include_once "base.php";
?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0068)?do=title -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <title>卓越科技大學校園資訊系統</title>
  <link href="./css/css.css" rel="stylesheet" type="text/css">
  <script src="./js/jquery-1.9.1.min.js"></script>
  <script src="./js/js.js"></script>
</head>

<body>
  <div id="cover" style="display:none; ">
    <div id="coverr">
      <a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;"
        onclick="cl(&#39;#cover&#39;)">X</a>
      <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
    </div>
  </div>
  <div id="main">
    <?php include "header.php";?>
    <div id="ms">
      <div id="lf" style="float:left;">
        <div id="menuput" class="dbor">
          <!--主選單放此-->
          <span class="t botli">後台管理選單</span>
          <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=title">
            <div class="mainmu">
              網站標題管理 </div>
          </a>
          <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=ad">
            <div class="mainmu">
              動態文字廣告管理 </div>
          </a>
          <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=mvim">
            <div class="mainmu">
              動畫圖片管理 </div>
          </a>
          <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=image">
            <div class="mainmu">
              校園映象資料管理 </div>
          </a>
          <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=total">
            <div class="mainmu">
              進站總人數管理 </div>
          </a>
          <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=bottom">
            <div class="mainmu">
              頁尾版權資料管理 </div>
          </a>
          <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=news">
            <div class="mainmu">
              最新消息資料管理 </div>
          </a>
          <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin">
            <div class="mainmu">
              管理者帳號管理 </div>
          </a>
          <a style="color:#000; font-size:13px; text-decoration:none;" href="?do=menu">
            <div class="mainmu">
              選單管理 </div>
          </a>


        </div>
        <div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
          <span class="t">進站總人數 :<?=$_SESSION['total'];?></span>
        </div>
      </div>
      <div class="di"
        style="height:540px; border:#999 1px solid; width:76.5%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
        <!--正中央-->
        <table width="100%">
          <tbody>
            <tr>
              <td style="width:70%;font-weight:800; border:#333 1px solid; border-radius:3px;" class="cent"><a
                  href="?do=admin" style="color:#000; text-decoration:none;">後台管理區</a></td>
              <td><button onclick="location.replace('./api/logout.php')"
                  style="width:99%; margin-right:2px; height:50px;">管理登出</button></td>
            </tr>
          </tbody>
        </table>
        <?php

              //利用網址傳值的方式來取得$_GET['do']的值，這個值代表我們要include進來的檔案
              $do=(!empty($_GET['do']))?$_GET['do']:"title";

              //我們將所有要include進來的後台功能檔案都放在 ./admin 目錄下，因此根據GET的值來組合include檔的完整路徑
              $path="./admin/" . $do . ".php";

              //判斷檔案是否存在來決定是要匯入檔案還是預設匯入title.php
              if(file_exists($path)){
                include $path;
              }else{
                include "./admin/title.php";
              }
             
        ?>
      </div>
      <div id="alt"
        style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
      </div>
      <script>
        $(".sswww").hover(
          function () {
            $("#alt").html("" + $(this).children(".all").html() + "").css({
              "top": $(this).offset().top - 50
            })
            $("#alt").show()
          }
        )
        $(".sswww").mouseout(
          function () {
            $("#alt").hide()
          }
        )
      </script>
    </div>
    <div style="clear:both;"></div>
    <?php include "footer.php";?>
  </div>

</body>

</html>