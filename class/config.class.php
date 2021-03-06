<?php
require_once("core.class.php");

class Config extends Core{

  public static $bdd;

  public function check_if_exists($info_to_check, $where_to_check, $table){
    $req = Core::$bdd -> prepare ("SELECT * FROM $table WHERE $where_to_check = :x");
    $req -> execute (array("x"=> $info_to_check));
    return $req->fetchAll();
  }

  public function give_me_id($table, $index_to_search, $value_to_search){
    $search = $this->check_if_exists($value_to_search, $index_to_search, $table);
    if (!$search){
      return NULL;
    }
    else {return $search[0][0]; }
  }

  public function add_new_user($username, $mail, $password){
    $req = Core::$bdd -> prepare ('INSERT INTO user (user_username, user_mail, user_password, user_is_validated) VALUES (:username, :mail, :password, :is_validated)');
    $req -> execute (array(
      'username' => $username,
      'mail' => $mail,
      'password' => $password,
      'is_validated' => 0
    ));
    if ($req){
      echo "Compte créé avec succès ! Veuillez à présent vérifier votre boîte mail et valider votre compte [Fonctionnalité pas encore mise en place].";
    }
    else {
      echo "Oups, il semble qu'une erreur se soit produite ! Veuillez réessayer plus tard.";
    }
  }

}
