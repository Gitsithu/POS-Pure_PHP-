<?php
  session_start();
  include 'admin/connect.php';
  include 'functions.php';
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <title>View Cart</title>
  <link href="style/bootstrap.css" rel="stylesheet" />
<script src="style/jquery-1.10.2.js"></script>
<script src="style/bootstrap.js"></script>
<link href="style/style.css" rel="stylesheet">
</head>
<style>
table th,td {text-align:center;}
.CusTop{
	margin-top:70px;}
	.showname{
		color:blue;		}

</style>
<body>
<?php include('header.php'); ?>
<div class="container CusTop">	
	<div class="row">
    	<div class="col-sm-12">
        <div class="row">
        <div class="well well-sm">
        	<h3>Welcome <span class="showname"><?php echo $_SESSION['user'] ?></span></h3>
            
        </div>
      </div>
      <div class="row">
        	<div class="panel panel-primary">
  <div class="panel-heading"><h2>Shopping Cart</h2></div>
  
 <?php if(!empty($_SESSION['cart'])): ?>
  <div class="panel-body">
  <table id="" class="table table-condensed">
      <tr>
      	<th>Photo</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Price</th>
        <th>Action</th>
 	 </tr>
     
      <?php
        $total = 0;
        foreach($_SESSION['cart'] as $id => $qty):
          $result = mysqli_query($connection,"SELECT * FROM product WHERE product_id=$id");
          $row = mysqli_fetch_assoc($result);
          $total += $row['price'] * $qty;
		
      ?>
     
      <tr>
      	<td><img src="images/<?php echo $row['photo'] ?>" width="100" height="100" class="img img-thumbnail" /></td>
        <td><?php echo $row['product_name'] ?></td>
        <td><?php echo $qty ?>
        <spam>
        	<a href="increase_qty.php?id=<?php echo $id ?>" class="glyphicon glyphicon-plus-sign"></a>
            <a href="decrease_qty.php?id=<?php echo $id ?>" class="glyphicon glyphicon-minus-sign"></a>
        </td>
        <td>$<?php echo $row['price'] ?></td>
        <td>$<?php echo $row['price'] * $qty ?></td>
        <td><span  style="margin:5px"></span>
        <a href="remove.php?id=<?php echo $id ?>" class="glyphicon glyphicon-remove"></a></td>
      </tr>
      <?php endforeach; ?>
      <tr>
        <td colspan="5" align="right"><b>Total:</b></td>
        <td>$<?php echo $total; ?></td>
      </tr>
    </table>
    </div>

<div class="panel-footer">
<a href="clear.php" class="btn btn-danger">Clear Cart</a>
<a href="index.php" class="btn btn-default">Back</a>
<a href="submit_order.php" class="btn btn-success">Submit Order!</a>
</div>

	</div>

<?php else: ?>
		<h3  class="text-danger lead text-center">You select no products now!</h3>
        <p class="text-center"><a href="index.php" class="btn btn-info">Shop Now</a></p>
<?php endif; ?>
      
</div>
</div>
</div>
</div>




</body>
</html>
