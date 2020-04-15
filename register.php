
<?php

$user_table = $bdd -> prepare ('SELECT * FROM user');
$user_table -> execute (array());


 ?>

<h3>Inscription</h3>
<form action = "index.php" method = "post">
  <input type ="text" placeholder="Nom d'utilisateur" name="username" required>
  <input type ="email" placeholder="Adresse mail" name="mail" required>
  <input type ="password" placeholder="Mot de passe" name="password" required>
  <input type ="password" placeholder="Confirmez le mot de passe" name="confirm_password" required>


  <button>Créer un compte utilisateur</button>
</form>

<?php
if (isset($_POST["username"]) && isset($_POST["mail"]) && isset($_POST["password"]) && isset($_POST["confirm_password"])){
  if (empty(trim($_POST["username"]))){
    echo "Veuillez rentrer un nom d'utilisateur";
  }
  else{
    if (check_if_exists($_POST["username"],'user_username', $user_table)){
      echo "Ce nom d'utilisateur est déjà utilisé par un compte existant, choisissez-en un autre";
    }
    else {
      if (strlen($_POST["password"])<8 || !preg_match('#[a-zA-Z0-9\#!^$()[\]{}?+*.]#', $_POST["password"])){
        echo "Votre mot de passe doit comporter au moins 8 caractères, dont une minuscule, une majuscule, un chiffre et un caractère spécial.";
      }
      else {
        if ($_POST["password"] != $_POST["confirm_password"]){
          echo "Erreur : le mot de passe confirmé n'est pas identique à celui choisi.";
        }
        else {
          $username = $_POST["username"];
          $mail = $_POST["mail"];
          $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
          $req = $bdd -> prepare ('INSERT INTO user (user_username, user_mail, user_password, user_is_validated) VALUES (:username, :mail, :password, :is_validated)');
          $req -> execute (array(
            'username' => $username,
            'mail' => $mail,
            'password' => $password,
            'is_validated' => 0
          ));

          echo "Compte créé avec succès ! Veuillez à présent vérifier votre boîte mail et valider votre compte."
        }
      }
    }
  }
}

 ?>
<br>
<h3>Connexion</h3>
<form action ="index.php" method = "post">
  <input type="text" placeholder="Nom d'utilisateur ou Adresse mail" name ="login" required>
  <input type="password" placeholder="Mot de passe" name="password" required>
  <button>Connexion</button>
</form>

<?php
if (isset($_POST["login"])){
  if (!check_if_exists($_POST["login"], 'user_username', $user_table) && !check_if_exists($_POST["login"], 'user_mail', $user_table)){
    echo "Aucun compte avec ce nom d'utilisateur ou cette adresse mail n'a été trouvé";
  }
  else {

  }
}

 ?>
