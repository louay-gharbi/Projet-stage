<?php
session_start();
//import the connection file
require_once 'db_connect.php';


  
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $formation = $_POST['formations'];
    $full_name = $nom." ". $prenom;
    $stmt = $connection->prepare("SELECT * FROM inscription");
    $stmt->execute();
    $rows = $stmt->fetchAll();
    $numRows = count($rows)+1;
    // process the form data (e.g. insert into database, send email, etc.)
    $sql = "INSERT INTO `inscription` (id,nom, tel, email,formation) VALUES ('$numRows' , '$full_name','$tel', '$email', '$formation');";
    
    
    

    if ($connection->exec($sql)) {
      $_SESSION['message'] = "Inscription avec succès";
      $_SESSION['M'] = ":)";
      
    } 
    else {
      $_SESSION['message'] = "Error inserting row";
      $_SESSION['M'] = ":(";
    }
    header("Location: inscription.php");


  

?>