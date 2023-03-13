<?php

try {
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "intellect";
  
    $connection = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    
  
  } catch (PDOException $e) {
    die("Failed to connect to database: " . $e->getMessage());
  }

?>