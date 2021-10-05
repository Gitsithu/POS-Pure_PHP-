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
	if(isset($_POST['add_product']))
	{
		add_product();	
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
                            <input type="text" name="product_name"  class="form-control" required>
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
								{
									echo"<option value={$cat_id}>{$cat_name}</option>";}
							}
							?>
                            </select>
                            
							
                            </div>
                            <div class="form-group"><label> Price </label>
                            <input type="text" name="price"  class="form-control"required>	
                            </div>
                            <div class="form-group"><label> Quality </label>
                           <input type="text" name="qty"  class="form-control"required>   
                            </div>
                            <div class="form-group"><label>File input</label>
                            <input type="file" name="photo"  required>
                            </div>
                            <button type="submit" name="add_product" class="btn btn-primary">
                            	Save
                            </button>
                        </form>
                    </div> 
                
                </div>
                
                </div>
                
                </div>
                
                </div>
                
                </body>
                
                </html>