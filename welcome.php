<?php
include("class/core.class.php");
include("header.php");
$check_login = new Core;
$check_if_logged= $check_login->check_login();
?>

<body>

<?php
echo "Bienvenue, ". $_SESSION["username"];

?>
<br>
<a href="character_creation.php">Créer un personnage</a>
<a href="game_creation.php">Créer une partie</a>
<a href="logout.php">Se déconnecter</a>
</body>
