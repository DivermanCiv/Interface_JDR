
<?php

class Core {
  protected $bdd;

  public function __construct(){
    $dsn = "mysql:host=localhost;dbname=interface_jdr";
    $bddusername="root";
    $bddpassword='root';

    $this->bdd = new PDO($dsn,$bddusername,$bddpassword);
    try {$this->bdd;}
    catch (Exception $e){die('Erreur : '.$e->getMessage());}
  }
}
