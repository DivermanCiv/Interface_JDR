<?php

session_start();
session_destroy();
include("header.php");
?>
<body>
  <p>Vous avez été déconnecté. </p>
  <a href='index.php'>Retour à l'accueil</a>
</body>
