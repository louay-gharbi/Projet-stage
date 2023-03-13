<?php
// Include the database connection file
require_once 'db_connect.php';
session_start();

if($_GET['id']){
    $id=$_GET['id'];
    if($_GET['pos']==0){
        $Lu=1;
    }
    else{
        $Lu=0;
    }
    $query = $connection->prepare("UPDATE inscription SET lu = ? WHERE id = ?");
  $result = $query->execute([$Lu, $id]);
  if($result) {
    // If the update is successful, redirect to the homepage
    $_SESSION['reload'] ="liste_inscrit";
    header("location: admin_Dashboard.php");
  

  } else {
    // If the update fails, display an error message
    echo "Failed to update record.";
  }
}
else{
    echo"erreur sending request";
}
?>