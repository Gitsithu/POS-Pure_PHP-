<?php
session_start();
include 'admin/connect.php';
include 'admin/function.php';
if(!empty($_SESSION['user'])){
	$user_name=$_SESSION['user'];
	$query="select * from user where user_name='$user_name'";
	$go_query=mysqli_query($connection,$query);
	while($out=mysqli_fetch_array($go_query)){
		$user_id=$out['user_id'];
		$user_name=$out['user_name'];
		$email=$out['email'];
		$phone=$out['phone'];
		$address=$out['address'];	
	}
}
//if($_SERVER['REQUEST_METHOD']=='POST'){

//}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
.CusTop
{
	margin-top:70px;
}
.showuser{
color:#0C3;
}
</style>
</head>
<link href="style/bootstrap.css" rel="stylesheet" />
<script src="style/jquery-1.10.2.js"></script>
<script src="style/bootstrap.js"></script>
<link href="style/style.css" rel="stylesheet">
<body>
<?php include 'header.php' ?>
<div class="container CusTop">
	<div class="row">
    <div class="well well-sm">
        	<h3>Welcome <span class="showuser"><?php echo $_SESSION['user'] ?></span></h3>
            
        </div>
    	<div class="col-sm-6 col-sm-offset-3">
        <div class="row">
        
      </div>
      <form method="post" action="submit.php">
        	<div class="form-group">
            	<label>UserName</label>
                <input type="text" name="username" value="<?php if(isset($user_name)){ echo $user_name; } ?>" class="form-control">
            </div>
            <div class="form-group">
            	<label>Email</label>
                <input type="text" name="email" value="<?php if(isset($email)){ echo $email; } ?>" class="form-control">
            </div>
            <div class="form-group">
            	<label>Phone</label>
                <input type="text" name="phone" value="<?php if(isset($phone)){ echo $phone; } ?>" class="form-control" />
            </div>
            <div class="form-group">
            	<label>Address</label>
                <textarea  name="address" class="form-control"><?php if(isset($address)) { echo $address; } ?></textarea>
            </div>
            <div class="form-group">
            	<label>Payment Type:</label>
                <select name="payment_type" class="form-control">
					<option value="Master Card">Master Card</option>
   				 	<option value="Visa Card">Visa Card</option>
   					<option value="Credit Card">Credit Card</option>
				</select>
            </div>
            <div class="form-group">
            	<label>CardNo:</label>
                <input type="text" name="cardno" value="" class="form-control">
            </div>
            <div class="form-group">
            <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
<input type="submit" name="submit" value="Submit" class="btn btn-primary">


</form>
            </div>
        </div>
    </div>

</body>
</html>