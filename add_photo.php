<?php
//import the connection file
require_once 'db_connect.php';
session_start();

if(isset($_FILES['photo'])){
  $errors= array();
  $file_name = $_FILES['photo']['name'];
  $file_size = $_FILES['photo']['size'];
  $file_tmp = $_FILES['photo']['tmp_name'];
  $file_type = $_FILES['photo']['type'];
  $file_ext = strtolower(end(explode('.', $file_name)));
  
  $extension= array("jpeg","jpg","png");
  
  if(in_array($file_ext,$extension) === false){
     $errors[]="extension not allowed, please choose a JPEG or PNG file.";
  }
  
  if($file_size > 2097152) {
     $errors[]='File size must be less than 2 MB';
  }
  
  if(empty($errors) == true) {
     $directory = 'images/galerie/';
     $filepath = $directory . $file_name;
     move_uploaded_file($file_tmp, $filepath);
     
     $query = $connection->prepare('INSERT INTO galerie (name, link) VALUES (?, ?)');
     $query->bindParam(1, $file_name);
     $query->bindParam(2, $filepath);
     $result = $query->execute();
     
     if($result) {
      $_SESSION['reload'] ="liste_inscrit";
      header("location: admin_Dashboard.php");
     }
     else{
      echo"erreur";
     }
  }
}
?>
