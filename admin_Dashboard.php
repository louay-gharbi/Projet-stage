<?php
//import the connection file
require_once 'db_connect.php';
session_start();
// Check if user is authenticated
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
  header('Location: admin.php');
  exit;
}
if (isset($_SESSION['reload'])) {
  echo"    <script src='jsfunctions.js'></script>";
  echo "<script>window.onload = function() {
    display_content('" . $_SESSION['reload'] . "');  };
  
</script>";
  
  unset($_SESSION['reload']);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" form="IE=edge">
    <meta name="viewport" form="width=device-width, initial-scale=1.0">
    <script src="jsfunctions.js"></script>
    <title>Admin_Dashboard</title>
    <link rel="stylesheet" href="style_dashboard.css">
    <script src="https://kit.fontawesome.com/4be956aeba.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="admin_Dashboard.php">Admin Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#" onclick="display_content('add_admin')">Ajout Admin <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#" onclick="display_content('add_formation')">Gestion formation</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#" onclick="display_content('add_photo')">Ajout photo</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#" onclick="display_content('liste_inscrit')">Gestion des inscriptions</a>
      </li>
      
    </ul>
  </div>
</nav>
<?php


  if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    if($_SESSION['M']==":)"){
      echo "<center><p style='color: green;'>".$message."</p></center>";}
      else{
        echo "<center><p style='color: red;size:50px'>".$message."</p></center>";
      }
}
unset($_SESSION['message']);


?>

<!-- different forms -->
<form class="form" id="add_formation"  style="display:none">
<h1>liste des formations</h1>
<input type="button" value="Nouvelle Formation" onclick="location.href='ajout_formation_form.html'">
<table>
    
        <tr>
            <th>Numero</th>
            <th>Titre</th>
            <th>Description</th>
            <th>prix</th>
            <th colspan="2">Action</th>

        </tr>
    
    <?php

    $query = $connection->prepare("SELECT * FROM formations");
    $query->execute();
    $formations = $query->fetchAll();
 
    foreach($formations as $formation) {
      echo "<tr>
        <td>".$formation['id']."</td>
        <td>".$formation['titre']."</td>
        <td>".$formation['description']."</td>
        <td>".$formation['prix']." DNT</td>
        <td><a href='update.php?id=".$formation['id']."'><i class='fa-solid fa-pen-to-square'></i></a></td>
        <td><a href='delete.php?id=".$formation['id']."'><i class='fas fa-trash'></i></a></td>
      </tr>";
    }
       
    ?>
</table>
</form>

<form class="form" id="add_admin" style="display:none" onsubmit="return validateAdmin()" action="add_admin.php" method="post">
<h1>ajouter un nouvel  administrateur</h1>
<label for="username">Username:</label>
  <input type="text" id="username" name="username"><br><br>

  <label for="password">Password:</label>
  <input type="password" id="password" name="password"><br><br>

  <label for="confirm_password">Confirm Password:</label>
  <input type="password" id="confirm_password" name="confirm_password"><br><br>

  <input type="submit" value="Submit">



</form>
<form action="add_photo.php" method="post" class="form" id="add_photo" style="display:none" enctype="multipart/form-data">
<h1>ajouter une photo</h1>
        <input type="file" name="image" class="form-input" required>
        <input type="submit" value="Upload photo" class="form-submit-button" name="submit">
</form>
<div class="form" id="liste_inscrit" style="display:none">
    <h2>liste des inscription</h2>
    <table>
  <tr>
    <th>numero</th>
    <th>nom et prenom</th>
    <th>email</th>
    <th>telephone</th>
    <th>type de formation</th>
    <th>Lu</th>
  </tr>
 
    <?php
    $query = $connection->prepare("SELECT * FROM inscription");
    $query->execute();
    $inscription = $query->fetchAll();
     
    foreach($inscription as $inscripteur) {
      echo "<tr>
      <td>".$inscripteur['id']."</td>
      <td>".$inscripteur['nom']."</td>
      <td>".$inscripteur['email']."</td>
      <td>".$inscripteur['tel']."</td>
      <td>".$inscripteur['formation']."</td>";
      if($inscripteur['lu']==0){
        echo "<td><input type='checkbox' onclick='location.href=\"update_checkbox.php?id=".$inscripteur['id']."&pos=0\"' ></td>";}
        else{
        echo "<td><input type='checkbox' onclick='location.href=\"update_checkbox.php?id=".$inscripteur['id']."&pos=1\"' checked></td>";
         } echo"</tr>";
}
    ?>
    </table>
</div>
<div class="form">
    <h1> Please choose the functionality you want or <a href="home.php"> Quit</a></h1>

</div>
<style>
input[type="button"]{
  background-color:#b9b9b9;
  color: black;
  font-weight: bold;
  margin-left:-650px;
  margin-top :50px;
  margin-bottom:10px;

}
a{
  text-decoration: none;
  color:black;
}

#add_admin {
    width: 50%;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid gray;
  }

  label {
    display: block;
    margin-bottom: 10px;
  }

  input[type="text"],
  input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid gray;
    border-radius: 5px;
  }

  input[type="submit"] {
    width: 100%;
    padding: 10px;
    border: none;
    background-color: lightgray;
    border-radius: 5px;
    cursor: pointer;
  }
  </style>
</body>

</html>
<?php
unset( $_SESSION['authenticated']);
?>