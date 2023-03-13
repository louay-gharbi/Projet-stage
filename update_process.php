<?php
// Include the database connection file
require_once 'db_connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the form data
  $id = $_POST['id'];
  $titre = $_POST['titre'];
  $description = $_POST['description'];
  $prix = $_POST['prix'];


  // Prepare the SQL statement to update the record
  $stmt = $connection->prepare("UPDATE formations SET titre = ?, description = ?, prix = ? WHERE id = ?");
  $result = $stmt->execute([$titre, $description, $prix, $id]);
  
  if($result) {
    // If the update is successful, redirect to the homepage
    echo"updated succesfully";
  } else {
    // If the update fails, display an error message
    echo "Failed to update record.";
  }
} else {
  // If the form is not submitted via POST, redirect to the homepage
  header("Location: index.php");
  exit();
}
?>
