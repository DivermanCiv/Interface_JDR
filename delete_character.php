<?php
require_once("class/config.class.php");
require_once("class/character.class.php");
include("header.php");
$check_login = new Core;
$check_if_logged= $check_login->check_login();
$conf = new Config;
$actual_user_id = $conf->give_me_id("user", "user_username", $_SESSION["username"]);
if (isset($_GET["char_id"])){$_SESSION["char_id"]=$_GET["char_id"];}
?>
<body>
<p>Souhaitez-vous vraiment supprimer ce personnage et lui faire rejoindre le néant ?</p>
<form action="delete_character.php" method="post">
  <button name="delete_character">Oui, je suis un monstre</button>
  <button name="cancel_deletion">Non, je suis trop sensible</button>
</form>

</body>

<?php
require("conf.php");
$character = new Character;
if (isset($_POST["cancel_deletion"])){header("location: index.php"); exit();}

if (isset($_POST["delete_character"])){$character -> delete_character($_SESSION["char_id"], $actual_user_id);}
?>
