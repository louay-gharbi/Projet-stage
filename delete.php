<?php
//import the connection file
require_once 'db_connect.php';

if (!isset($_GET['id'])) {
    
    header('Location: index.php');
    exit;
}

// get the id parameter from the query string and sanitize it
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


    
    // prepare and execute the SQL query to delete the record
    $query = $connection->prepare('DELETE FROM formations WHERE id = ?');
    $query->execute([$id]);

    // check if the record was deleted successfully
    if ($query->rowCount() > 0) {
        // if yes, redirect to the index page or show a success message
        header('Location: admin_Dashboard.php');
        exit;
    } else {
        // if not, redirect to the index page or show an error message
       echo '	<style>
       body {
           font-family: Arial, sans-serif;
           margin: 0;
           padding: 0;
           background-color: #f1f1f1;
       }
       .container {
           max-width: 800px;
           margin: 0 auto;
           padding: 20px;
           background-color: #fff;
           box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
       }
       h1 {
           font-size: 36px;
           margin: 0 0 20px;
           color: #333;
       }
       p {
           font-size: 18px;
           line-height: 1.5;
           color: #555;
       }
   </style>
</head>
<body>
   <div class="container">
       <h1>Error</h1>
       <p>An error occurred while processing your request.</p>
   </div>';
        exit;
    }







?>