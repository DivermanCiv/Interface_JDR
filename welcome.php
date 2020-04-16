<?php
session_start();
include("header.php");

?>

<body>

<?php
echo "Bienvenue, ". $_SESSION["username"];

?>
<br>
<a href="character_creation/character_creation.php">Créer un personnage</a>
<a href="game_creation.php">Créer une partie</a>
<a href="logout.php">Se déconnecter</a>
</body>
