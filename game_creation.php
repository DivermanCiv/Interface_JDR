<?php



require_once("class/config.class.php");
include("header.php");
$check_login = new Core;
$check_if_logged= $check_login->check_login();
$conf = new Config;
$actual_user_id = $conf->give_me_id("user", "user_username", $_SESSION["username"]);
?>
<script src="js/jquery-3.5.0.min.js"></script>
<body>
  <h1>Création de partie</h1>

  <form>
    <label for="game_name">Nom de la partie</label>
    <input type="text" name="game_name" required></input>
    <br>
    <label for="game_desc">Description de la partie</label>
    <textarea name="game_desc"></textarea>




  <button>Créer la partie</button>
  </form>
  <a href="welcome.php">Retour</a>

</body>
