<?php
include_once "../base.php";
$table=$_POST['table'];
$parent=$_POST['parent'];

//編輯
if (!empty($_POST['id'])) {
    
    foreach ($_POST['id'] as $key => $id) {
        if (!empty($_POST['del']) && in_array($id,$_POST['del'])) {
            del($table,$id);
        }else{
            $data=find($table,$id);
            $data['text']=$_POST['text'][$key];
            $data['href']=$_POST['href'][$key];
            save($table,$data);
        }
        
    }
}
if (!empty($_POST['text2'])) {
    foreach ($_POST['text2'] as $key => $text) {
        if ($text != '') {
            $data2['text']=$text;
            $data2['href']=$_POST['href2'][$key];
            $data2['parent']=$parent;
            save($table,$data2);
        }
    }
}
to("../admin.php?do=menu");

?>