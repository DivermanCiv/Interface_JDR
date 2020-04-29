<?php
include("class/core.class.php");
$check_login = new Core;
$check_if_logged= $check_login->check_login();
include("header.php");

 ?>

<body>
  <p>Désolé, ce contenu est actuellement inexistant</p>
  <a href="welcome.php">Retour</a>
</body>
