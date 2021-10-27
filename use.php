<?php 
include("database.php");
$db=new query();
$condition=array("name"=>"sk sanaulla","email"=>"sanaulla@gmail.com","phone"=>99999);
$arr=$db->updateData("tb",$condition,"id",16);

if($arr){
echo "insert succesfully";
}else{

echo "not insert";
}



?>