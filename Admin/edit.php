<?php
		session_start();
		include 'header.php';
		include 'function.php';
		include 'connect.php';
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/bootstrap.css">
<script type="text/javascript" src="../style/bootstrap.js"></script>
<script type="text/javascript" src="../style/jquery.js"></script>
</head>
<body>
<?php
	if(isset($_GET['action'])&& $_GET['action']=='edit')
	{
		$p_id=$_GET['p_id'];
		$query="select * from product where product_id='$p_id'";
		$go_query=mysqli_query($connection,$query);
		while($row=mysqli_fetch_array($go_query))
		{
			$product_id=$row['product_id'];
			$product_name=$row['product_name'];
			$product_cat_id=$row['category_id'];
			$price=$row['price'];
			$qty=$row['qty'];
			$photo=$row['photo'];	
		}
	}
?>
<?php
	if(isset($_POST['update_product']))
	{
		update_product();	
	}
	
?>
	<div class="container top" >
    
    	<div class="row">
        
        	<div class="col-md-12">
            
            	<div class="row">
                
                	<div class="page-header">
                    
                    	<h2> Welcome admin,
                        
                        	<span class="text-danger">
                        		
								<?php
									if(isset($_SESSION['admin']))
									{
										echo $_SESSION['admin'];	
									}
									else{$_SESSION['admin']='';}
									?>	
                                			
                            </span> </h2>
                    </div>
                    
                </div>
                
                <div class="row"> 
                <div class="col-md-6 col-md-offset-3">
                    	<form method="post" enctype="multipart/form-data">
                        	<div class="form-group"><label>Product Name</label>
                            <input type="text" name="product_name"  class="form-control" value="<?php echo $product_name; ?>" required >
                            </div>
                            <div class="form-group">
                            <label> Category </label>
                            <select name="category_id" class="form-control">
                            <?php
							$query="select * from category";
							$go_query=mysqli_query($connection,$query);
							while($row=mysqli_fetch_array($go_query)){
								$cat_id=$row['cat_id'];
								$cat_name=$row['cat_name'];
								if($product_cat_id==$cat_id){
									echo"<option value={$cat_id} selected>($cat_name)</option>";
								}else{echo"<option value={$cat_id}>($cat_name)</option>";
									}
							}
							?>
                            </select>
                            
							
                            </div>
                            <div class="form-group"><label> Price </label>
                            <input type="text" name="price"  class="form-control" value="<?php echo $price; ?>" required>	
                            </div>
                            <div class="form-group"><label> Quality </label>
                           <input type="text" name="qty"  class="form-control" value="<?php echo $qty; ?>" required>   
                            </div>
                            <div class="form-group"><label>File input</label>
                            <input type="file" name="photo"><img src="../images/<?php echo $photo ?>" width="100" height="100">
                            </div>
                            <button type="submit" name="update_product" class="btn btn-primary">
                            	Update
                            </button>
                        </form>
                    </div> 
                
                </div>
                
                </div>
                
                </div>
                
                </div>
                
                </body>
                
                </html>