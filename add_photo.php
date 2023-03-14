<?php
//import the connection file
require_once 'db_connect.php';
session_start();
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


  // Get the uploaded image file
  $image = $_FILES['image']['tmp_name'];

  // Check if the image file was uploaded successfully
  if (!empty($image)) {
    echo"<script>
    alert('empty image')</script>";
  }
    // Generate a unique filename to avoid overwriting existing files
   
    $filename = uniqid() . '_' . $_FILES['image']['name'];
    $filepath = 'images/galerie/' . $filename;
    
    // Move the image file to your desired upload directory
    move_uploaded_file($image, './images/galerie/' . $filename);
    $stmt = $connection->prepare("SELECT * FROM galerie");
    $stmt->execute();
    $rows = $stmt->fetchAll();
    $numRows = count($rows)+1;
    // Store the file path in your database using PDO
    $query = $connection->prepare('INSERT INTO galerie (id,name , link) VALUES (?,?, ?)');
    $query->bindParam(1, $numRows);
    $query->bindParam(2, $filename);
    $query->bindParam(3, $filepath);

    $result=$query->execute();
if($result){
    // Redirect to a success page
    header('Location: admin_Dashboard.php');
    $_SESSION['reload'] ="add_photo";
    $_SESSION['authenticated']=true;
    exit();
  } else {
    // Handle the error
    echo 'Error uploading image.';
  }
}
?>
