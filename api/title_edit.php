<?php

include_once "../base.php";

foreach($_POST['id'] as $key => $id){
    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
        //刪除資料
        //delete from title where id='$id'
        del("title",$id);
    }else{
        //更新資料 注意 $key 跟 $id 的對應關係
        $data=find("title",$id); //抓出現有的
        $data['text']=$_POST['text'][$key]; //放進新的
        $data['sh']=($_POST['sh']==$id)?1:0;
        save("title",$data);
    }
}
to("../admin.php?do=title");  

?>
