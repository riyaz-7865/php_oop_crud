
<?php   

class database{
private $host;
private $dbusername;
private $dbpassword;
private $dbname;

protected function connect(){

$this->host='localhost';
$this->dbusername='root';
$this->dbpassword='';
$this->dbname='practice';

$con=new mysqli(
$this->host,
$this->dbusername,
$this->dbpassword,
$this->dbname);

return $con;

}

  public function get_safe_str($str){
     if($str != ''){
       return mysqli_real_escape_string($this->connect(),$str);
      }
  }

}


//start query class

class query extends database{
//for get data
public function getData($table,$field="*",$condition_arr='',$order_by_field='',$order_by_type='',$limit=''){

$sql="select $field from $table";

if($condition_arr !=''){
$sql.=' where ';
$c=count($condition_arr);
$i=1;
foreach($condition_arr as $key=>$val){
  if($i==$c){
  $sql.="$key ='$val' ";
  
  }else{
  $sql.="$key ='$val' and ";
  
  }
  $i++;

}



}

if($order_by_field !=''){

$sql.=" order by $order_by_field $order_by_type";
}

if($limit != ''){
$sql.=" limit $limit ";

}


$result=$this->connect()->query($sql);
if($result->num_rows>0){
     $arr=array();
     while($row=$result->fetch_assoc()){
     
     $arr[]=$row;
     }
   return $arr;


   }else{
   return 0;
   }

}

//end get data function

//start input data
public function insertData($table,$condition_arr){

  if($condition_arr !=''){
  foreach($condition_arr as $key=>$val){
  
  $fieldArr[]=$key;
  $valueArr[]=$val;
  
  }
  $field=implode(",",$fieldArr);
  $value=implode("','",$valueArr);
  $value="'".$value."'";
  $sql="insert into $table($field) values ($value)";
  
  $result =$this->connect()->query($sql);
  return $result;
  
  
  
  
  
  }





}



//end inpu data

//start delete data
  public function deleteData($table,$condition_arr){
  if($condition_arr!=''){
  $sql="delete from $table where ";
  $c=count($condition_arr);
  $i=1;
  foreach($condition_arr as $key=>$val){
    if($i=$c){
     $sql.=" $key = '$val' ";
    
    }else{
     
     $sql.=" $key = ' $val' and ";
    
    }
    $i++;
  
   }
   
   $result=$this->connect()->query($sql);
   /*
   if($result){
   
   echo "successfully deleted";
   }else{
   
   echo "not deleted";
   }
  */
  }




  }

//end delete data

//start update data

public function updateData($table,$condition_arr,$where_field,$where_value){

  if($condition_arr != ''){
  
  $sql="update $table set ";
  $c=count($condition_arr);
  $i=1;
    foreach($condition_arr as $key=>$val){
        if($i==$c){
        
        $sql.="$key = '$val' ";
        
        }else{
        
         $sql.="$key = '$val', ";
        }
  
       $i++;
  
    }
  
  $sql.=" where $where_field='$where_value' ";
  echo $sql;
  $result=$this->connect()->query($sql);
  return $result;
  }




}


//end update data

}



?>