<?php include_once "base.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>卓越科技大學校園資訊系統</title>
<link href="./css/css.css" rel="stylesheet" type="text/css">
<script src="./js/jquery-1.9.1.min.js"></script>
<script src="./js/js.js"></script>
</head>

<body>
<div id="cover" style="display:none; ">
	<div id="coverr">
    	<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl(&#39;#cover&#39;)">X</a>
        <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
    </div>
</div>
<iframe style="display:none;" name="back" id="back"></iframe>
	<div id="main">
  <?php include "header.php"; ?>
            <div id="ms">
             	<div id="lf" style="float:left;">
            		<div id="menuput" class="dbor">
                    <!--主選單放此-->
						<span class="t botli">主選單區</span>
<?php
						$main=all("menu",['parent'=>0,'sh'=>1]);
						foreach ($main as $k => $m) {

							echo "<div class='mainmu'><a href='".$m['href']."'>".$m['text']."</a>";
							$chksub=nums("menu",["parent"=>$m['id']]);
							if ($chksub>0) {
								echo "<div class='mw'>";
								$subs=all("menu",["parent"=>$m['id']]);
								foreach ($subs as $sk => $s) {
								echo "<div class='mainmu2'><a href='".$s['href']."'>".$s['text']."</a></div>";
								}
								
							}
							echo "</div>\n";
							echo "</div>";
						}

?>
					</div>
                    <div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
                    	<span class="t">進站總人數 :<?=$_SESSION['total'];?></span>
                    </div>
        		</div>
                <?php

                    //利用網址傳值的方式來取得$_GET['do']的值，這個值代表我們要include進來的檔案
                    $do=(!empty($_GET['do']))?$_GET['do']:"home";

                    //我們將所有要include進來的後台功能檔案都放在 ./admin 目錄下，因此根據GET的值來組合include檔的完整路徑
                    $path="./front/" . $do . ".php";

                    //判斷檔案是否存在來決定是要匯入檔案還是預設匯入title.php
                    if(file_exists($path)){
                      include $path;
                    }else{
                      include "./front/home.php";
                    }
                       
                ?>

                                 <div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
					<!--右邊-->
					<?php
					
					if (!empty($_SESSION['login'])) {
						
					?>
						<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo(&#39;admin.php&#39;)">返回管理</button>
						
  					<?php
					}else{
					?>
						

					<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo(&#39;?do=login&#39;)">管理登入</button>
					<?php
					}
					?>
					
                	<div style="width:89%; height:480px;" class="dbor" >
					<span class="t botli">校園映象區</span>
						<div style="display:flex;flex-direction:column; justify-content:center;align-items:center">
							<div class="cent" onclick="pp(1)"><img src="./icon/up.jpg" alt=""> </div>
							<?php
						
							$image=all("image",['sh'=>1]);
							foreach ($image as $key => $i) {
								echo "<div class='cent im' id='ssaa$key'>";
								echo "<img src='./img/".$i['file']."' style='width:150px;height:103px;border: solid 3px orange;margin:2px'>";
								echo "</div>";
							}
						
							?>

							<div class="cent" onclick="pp(2)"><img src="./icon/dn.jpg" alt=""> </div>
						</div>

						<script>
                        	var nowpage = 0, num=<?=nums("image",["sh"=>1]);?>;
							function pp(x)
							{
								var s,t;
								if(x==1&&nowpage-1>=0)
								{nowpage--;}
								if(x==2&& nowpage<(num-3))
								{nowpage++;}
								$(".im").hide()
								for(s=0;s<=2;s++)
								{
									t=s*1+nowpage*1;
									$("#ssaa"+t).show()
								}
							}
							pp(1)
                        </script>
                    </div>
                </div>
                            </div>
             	<div style="clear:both;"></div>
              <?php include "footer.php";?>
    </div>

</body></html>