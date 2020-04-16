<body>
  <h3>Inscription</h3>
  <form action = "index.php" method = "post">
    <input type ="text" placeholder="Nom d'utilisateur" name="username" required>
    <input type ="email" placeholder="Adresse mail" name="mail" required>
    <input type ="password" placeholder="Mot de passe" name="password" required>
    <input type ="password" placeholder="Confirmez le mot de passe" name="confirm_password" required>


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

<?php


$check = new Config;

if (isset($_POST["username"]) && isset($_POST["mail"]) && isset($_POST["password"]) && isset($_POST["confirm_password"])){
  $check_username = $check -> check_if_exists($_POST["username"],'user_username', 'user');
  if (empty(trim($_POST["username"]))){
    $error_message = "Veuillez rentrer un nom d'utilisateur";
  }
  else{
    if ($check_username){
      $error_message = "Ce nom d'utilisateur est déjà utilisé par un compte existant, choisissez-en un autre";
    }
    else {
      if (strlen($_POST["password"])<8 || !preg_match('#[a-zA-Z0-9\#!^$()[\]{}?+*.]#', $_POST["password"])){
        $error_message = "Votre mot de passe doit comporter au moins 8 caractères, dont une minuscule, une majuscule, un chiffre et un caractère spécial.";
      }
      else {
        if ($_POST["password"] != $_POST["confirm_password"]){
          $error_message = "Erreur : le mot de passe confirmé n'est pas identique à celui choisi.";
        }
        else {
          $username = $_POST["username"];
          $mail = $_POST["mail"];
          $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

          $add_user = $check -> add_new_user($username, $mail, $password);
        }
      }
    }
  }
}

if (isset($_POST["login"])){
  $check_username = $check -> check_if_exists($_POST["login"], 'user_username', 'user');
  $check_mail = $check -> check_if_exists($_POST["login"], 'user_mail', 'user');

  if (!$check_mail && !$check_username){
    $error_message= "Aucun compte avec ce nom d'utilisateur ou cette adresse mail n'a été trouvé";
  }
  else {
    if ($check_mail){
      $user = $check_mail;
    }
    else {
      $user = $check_username;
    }
    $password = trim($_POST["password"]);
    if (!password_verify($password, $user["user_password"])){
      $error_message= "Mot de passe invalide";
    }
    else{
      session_start();
      $_SESSION["logged_in"] = TRUE;
      $_SESSION["username"] = $user["user_username"];
      header ('location: http://localhost/interface_JDR/index.php');
      exit();

    }
  }
}

if (isset($error_message)){
  echo "<br><p style='color:red;'>$error_message</p>";
}

 ?>
