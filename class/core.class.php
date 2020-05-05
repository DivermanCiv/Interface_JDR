
<?php

class Core {
  public static $bdd;

  public function __construct(){
    require(__DIR__."/../conf.php");
    if(!self::$bdd) {self::$bdd = new PDO($dsn,$bddusername,$bddpassword);}

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
