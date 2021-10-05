<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/bootstrap.css">
<script type="text/javascript" src="../style/bootstrap.js"></script>
<script type="text/javascript" src="../style/jquery.js"></script>
</head>
<body> 
<?php
		session_start();
		include 'header.php';
		include 'function.php';
		include 'connect.php';
?>
<?php
	if(isset($_GET['action'])&&$_GET['action']=='delete')
	{
		del_user();	
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
                	
                    <div class="col-md-12">
                    	<table class="table table-striped">
                        	<tr> <td colspan="4" align="right"> <a href="user.php" class="btn btn-success"><span class="glyphicon glyphicon-plus"> </span>Add User </a></td></tr>
                            <tr> <th>User ID</th><th>User name</th><th>User Role</th><th>Action</th></tr>
                            <?php
                            $query="Select * from user order by user_id desc";
                            $go_query=mysqli_query($connection,$query);
							while ($row=mysqli_fetch_array($go_query)){
								$user_id=$row['user_id'];
								$user_name=$row['user_name'];
								$user_role=$row['role'];	
								echo"<tr>";
								echo"<td>{$user_id}</td>";
								echo"<td>{$user_name}</td>";
								echo"<td>{$user_role}</td>";
								echo"<td><a href='user_list.php?action=delete&id={$user_id}' class='glyphicon glyphicon-trash' onclick=\"return confirm('Are you sure?')\"></a></td>";
								echo"</tr>";
							}
							?>
                        </table>
                     </div>

                </div>
                
                </div>
                
                </div>
                
                </div>
                
</body>                
</html>