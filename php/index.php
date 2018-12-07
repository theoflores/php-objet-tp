<?php session_start(); ?>
<html>
<head>

<meta charset="UTF-8"> <!-- Norme UTF-8 -->

<link rel="stylesheet" href="../css/style.css"> <!-- Liaison avec le fichier style.css -->

<title>Accueil</title>

<link rel="icon" href="../img/favicon.jpg" /> <!-- Favicon de la page-->
</head>

<body style="overflow-x: hidden">


       
<div class="header"> 
       <h2><img id="logo" src="../img/Logo_This_DOG.png" alt="Logo This DOG" /></h2>
       <p id=txt-logo>Bienvenue sur le meilleur site de canidés du monde !</p>
       <button id="Inscription1"> <a id="pp" href="formulaire.php" title="Inscription" style="text-decoration: none"> S'inscrire </a></button>
</div>
        


<div id="navbar">
       <a class="active" href="index.php" title="Accueil" > Accueil </a> 
       <a href="javascript:void(0)">Race</a>
       <a href="adoptenous.html" title="Adopte nous!" >Adopte nous !</a>
       <a href="javascript:void(0)">Support</a>
       <a onclick="document.getElementById('id01').style.display='block'" href="javascript:void(0)">Login</a>
</div>
            

            
<script>
        window.onscroll = function() {myFunction()};
            
       var navbar = document.getElementById("navbar");
       var sticky = navbar.offsetTop;
            
       function myFunction() {
              if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
              } else {
                navbar.classList.remove("sticky");
              }
       }
</script>






<!-- ENDROIT POUR CE LOGIN --> 
<div id="id01" class="modal">
  
       <form class="modal-content animate" action="connecte.php" method="post">
       <div class="imgcontainer">
           <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
           <img src="https://pbs.twimg.com/profile_images/1046968391389589507/_0r5bQLl_400x400.jpg" alt="Avatar" class="avatar">
       </div>
     
       <div class="container">
           <label for="uname"><b>Nom de compte</b></label>
           <input type="text" placeholder="Entrer nom" name="uname" required>
     
           <label for="psw"><b>Mot de passe</b></label>
           <input type="password" placeholder="Entrer mot de passe" name="psw" required>
             
           <button type="submit" name="validelogin">Se connecter</button>
           <label>
             <input type="checkbox" checked="checked" name="remember"><i>Se souvenir de moi </i>
           </label>
       </div>
     
       <div class="container" style="background-color:#f1f1f1">
           <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Annuler</button>
           <span class="psw"> / <a href="#">Mot de passe oublié ?</a></span>
       </div>
       </form>
</div>



<div class="fling-minislide">
              <img src="../img/akita1080.jpg" alt="Slide 3" />
              <img src="../img/lake_dog.jpg" alt="Slide 2" />
              <img src="../img/bergaus.jpg" alt="Slide 1" />

              <p id="descriptionslide"> Le Chien (Canis lupus familiaris) est la sous-espèce domestique de Canis lupus,<br>
                     un mammifère de la famille des Canidés (Canidae), laquelle comprend également <br>
                     le Loup gris et le dingo, chien domestique redevenu sauvage.Le Loup est la <br>
                     première espèce animale à avoir été domestiquée par l'Homme pour l'usage de <br>
                     la chasse dans une société humaine paléolithique qui ne maitrise alors ni <br>
                     l'agriculture ni l'élevage. La lignée du Chien s'est différenciée génétiquement <br>
                     de celle du Loup gris il y a environ 100 000 ans, et les plus anciens restes <br>
                     confirmés de canidé différencié de la lignée du Loup sont vieux, selon les sources,<br>
                     de 33 000 ans, ou de 12 000 ans, donc antérieurs de plusieurs dizaines de <br>
                     milliers d'années à ceux de toute autre espèce domestique connue .Depuis la Préhistoire,<br>
                     le Chien a accompagné l'être humain durant toute sa phase de sédentarisation,marquée par<br>
                     l'apparition des premières civilisations agricoles.C'est à ce moment qu'il a acquis la<br>
                     capacité de digérer l'amidon5, et que ses fonctions d'auxiliaire d'Homo sapiens se sont étendues.<br>
                     Ces nouvelles fonctions ont entrainé une différenciation accrue de la sous-espèce et l'apparition<br>
                     progressive de races canines identifiables.Le Chien est aujourd'hui utilisé à la fois comme animal de travail et comme animal de compagnie.Son instinct de meute, sa domestication précoce<br>
                     et 
                     les caractéristiques comportementales qui en découlent lui valent familièrement le surnom <br>
                     de « meilleur ami de l'Homme ».
              </p>
</div>


     
<script>
     // Get the modal
     var modal = document.getElementById('id01');
     
     // When the user clicks anywhere outside of the modal, close it
     window.onclick = function(event) {
         if (event.target == modal) {
             modal.style.display = "none";
         }
     }
</script>






<div class="footer">
       <p> <br> <br></p>
       <p><u>Mentions légales</u></p>
       <p><u>Contact</u></p>
</div>


</body>

</html>

<?php Session_destroy () ?>





