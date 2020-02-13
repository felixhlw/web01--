<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">

<?php
$ad=all("ad",["sh"=>1]);
foreach ($ad as $a) {
  echo $a['text'] . "&emsp; / &emsp;" ;
}

?>

  </marquee>