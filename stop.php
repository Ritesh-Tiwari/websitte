<?php
session_start();
include("connection.php");  
$id = (int)$_GET["id"];

// $appointment_id =(int) $_GET['appointment_id'];
$models->execute_kw($db, $uid, $password,'customer.details', 'action_stop',array(array($_SESSION['id'])));
header("Location: dashboard.php");
?>