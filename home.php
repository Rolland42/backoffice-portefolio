<?php
session_start();

if($_SESSION['username']){
echo $_SESSION['success'];
require_once('db-connect.php');
$sql= 'SELECT * FROM `projects`';
$query= $db->prepare($sql);
$query->execute();
$result= $query->fetchAll(PDO::FETCH_ASSOC);
//var_dump($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
   <a href="add-form.php"><button>ajoutez un projet</button></a> 
   <?php
    foreach ($result as $project) {
        echo '<div class="color">' . $project['project_title'] . ' | ' . $project['project_context'] . '</div>';
    }
   ?>
</body>
</html>
