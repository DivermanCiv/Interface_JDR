
<?php

class Core {
  public static $bdd;

  public function __construct(){
    $dsn="mysql:host=localhost;dbname=interface_jdr";
    $bddusername="root";
    $bddpassword='root';
    if(!self::$bdd) {self::$bdd = new PDO($dsn,$bddusername,$bddpassword);
    self::$bdd->exec('SET NAMES utf8');}

    try {self::$bdd;}
    catch (Exception $e){die('Erreur : '.$e->getMessage());}
  }

  public function check_login(){
    session_start();
    if (empty($_SESSION["logged_in"])){
      header ("location: index.php");
      exit();
    }
  }
}
