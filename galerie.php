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
  <title>Document</title>
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
  <div id="galerie">
  
  <?php
    $directory = "images/galerie/";
    $images = glob($directory . "*.{jpg,jpeg,png}", GLOB_BRACE);
    foreach($images as $image) {
      echo '<a href="' . $image . '"><img src="' . $image . '" alt=""></a>';
    }
  ?>
</div>


  <style>
    
    #galerie {
  display: flex;
  flex-wrap: wrap;
  margin-left:300px;
}

#galerie img {
  width: 300px;
  height: 200px;
  margin: 10px;
}

  </style>
</body>
</html>