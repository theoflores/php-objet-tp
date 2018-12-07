<?php
session_start(); //création de la session

$nom=$_POST['uname']; //Lien avec l'index html permettant de définir le nom de compte rentré à une variable
$mot_de_passe=$_POST['psw']; //Idem pour le MDP


setcookie('pseudo', $nom, time() + 365*24*3600); //Création du cookie retenant le nom de la personne


$database = mysqli_connect('localhost', 'root', '', 'user_book'); // Connexion à la base de donnée : "localhost" = adresse pour se co , "root" = nom d'utilisateur , " " = mot de passe (aucun) , "thisdb"=nom de la base de donnée

if (!$database) {
    die("Connection failed: " . mysqli_connect_error()); //Si la BDD n'arrive pas à se connecter, faire mourir la requête
} else {
    echo "Connected to database. <br>"; //Si on arrive à trouver une BDD se connecter.
}


$sql = "SELECT nom, mdp FROM utilisateur WHERE nom = '$nom' AND mdp = '$mot_de_passe'";  //Reqûete SQL dans la base de données pour trouver les identifiants correspondants.

$req = mysqli_query($database,$sql); //éxecute la requete sql dans la BDD


if ( mysqli_num_rows($req)==0) { //Si la requête trouve 0 lignes
    echo "Connexion impossible ,  Nom d'utilisateur et / ou mot de passe incorrect".'<br>'; //Alors connexion impossible
    echo '<a href="index.php" > Lien vers accueil </a>' ;
} else { //Sinon connexion possible avec les echos des cookies 
    header('location:indexconnect.php');
} 





session_destroy(); //Fin de la session


$database->close(); //fermeture de la BDD


?>