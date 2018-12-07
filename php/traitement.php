<?php
session_start();



$nom=$_POST["nom"];
$mot_de_passe=$_POST["mdpp"];


$database = mysqli_connect('localhost', 'root', '', 'user_book');

if (!$database) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected to database. <br>";
}


// Insertion des variables
$sql = "INSERT INTO utilisateur (nom,mdp) VALUES ('$nom','$mot_de_passe')";

if ($database->query($sql) === true) {
    //echo "Query executed without issue.";
    header('location:index.php');
} else {
    echo "Error: " . $sql . "<br>" . $database->error;
}

Session_destroy();

$database->close();

?>