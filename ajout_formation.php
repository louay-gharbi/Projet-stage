<?php
//import the connection file
require_once 'db_connect.php';
session_start();

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the form data
  $title = $_POST['title'];
  $description = $_POST['description'];
  $price = $_POST['price'];

  // Get the uploaded image file
  $image = $_FILES['image']['tmp_name'];

  // Check if the image file was uploaded successfully
  if (!empty($image)) {
    echo"<script>
    alert('empty image')</script>";
  }
    // Generate a unique filename to avoid overwriting existing files
   
    $filename = uniqid() . '_' . $_FILES['image']['name'];
    $filepath = 'images/formation/' . $filename;
    
    // Move the image file to your desired upload directory
    move_uploaded_file($image, './images/formation/' . $filename);
    $stmt = $connection->prepare("SELECT * FROM formations");
    $stmt->execute();
    $rows = $stmt->fetchAll();
    $numRows = count($rows)+1;
    // Store the file path in your database using PDO
    $query = $connection->prepare('INSERT INTO formations (id,titre, description, image, prix) VALUES (?,?, ?, ?, ?)');
    $query->bindParam(1, $numRows);
    $query->bindParam(2, $title);
    $query->bindParam(3, $description);
    $query->bindParam(4, $filepath);
    $query->bindParam(5, $price);
    $result=$query->execute();
if($result){
    // Redirect to a success page
    $_SESSION['authenticated']=true;
    header('Location: admin_Dashboard.php');
    $_SESSION['reload'] ="add_formation";

    
    exit();
  } else {
    // Handle the error
    echo 'Error uploading image.';
  }
}
?>
