
<?php

class Core {
  public static $bdd;

  public function __construct(){
    $dsn="mysql:host=localhost;dbname=interface_jdr";
    $bddusername="root";
    $bddpassword='root';
    if(!self::$bdd) {self::$bdd = new PDO($dsn,$bddusername,$bddpassword);}
    try {self::$bdd;}
    catch (Exception $e){die('Erreur : '.$e->getMessage());}
  }
}
