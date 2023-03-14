<?php
// Include the database connection file
require_once 'db_connect.php';
session_start();

// Check if the ID parameter is set
if(isset($_GET['id'])) {
  $id = $_GET['id'];
  
  // Prepare the SQL statement to fetch the record with the specified ID
  $stmt = $connection->prepare("SELECT * FROM formations WHERE id = ?");
  $stmt->execute([$id]);
  
  // Fetch the record as an associative array
  $formation = $stmt->fetch(PDO::FETCH_ASSOC);
  
  if($formation) {
    // Render the update form
    echo "<form action='update_process.php' method='post' >
    <h1>modifier une formation</h1>
    <div class='form-group'>
      <label for='title'>Titre:</label>
      <input type='hidden' name='id' value='".$formation['id']."'>
      <input type='text' id='title' name='titre' value=".$formation['titre']."required>
    </div>
  
    <div class='form-group'>
      <label for='description'>Description:</label>
      <textarea id='description' name='description' required> ".$formation['description']."</textarea>
    </div>
  
   
  
    <div class='form-group'>
      <label for='price'>Prix:</label>
      <input type='number' id='price' name='prix' value=".$formation['prix']." required>
    </div>
  
    <button type='submit'>modifier la Formation</button>
  </form>
 ";
 echo"<style> form {
    display: flex;
    flex-direction: column;
    align-items: center;
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  }
  
  .form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 20px;
  }
  
  label {
    font-size: 1.2rem;
    margin-bottom: 10px;
  }
  
  input, textarea {
    font-size: 1.2rem;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #f9f9f9;
    box-shadow: inset 0px 0px 5px rgba(0, 0, 0, 0.1);
  }
  
  textarea {
    height: 100px;
  }
  
  button {
    margin-top: 20px;
    font-size: 1.2rem;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  
  button:hover {
    background-color: #0056b3;
  }
  
  
</style> 
";
  } else {
    // If no record is found with the specified ID, redirect to the homepage
    header("Location: index.php");
    $_SESSION['reload'] ="add_formation";
    exit();
  }
}
?>
