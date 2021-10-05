<?php
	session_start();
	include 'admin/connect.php';
		$user_id=$_POST['user_id'];
		$user_name=$_POST['username'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$address=$_POST['address'];
		$payment=$_POST['payment_type'];
		$cardno=$_POST['cardno'];
		$query="insert into orders(order_date,customer_id,delievery_name,delievery_phone,delievery_address,status)";
		$query.="values(now(),'$user_id','$user_name','$phone','$address',0)";
		$go_query=mysqli_query($connection,$query);
		if(!$go_query){
			echo "Query Failed".mysqli_error($connection);	
		}
	$order_id=mysqli_insert_id($connection);
	foreach($_SESSION['cart'] as $id=>$qty)
	{
		$getprice=mysqli_query($connection,"select * from product where product_id='$id'");
		while($out=mysqli_fetch_array($getprice))
		{
			$db_price=$out['price'];
		}
			$amount=$db_price * $qty;
			$query="insert into order_detail(order_id,product_id,product_qty,amount)";
			$query.="values('$order_id','$id','$qty','$amount')";
			$go_query=mysqli_query($connection,$query);
			
	}
$_SESSION['oder_id']=$order_id;
unset($_SESSION['cart']);
header("location:show_success.php");
?>