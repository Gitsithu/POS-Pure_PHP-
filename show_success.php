<?php 
	session_start();
	include 'admin/connect.php';
	include 'functions.php';
	$order_id=$_SESSION['oder_id'];
	//$_SESSION['oder_id']=$order_id;
	echo $order_id;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style/bootstrap.css" rel="stylesheet" />
<script src="style/jquery-1.10.2.js"></script>
<script src="style/bootstrap.js"></script>
<link href="style/style.css" rel="stylesheet">
<style>
.CusTop
{
	margin-top:70px;
}
.showname{
color:#0CF;	
}
</style>
</head>

<body>
<?php
 include 'header.php'
?>
  <div class="container CusTop">
     <div class="row">
       <div class="col-sm-12">
             <div class="well well-sm">
                <h3>Welcome
                 <span class="showname">
                     <?php 
					   if(!empty($_SESSION['user'])){
						    echo $_SESSION['user'];
							
					   }
					   else{
						   $_SESSION['user']='';
						   
					   }
					 ?>
                 </span>
                </h3>
                <p class="text-sucess lead">&nbsp;&nbsp;&nbsp; You successfully sumitted the following product.Thank for your shoppping here</p>
             </div>
             </div>
             
<div class="row">
<table>
  <tr>
    <td>&nbsp;
    <?php
		$query="select * from orders where order_id='$order_id'";
		$go_query=mysqli_query($connection,$query);
		while($out=mysqli_fetch_array($go_query))
		{
			$db_name=$out['delievery_name'];
			$db_phone=$out['delievery_phone'];
			$db_address=$out['delievery_address'];
		}
	
	?>
    <div class="panel panel-default">
    <div class="panel-heading">
    <h3><span class="glyphicon glyphicon-envelope"></span>Customer Information</h3>
    </div>
    <div class="panel-body pull-left">
    <p><span class="glyphicon glyphicon-user"></span>Customer Name=<?php echo $db_name; ?></p>
    <p><span class="glyphicon glyphicon-phone"></span>Customer Phone=<?php echo $db_phone; ?></p>
    <p><span class="glyphicon glyphicon-home"></span>Customer Address=<?php echo $db_address ;?></p>
    </div>
    </div></td>
    <td>&nbsp;
    <table class="table table-striped">
  <tr>
    <td colspan="4">&nbsp; Order_information</td>
    </tr>
  <tr>
    <td>Product Name</td>
    <td>Product Price</td>
    <td>Product Qty</td>
    <td>Unit Price</td>
  </tr>
  <?php $total=0;
 		$query="select order_detail.*,product.* from order_detail left join product on order_detail.product_id=product.product_id where order_detail.order_id='$order_id'";
		$go_query=mysqli_query($connection,$query);
		while($out=mysqli_fetch_array($go_query))
		{
			$product_name=$out['product_name'];
			$price=$out['price'];
			$qty=$out['product_qty'];
			$unit_price=$qty*$price;
			$total+=$unit_price;
			
			echo "<tr>
			<td>{$product_name}<br></td>
			<td>{$price}<br></td>
			<td>{$qty}<br></td>
			<td>{$unit_price}</td>
			</tr>";
		}
  
  
  ?>
  <tr>
  	<td colspan="3" align="right">Total Amount is </td>
    <td><?php echo $total; ?></td>
    </tr>
</table>

    </td>
  </tr>
</table>

</div>
</body>
</html>