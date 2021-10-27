<?php
include("database.php");
$db=new query();
//$r=$_GET["type"];
//echo ($r);
if(isset($_GET["type"]) && ($_GET["type"]=="delete"))
{
  $id=$db->get_safe_str($_GET["delId"]);
  $condition=array("id"=>$id);
  $db->deleteData("tb",$condition);
  


}





$userData=$db->getData("tb");
//print_r ($userData);


?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>
 
    
    <a href="addUser.php">Add User</a>
    
    
    <!--show user data -->
    <table class="table table-striped table-bordered">
    <thead>
    <tr class="bg-primary text-white">
    <th>Sr#</th>
    <th>User Name</th>
    <th>User Email</th>
    <th>User Phone</th>
    <th class="text-center">Record Date</th>
    <th class="text-center">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php 
    if(isset($userData[0])){
    $s	=	'';
    foreach($userData as $val){
    $s++;
    ?>
    <tr>
    <td><?php echo $s;?></td>
        
    <td><?php echo $val['name'];?></td>
    <td><?php echo $val['email'];?></td>
    <td><?php echo $val['phone'];?></td>
    <td><?php echo $val['created_at'];?></td>
    <td align="center">
    <a href="addUser.php?id=<?php echo $val['id'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> | 
    <a href="?type=delete&delId=<?php echo $val['id'];?>" class="text-danger"><i class="fa fa-fw fa-trash"></i> Delete</a>
    </td>
    
    </tr>
    <?php 
    }
    }else{
    ?>
    <tr><td colspan="6" align="center">No Record(s) Found!</td></tr>
    <?php } ?>
    </tbody>
    
    <!-- end show uder data -->
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    
    
  </body>
</html>
<!--
//<td><?php echo $val['created_at'];?></td>
  //<td align="center"><?php echo date('Y-m-d',strtotime($val['dt']));?></td>
  <td align="center">
  
  
 onClick="return confirm('Are you sure to delete this user?');"> 
  
  
  -->