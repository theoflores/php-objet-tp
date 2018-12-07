<html>
    <head>
    <link rel="stylesheet" href="../css/style2.css"> <!--Lien vers le document CSS-->
    <title>Inscription</title> <!--Titre du site dans l'onglet du navigateur-->
    <link rel="icon" href="../img/favicon.jpg"/> <!--Code pour mettre le Favicon du site-->
    </head>
<body background="../img/Fall-Nature-Background-Pictures.jpg" >
    <b>
    <!--Mettre un fond dans les inputs-->
<style>input:focus {
        background-color: rgb(240, 190, 157);
    }</style>

<img class="blink-image" src="../img/plandetravail1.png" height="300px" width="300px"/>
<form  name="mon-formulaire1" action="traitement.php" method="post">

<p>
<label style="color:rgb(255, 255, 255)" id="nom2" for="nom" >Nom de compte</label>
<input type="text" id="nom" name="nom"/>
</p>
<p style="color:rgb(255, 255, 255)">
      <!--Création du champ mot de passe-->
<label id="mdp" for="mdp">Mot de passe</label>
<input id="mdp2" type="password" id="password" name="mdpp">
</p>

<p>
<input type="submit" value="Valider" id="envoyer" name="validation"/> <!--Création d'un bouton pour valider et donc envoyer à la BDD-->
<button id="reset" type="reset">Reset</button> <!--Bouton non utilisable car ce n'est pas un input-->
</p>
</form>
</b>

</body>
</html>