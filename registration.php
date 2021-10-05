<?php 
session_start();
		include 'Admin/connect.php';
		include 'functions.php'; 
	if(isset($_POST['register'])){
	$user_name=$_POST['username'];
	$password=$_POST['password'];
	$comfirm_password=$_POST['confirmpassword'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
		$errors=array(
		'username'=>'',
		'password'=>'',
		'comfirm_password'=>'',
		'match_password'=>'',
		'email'=>'',
		'phone'=>'',
		'address'=>''
	);
	
	if($user_name==''){
		$errors['username']='User Name must be enter';
			
	}else{
		if(strlen($user_name)<3){
		$errors['username']='Usre Name need to be longer';
	}
	}
	if($comfirm_password==''){
		$errors['comfirm_password']='This field could not be empty';
	}else{
		if($password!=$comfirm_password){
		$errors['match_password']='Passwords do not match';	
	}
	}
	
	if($password==''){
		$errors['password']='This field could not be empty';	
	}else{
	if(strlen($password)<3){
		$errors['password']='Password need to be longer';
	}
	}
	
	if($email==''){
		$errors['email']='This field could not be empty';	
	}
	if($phone==''){
		$errors['phone']='This field could not be empty phone';	
	}
	if($address==''){
		$errors['address']='This field could not be empty address';	
	}
	
	foreach($errors as $key=>$value){
		if(empty($value)){
			unset($errors[$key]);
		}
	}
	if(empty($errors)){
		//echo "<h3>Registration Success</h3>";
		create_accu();
	}
		
	
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style/bootstrap.css">
<script type="text/javascript" src="style/bootstrap.js"></script>
<script type="text/javascript" src="style/jquery.js"></script>
</head>
<body>
<?php include 'header.php' ?>
<div class="container CusTop">
	<div class="row">
    	 <div class="col-sm-12">
 			<div class="well well-sm">
        	<h3>Welcome
            <span class="showname">
			<?php if(!empty($_SESSION['user'])){
				echo $_SESSION['user'];
			}else{
				$_SESSION['user']='';	
			}?></span><?php //echo $num ?>
            </h3>
           </div><!---end well--->
          </div><!---end row---->   
       <div class="row"> 
       <div class="col-md-8 col-md-offset-2">
      <form method="post" action="registration.php" class="form-horizontal">
<div class="form-group">
  <label class="control-label col-sm-2" for="email">UserName:</label>
    <div class="col-sm-10">
      <input type="text" name="username" value="<?php if(isset($user_name)){ echo $user_name; } ?>" class="form-control" id="email" placeholder="Enter user name">
      <label class="text-danger"><?php echo isset($errors['username']) ? $errors['username']:'' ?></label>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Password:</label>
    <div class="col-sm-10">
      <input type="password" name="password"  value="<?php echo isset($password)? $password:'' ?>" class="form-control" id="email" placeholder="Enter user name">
      <label class="text-danger"><?php echo isset($errors['password']) ? $errors['password']:'' ?></label>
    </div>
  </div>
 <div class="form-group">
    <label class="control-label col-sm-2" for="email">Confirm Password:</label>
    <div class="col-sm-10">
      <input type="password" name="confirmpassword" value="<?php echo isset($comfirm_password)? $comfirm_password:'' ?>"  class="form-control" id="email" placeholder="Enter user name">
      <label class="text-danger"><?php echo isset($errors['comfirm_password']) ? $errors['comfirm_password']:'' ?></label>
<label class="text-danger"><?php echo isset($errors['match_password']) ? $errors['match_password']:'' ?></label>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" name="email" value="<?php echo isset($email)? $email:'' ?>"  class="form-control" id="email" placeholder="Enter user name">
      <label class="text-danger"><?php echo isset($errors['email']) ? $errors['email']:'' ?></label>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Phone:</label>
    <div class="col-sm-10">
      <input type="text" name="phone" value="<?php echo isset($phone)? $phone:'' ?>" class="form-control" id="email" placeholder="Enter user name">
       <label class="text-danger"><?php echo isset($errors['phone']) ? $errors['phone']:'' ?></label>
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Address:</label>
    <div class="col-sm-10">
      <textarea name="address" class="form-control" placeholder="Please enter your address"><?php echo isset($address)? $address:'' ?></textarea>
        <label class="text-danger"><?php echo isset($errors['address']) ? $errors['address']:'' ?></label>
    </div>
  </div>
  <label class="text-danger"></label>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary" name="register">Submit</button>
    </div>
  </div>


</form>
        </div>
       </div>
       <?php include 'footer.php' ?>
</body>
</html>		