<?php
session_start();
unset($_SESSION['phone']);
header('location:admin_login.php');
?>