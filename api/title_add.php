<?php

include_once "../base.php";
$data=[];
if (!empty($_FILES['file']['tmp_name'])) {
    $name=$_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'] , "../img/".$name);
    $data['file']=$name;
}
$data['text']=$_POST['text'];
save("title",$data);
to("../admin.php?do=title");

?>
