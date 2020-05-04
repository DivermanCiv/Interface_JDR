<?php
include("class/core.class.php");
include("header.php");
$check_login = new Core;
$check_if_logged= $check_login->check_login();
?>
<script src="js/jquery-3.5.0.min.js"></script>
<body>


<p>Bienvenue, <span id="actual_user"><?=$_SESSION["username"];?></span></p>


<br>
<a href="character_creation.php">Créer un personnage</a>
<a href="game_creation.php">Créer une partie</a>
<a href="logout.php">Se déconnecter</a>
<br><span>-------------</span><br>
<h3 id="my_characters">Mes personnages</h3>
<ul id="character_list"></ul>


<script src="js/welcome.js"></script>
</body>
