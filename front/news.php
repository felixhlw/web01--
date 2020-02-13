<div class="di"
  style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
  <?php include "marquee.php";?>
  <div style="height:32px; display:block;"></div>
  <!--正中央-->
<h3 class="cent">更多最新消息顯示區</h3>
<hr>
  
  <?php
          $useTable="news";
          // 先取得資料表中的總筆數(要注意是否有條件限制，比如顯示不顯示)
          $sum=nums($useTable);
          // 決定每個頁面的筆數
          $div=3;
          // 計算總頁數(無條件進位法)
          $pages=ceil($sum/$div);
          // 採用網址參數的方式來取得當前頁，預設為第一頁
          $p=(!empty($_GET['p']))?$_GET['p']:1;
          // 計算資料的開始筆數((當前頁-1)*每頁筆數)
          $start=($p-1)*$div;
          // 下SQL查詢語法(LIMIT start,amount) 及 取出分頁資料
          $rows=all($useTable,[]," LIMIT $start,$div");
?>
<ol start="<?=$start+1;?>">  
<?php
foreach ($rows as $r) {
  echo "<li class='sswww'>".mb_substr($r['text'],0,20,"utf8");
  echo "<span class='all' style='display:none'>". $r['text']."</span>";
  
  echo "...</li>";
}
?>
</ol>

<div class="cent">
    <?php
        if(($p-1)>0){
          echo "<a href='index.php?do=$useTable&p=".($p-1)."' style='text-decoration:none'> < </a>";
        }
        for($i=1;$i<=$pages;$i++){
          $fontSize=($i==$p)?"24px":"16px";
          echo "<a href='index.php?do=$useTable&p=$i' style='font-size:$fontSize;text-decoration:none'> ".$i." </a>";
        }
        if(($p+1)<=$pages){
          echo "<a href='index.php?do=$useTable&p=".($p+1)."' style='text-decoration:none'> > </a>";
        }
    ?>
    </div>
</div>
<div id="alt"
  style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
</div>
<script>
  $(".sswww").hover(
    function () {
      $("#alt").html("<pre>" + $(this).children(".all").html() + "</pre>").css({
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