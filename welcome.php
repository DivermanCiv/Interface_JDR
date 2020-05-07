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

<span id='actual_user_id'><?= $actual_user_id ?></span>
<p>Bienvenue, <span id="actual_user"><?=$_SESSION["username"];?></span></p>


<br>
<a href="character_creation.php">Créer un personnage</a>
<!-- <a href="game_creation.php">Créer une partie</a> -->
<a href="logout.php">Se déconnecter</a>
<br><span>-------------</span><br>
<h2 id="my_characters">Mes personnages</h2>
<p id="no_character">Aucun personnage n'a encore été créé ! <a href="character_creation.php">Créer un personnage</a></p>
<ul style="list-style: none" id="character_list"></ul>

<div id="selected_character">
  <h3 id="selected_character_name"></h3>
  <h4>Classe :</h4>
  <div id="selected_character_class"></div>
  <h4>Statistiques :</h4>
  <div id="selected_character_stats"></div>
  <h4>Compétences :</h4>
  <div id="selected_character_skills"></div>
  <h4>Background :</h4>
  <div id="selected_character_background"></div>
  <h4>Notes :</h4>
  <div id ="selected_character_notes"></div>
</div>
<script src="js/welcome.js"></script>
</body>
