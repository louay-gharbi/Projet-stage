<?php
//import the connection file
require_once 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>S'inscrire</title>
 <!--css link-->
  <link rel="stylesheet" href="style.css">
  <!--font  awesome link-->
  
  <script src="https://kit.fontawesome.com/4be956aeba.js" crossorigin="anonymous"></script>
  
</head>
<body>
  <nav>
    <ul>
      <li><a href="index.php" class="logo">
      <img src="images/logo.png" alt="">
    <span class="nav-item">Intellect academy MT</span></a> 
  </li>
  <li><a href="home.php">
    <i class="fa-solid fa-house fa-2x"></i>
<span class="nav_item">Home</span></a>
</li>
  <li><a href="card.php">
    <i class="fa-sharp fa-solid fa-list fa-2x"></i>
<span class="nav_item">Nos formation</span></a>
</li>
<li><a href="map.php">
  <i class="fa-solid fa-map-location-dot fa-2x"></i>
<span class="nav_item">map</span></a>
</li>
<li><a href="contact.php">
  <i class="fa-solid fa-phone fa-2x"></i>
<span class="nav_item">contact</span></a>
</li>
<li><a href="galerie.php">
  <i class="fa-solid fa-circle-info fa-2x"></i>
<span class="nav_item">Galerie</span></a>
</li>
<li><a href="inscription.php" class="log">
  <i fas fa-home></i>
<span class="nav_item">S'inscrire</span></a>
</li>
    </ul>
  </nav>
 <form onsubmit="return validateForm()" action="inscrire.php" method="post" name="f" >
 <?php
 session_start();
  if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    if($_SESSION['M']==":)"){
      echo "<p style='color: green;'>".$message."</p>";}
      else{
        echo "<p style='color: red;'>".$message."</p>";
      }
  unset($_SESSION['message']);
}
?>
  <div class="form-group">
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" required>
  </div>
  
  <div class="form-group">
    <label for="prenom">Prénom:</label>
    <input type="text" id="prenom" name="prenom" required>
  </div>
  
  <div class="form-group">
    <label for="tel">Téléphone:</label>
    <input type="tel" id="tel" name="tel" required>
  </div>
  
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
  </div>

  <div class="form-group">
    <label for="formation">Formation:</label>
    <select id="formation" name="formations" required>
      <option value="default">selectinner une formation</option>
      <?php
  $query = $connection->prepare("SELECT * FROM formations");
  $query->execute();
  $formations = $query->fetchAll();
   
  foreach ($formations as $formation) {
    echo "<option value='".$formation['titre']."'>".$formation['titre']."</option>";
  }
     ?>
</select>
  </div>

  <input type="submit" class="btn" value="Envoyer">
  <input type="button" value="Admin" onclick="window.location.href='admin.php'">
</form>


 <style>
   form {
  width: 50%;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
}

label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}

input[type=text], input[type=tel], input[type=email], select {
  width: 100%;
  padding: 12px;
  margin-bottom: 20px;
  box-sizing: border-box;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
input[type=button] {
  background-color: #1DA1F2;
  color: white;
  padding: 12px 20px;
  border: none;
  cursor: pointer;
  margin-left :450px
}

 </style>
<script>
  function validateForm(){
  if(f.formations.selectedIndex==0){
    alert('choisir une formation !!');
    return false;
    
  }
  return true;}

 </script>
</body>
</html>