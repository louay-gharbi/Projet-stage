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
  <!--bootstrap link-->
<!--css link-->
  <link rel="stylesheet" href="style.css">
  <!--font  awesome link-->
  <script src="https://kit.fontawesome.com/4be956aeba.js" crossorigin="anonymous"></script>
</head>
<body>
  <nav onmouseover="submitWidth()">
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
  <div class="card-container">
  <h1 id="N">NOS FORMATIONS</h1>

    <?php
        
        
        
     $query = $connection->prepare("SELECT * FROM formations");
  $query->execute();
  $cards = $query->fetchAll();
        // Initialize counter
        $count = 0;
        
        // Loop through query results and create cards
        foreach ($cards as $card) {
            if ($count % 3 == 0) {
                echo '<div class="card-row">';
            }
            echo '<div class="card">';
            echo '<img src="'.$card['image'].'" alt="Card Image">';
            echo '<h2>'.$card['titre'].'</h2>';
            echo '<p>'.$card['description'].'</p>';
            echo '<p>'.$card['prix'].'DNT</p>';
            echo '<button class="button-40" role="button" onclick="location.href=\'inscription.php\'">inscrire</button>';
            echo '</div>';
            if ($count % 3 == 2) {
                echo '</div>';
            }
            $count++;
        }
    ?>
</div>


</div>

    
</body>
<style>
  #N{
    margin-left:500px;
    font-size:50px
  }
  h2{
    text-align:center;
  }
  button{
    background-color:blue;
    color: white;
    font-size:20px;
    margin-left:20px;
  }
.card-container {
    display: flex;
    flex-wrap: wrap; /*wrap the cards when they reach the end of the row*/
}

.card-row {
    display: flex;
    width: 100%;
    margin-left: 7%;
}

.card {
    width: calc(90%/3); /*set card width to 1/3 of the container width*/
    margin: 10px;
    background-color: #fff;
    box-shadow: 0px 0px 10px #ccc;
    border-radius: 10px;
    overflow: hidden;
    transition: all 0.2s ease-in-out;
}
img{
    width: 420px;
    height:200px;
}
p{
  text-align:center;
}
nav{
  position: fixed;
}

.button-40 {
  background-color: #111827;
  border: 1px solid transparent;
  border-radius: .75rem;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  flex: 0 0 auto;
  font-family: "Inter var",ui-sans-serif,system-ui,-apple-system,system-ui,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
  font-size: 1.125rem;
  font-weight: 600;
  line-height: 1.5rem;
  padding: .75rem 1.2rem;
  text-align: center;
  text-decoration: none #6B7280 solid;
  text-decoration-thickness: auto;
  transition-duration: .2s;
  transition-property: background-color,border-color,color,fill,stroke;
  transition-timing-function: cubic-bezier(.4, 0, 0.2, 1);
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  width: auto;
}

.button-40:hover {
  background-color: #374151;
}

.button-40:focus {
  box-shadow: none;
  outline: 2px solid transparent;
  outline-offset: 2px;
}

@media (min-width: 768px) {
  .button-40 {
    padding: .75rem 1.5rem;
  }
}
</style>

      
</body>
</html>