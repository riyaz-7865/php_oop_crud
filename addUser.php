<?php
include("database.php");
$db=new query();
$name='';
$email='';
$phone='';
$id='';
  if(isset($_GET["id"]) && $_GET["id"]!=''){
   $id=$_GET["id"];
   $result=$db->getData("tb","*",["id"=>$id]);
   $name=$result[0]['name'];
   $email=$result[0]['email'];
   $phone=$result[0]['phone'];
//   echo $name.'-'.$email.'-'.$phone;
   
   
   
   
   }



if(isset($_POST['submit'])){
$name=$db->get_safe_str($_POST['username']);
$email=$db->get_safe_str($_POST['useremail']);
$phone=$db->get_safe_str($_POST['userphone']);
$condition=array("name"=>$name,"email"=>$email,"phone"=>$phone);


  if($id==''){

     $arr=$db->insertData("tb",$condition);
   }else{
   
   $arr=$db->updateData("tb",$condition,"id",$id);
   
   }
?>
//header('location:user.php');
<script>
alert("user add succesfully");
window.location.href='user.php';

</script>

<?php 

}



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
    
    
    <div class="col-sm-6">
    <h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
    <form method="post">
    <div class="form-group">
    <label>User Name <span class="text-danger">*</span></label>
    <input type="text" name="username" id="username" class="form-control" value="<?php echo $name; ?>" placeholder="Enter user name" required>
    </div>
    <div class="form-group">
    <label>User Email <span class="text-danger">*</span></label>
    <input type="email" name="useremail" id="useremail" class="form-control" value="<?php echo $email ?>" placeholder="Enter user email" required>
    </div>
    <div class="form-group">
    <label>User Phone <span class="text-danger">*</span></label>
    <input type="tel" name="userphone" id="userphone" maxlength="12" class="form-control" value="<?php echo $phone; ?>" placeholder="Enter user phone" required>
    </div>
    <div class="form-group">
    <input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
    <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update User</button>
    </div>
    </form>

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