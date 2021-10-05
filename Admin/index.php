<?php
session_start();
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
if(isset($_POST['login']))
{
	admin_login();	
}
?>
<div class="container">
	<div class="row">
    	<div class="col-md-10 col-md-offset-1">
        	<form method="post">
                        	<div class="form-group"><label> User Name </label>
                            <input type="text" name="adminname" class="form-horizontal" required>
                            </div>
                            <div class="form-group">
                            <label> Password </label>&nbsp;
                            <input type="password" name="password" class="form-horizontal" required>	
                            </div>
                            <button type="submit" name="login" class="btn btn-info">
                            	Login
                            </button>
                        </form>
        </div>    
    </div>
</div>
</body>
</html>