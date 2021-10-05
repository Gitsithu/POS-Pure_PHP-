<?php
session_start();
unset($_SESSION['cart'][$id]);
header("location:cart.php");
?>