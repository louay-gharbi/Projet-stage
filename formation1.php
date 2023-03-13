
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
</head>
<body>
<div class="card-container">
    <?php
        
        
        
     $query = $connection->prepare("SELECT * FROM formation");
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
            echo '<button class="card-btn">inscrire</button>';
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
<style>.card-container {
    display: flex;
    flex-wrap: wrap; /*wrap the cards when they reach the end of the row*/
}

.card-row {
    display: flex;
    width: 80%;
}

.card {
    width: calc(100%/3); /*set card width to 1/3 of the container width*/
    margin: 10px;
    background-color: #fff;
    box-shadow: 0px 0px 10px #ccc;
    border-radius: 10px;
    overflow: hidden;
    transition: all 0.2s ease-in-out;
}
img{
    width: 300px;
    height:200px;
}
</style>
</html>