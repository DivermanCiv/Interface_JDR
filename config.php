<?php

$dsn = "mysql:host=localhost;dbname=interface_jdr";
$bddusername="root";
$bddpassword='root';

try {$bdd = new PDO($dsn,$bddusername,$bddpassword);}
catch (Exception $e){die('Erreur : '.$e->getMessage());}



function check_if_exists($info_to_check, $where_to_check, $table){
  $found = FALSE;
  while ($value = $table -> fetch()) {
    if ($info_to_check == $value[$where_to_check]){
      $found = TRUE;
    }
  }
  return $found;
}


 ?>
