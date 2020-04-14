<?php

$dsn = "mysql:host=localhost;dbname=interface_jdr";
$username="root";
$password='root';

try {$bdd = new PDO($dsn,$username,$password);}
catch (Exception $e){die('Erreur : '.$e->getMessage());}



 ?>
