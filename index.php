<?php
require_once "config.php";


 ?>

 <!DOCTYPE html>
<html lang='fr'>
    <head>
        <meta charset='UTF-8' name ="AdamDupuis"/>
        <title>My Portfolio</title>
        <link rel='stylesheet' href='styles.css'/>
    </head>
    <body>
      <h3>Inscription</h3>
      <form action = "index.php" method = "post">
        <input type ="text" placeholder="Nom d'utilisateur" name="username" required>
        <input type ="email" placeholder="Adresse mail" name="mail" required>
        <input type ="password" placeholder="Mot de passe" name="password" required>

        <button>Créer un compte utilisateur</button>
      </form>
      <br>
      <h3>Connexion</h3>
      <form action ="index.php" method = "post">
        <input type="text" placeholder="Nom d'utilisateur ou Adresse mail" name ="login" required>
        <input type="password" placeholder="Mot de passe" name="password" required>
        <button>Connexion</button>
      </form>
    </body>
