<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=db05";
$pdo=new PDO($dsn,"root","");
session_start();

//select * from table where id=xxx  or aaa=xxxx && bbb=yyy

//查詢及取得特定條件的單筆資料
function find($table,...$arg){  //...$arg 指定可使用陣列形式的參數
    global $pdo;

    $sql="select * from $table where ";
    if(is_array($arg[0])){
        //["acc"=>"mack","pw"=>"1234"];
        foreach($arg[0] as $key => $value){
            $tmp[]=sprintf("`%s`='%s'",$key,$value);
        }
        //tmp=["`acc`='mack'","`pw`='1234']
        $sql=$sql . implode(" && ",$tmp);
    }else{
        //不是陣列的話預設是id
        $sql=$sql . " id='".$arg[0]."'";
    }
    echo $sql;

    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}
$a=find("admin",['pw'=>'1234']);
print_r($a);
echo "<br>";



function all($table,...$arg){
    global $pdo;

    $sql="select * from $table ";

    if(!empty($arg[0])){  //如果第一個參數有值的話
        foreach($arg[0] as $key => $value){
            $tmp[]=sprintf("`%s`='%s'",$key,$value); //sprintf 格式化字串的函式，  %s代表字串
        }

        $sql = $sql . " where " . implode(" && ",$tmp);

    }

    if(!empty($arg[1])){ //如果第二個參數有值的話
        $sql=$sql . $arg[1];
    }

    echo $sql . "<BR>";

   return $pdo->query($sql)->fetchAll();


}
echo "<br>";
$rows=all("admin"); //只指定資料表，不加其他參數
echo "<br>";
echo "<br>";
print_r($rows);
echo "<br>";
$limit=all("admin",[]," limit 2"); //指定資料表，第一參數無值，第二參數有值
echo "<br>";
print_r($limit);
echo "<br>";
echo "<br> 限制筆數<br>";

$pw=all("admin",['pw'=>'1234']); //指定資料表，第一參數有值，沒有第二參數
print_r($pw);
echo "<br>";
echo "<br> 條件<br>";

$pw2=all("admin",['pw'=>'1234']," limit 1"); //指定資料表，第一參數有值，第二參數有值
print_r($pw2);




function nums($table,...$arg){
    global $pdo;

    $sql="select count(*) from $table ";

    if(!empty($arg[0])){
        foreach($arg[0] as $key => $value){
            $tmp[]=sprintf("`%s`='%s'",$key,$value);
        }

        $sql = $sql . " where " . implode(" && ",$tmp);

    }

    if(!empty($arg[1])){
        $sql=$sql . $arg[1];
    }

    echo $sql . "<BR>";

   return $pdo->query($sql)->fetchColumn();

}
echo "<br>";
echo "<br>";
echo "資料表筆數<br>";
echo nums("admin",["pw"=>"1234"]);


function q($sql){
    global $pdo;
    return $pdo->query($sql)->fetchAll();
}
echo "<br>";
echo "<br>";
print_r(q("select acc from admin"));



echo "<br>";
echo "<br>";
//刪除特定id或符合條件的資料
function del($table,...$arg){
    global $pdo;
    $sql="delete from $table where ";
    if(is_array($arg[0])){
        //["acc"=>"mack","pw"=>"1234"];
        foreach($arg[0] as $key => $value){
            $tmp[]=sprintf("`%s`='%s'",$key,$value);
        }
        //tmp=["`acc`='mack'","`pw`='1234']
        $sql=$sql . implode(" && ",$tmp);
    }else{
        //不是陣列的話預設是id

        $sql=$sql . " id='".$arg[0]."'";
    }
    echo $sql;
    echo "<br>";
    return $pdo->exec($sql);
}
echo del("admin",["pw"=>"1234"]);
echo "<br>";
echo "<br>";



function to($path){
    header("location:".$path);

}

echo "<br>";
echo "<br>";


function save($table,$data){
    global $pdo;

    if(!empty($data['id'])){
        //update

        foreach($data as $key => $value){
            if($key!="id"){
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }
        }
        $sql="update $table set ".implode(",",$tmp)." where `id`='".$data['id']."'";
    }else{
        //insert
         $keys=array_keys($data);
         $keys_str="`" . implode("`,`",$keys) ."`"; //acc`,`pw
        $value_str="'" . implode("','",$data) . "'";
        //["acc"=>"mack","pw"=>"1234];
        //"insert into $table (`".implode("`,`",array_keys($data))."`) value('".implode("','",$data)."')";
        $sql="insert into $table ($keys_str) values($value_str)";
    }
    //echo $sql;

    return $pdo->exec($sql);
}

/* $new=["acc"=>"aken","pw"=>"1234"];

echo save("admin",$new); */


$user=find("admin",3);
echo "<br>";
print_r($user);
echo "<br>----修改後----<br>";
$user['pw']='2234';

print_r($user);
echo "<br>";
save("admin",$user);

?>