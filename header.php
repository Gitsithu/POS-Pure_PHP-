<?php if(empty($_SESSION['user'])): ?>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header ">
      <a class="navbar-brand" href="#">Online Book sale </a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="login.php">Login</a></li>
      <li><a href="registration.php">Register</a></li>
    </ul>
  </div>
</nav>
<?php else: ?>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Online Book sale </a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
       <li><a href="cart.php">Cart</a></li>
      <li><a href="logout.php">Logout</a></li>
      
    </ul>
  </div>
</nav>
<?php endif; ?>