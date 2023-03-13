<?php
//import the connection file
require_once 'db_connect.php';

session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
$hashed_password =password_hash($password,PASSWORD_DEFAULT);
$sql = "INSERT INTO `adminlogin` (username,password ) VALUES ('$username','$hashed_password');";

if ($connection->exec($sql)) {
    $_SESSION['message'] = "Row inserted successfully";
    $_SESSION['M'] = ":)";
    
  } 
  else {
    $_SESSION['message'] = "Error inserting row";
    $_SESSION['M'] = ":(";
  }
  header("Location: admin_Dashboard.php");
}


?>