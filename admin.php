<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style_admin.css">

</head>
<body>
  <div id="error" style="display:none">
    
  </div>  
  <form action="admin.php" method="post">
      
      
      <div class="container">
        
        <div class="brand-title">Admin</div>
        <div class="inputs">
          <label>Utilisateur</label>
          <input type="text" placeholder="Nom d'utilisateur" name="username" />
          <label>Mot de passe</label>
          <input type="password" placeholder="Min 6 characteres" name="password" />
          <button type="submit">Connexion</button>
        </div>
        
      </div>
      
  </form>
  <?php
//import the connection file
require_once 'db_connect.php';

//admin authentication
session_start();


  
function test_input($data) {
     
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
    $query = $connection->prepare("SELECT * FROM adminlogin");
    $query->execute();
    $users = $query->fetchAll();
     
    foreach($users as $user) {
         
        if(($user['username'] == $username) && password_verify($password, $user['password'])) {
                header("location: admin_Dashboard.php");
                $_SESSION['authenticated']=true;
        }
        else {
           
            
            echo '<script> alert("wrong information");</script>';

        }
    }
}



?>
</body>
</html>

